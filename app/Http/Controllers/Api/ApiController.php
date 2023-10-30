<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Complaint;
use App\Models\ComplaintAction;
use App\Models\Feedback;
use App\Models\Setting;
use App\Models\User;
use App\Models\Venue;
use App\Models\VenueAllocation;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    //login
    public function login(Request $request)
    {

        $user = User::where('email', $request->email)->where('password', $request->password)->first();
        if (isset($user)) {
            return response()->json([
                'success' => true,
                'message' => 'Login Successfuly'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Email and password not match'
            ]);
        }
    }

    public function getCategories()
    {
        $categories = Category::all();
        return response()->json([
            'success' => true,
            'categories' => $categories
        ]);
    }

    //getVenues
    public function getVenues()
    {
        $venues = Venue::all();
        return response()->json([
            'success' => true,
            'venues' => $venues
        ]);
    }

    //View All Complaints
    public function ViewAllComplaints()
    {
        $complaints = Complaint::get(['id', 'venue_id', 'user_id', 'category_id', 'status', 'date', 'description']);
        return response()->json([
            'status' => true,
            'complaints' => $complaints
        ]);
    }

    //ViewMyComplaints
    public function ViewMyComplaints(Request $request)
    {
        $complaints = Complaint::where('user_id', $request->id)->get(['id', 'venue_id', 'user_id', 'category_id', 'status', 'date', 'description']);
        return response()->json([
            'status' => true,
            'complaints' => $complaints
        ]);
    }

    //View My Ressolved Complaints
    public function ViewMyRessolvedComplaints(Request $request)
    {
        $complaints = Complaint::where('user_id', $request->id)->where('status', 'resolved')->get(['id', 'venue_id', 'user_id', 'category_id', 'status', 'date', 'description']);
        return response()->json([
            'status' => true,
            'complaints' => $complaints
        ]);
    }

    //View My Unressolved Complaints
    public function ViewMyUnressolvedComplaints(Request $request)
    {
        $complaints = Complaint::where('user_id', $request->id)->where('status', 'unresolved')->get(['id', 'venue_id', 'user_id', 'category_id', 'status', 'date', 'description']);
        return response()->json([
            'status' => true,
            'complaints' => $complaints
        ]);
    }

    //assignLab
    public function assignLab(Request $request)
    {
        $currentDate = date('Y-m-d');

        $chkAssignLab = VenueAllocation::where('lab_admin_id', $request->lab_admin_id)->where('venue_id', $request->venue_id)->first();
        if (isset($chkAssignLab)) {
            return response()->json([
                'status' => false,
                'message' => 'Lab Already Assign Successfuly'
            ]);
        } else {
            $assign_lab = new VenueAllocation();
            $assign_lab->lab_admin_id = $request->lab_admin_id;
            $assign_lab->venue_id = $request->venue_id;
            $assign_lab->status = $request->status;
            $assign_lab->date = $currentDate;
            $assign_lab->save();
            return response()->json([
                'status' => true,
                'message' => 'Lab Assign Successfuly'
            ]);
        }
    }

    //AddComplaints
    public function AddComplaints(Request $request)
    {
        $currentDate = date('Y-m-d');

        $complaint = new Complaint();
        $complaint->venue_id = $request->venue_id;
        $complaint->category_id = $request->category_id;
        $complaint->user_id = $request->user_id;
        $complaint->description = $request->description;
        $complaint->date = $currentDate;
        $complaint->status = 'unresolved';
        $complaint->save();

        return response()->json([
            'result' => true,
            'message' => 'Complaint Added Successfuly'
        ]);
    }

    //View Complaint Action
    public function ViewComplaintAction($id)
    {
        $complaints = ComplaintAction::where('complain_id', $id)->get(['id', 'complain_id', 'date', 'action']);
        return response()->json([
            'status' => true,
            'complaint_actions' => $complaints
        ]);
    }

    //Add Feedback
    public function AddFeedback(Request $request)
    {
        $feedback = new Feedback();
        $feedback->complain_id = $request->complain_id;
        $feedback->user_id = $request->user_id;
        $feedback->comment = $request->comment;
        $feedback->save();

        return response()->json([
            'result' => true,
            'message' => 'Feedback Added Successfuly'
        ]);
    }

    //Add Setting
    public function AddSetting(Request $request)
    {
        $setting = new Setting();
        $setting->category_id = $request->category_id;
        $setting->day = $request->day;
        $setting->role = $request->role;
        $setting->save();

        return response()->json([
            'result' => true,
            'message' => 'setting Added Successfuly'
        ]);
    }


    // addAction
    public function addAction(Request $request)
    {
        $currentDate = date('Y-m-d');
        $aciton = new ComplaintAction();
        $aciton->complain_id = $request->complain_id;
        $aciton->action = $request->action;
        $aciton->date = $currentDate;
        $aciton->save();

        return response()->json([
            'result' => true,
            'message' => 'ACTION Added Successfuly'
        ]);
    }

    //LabWithMostComplaint
    public function LabWithMostComplaint(Request $request)
    {
        $allComplaints = Complaint::all();
        $venueCounts = [];
        foreach ($allComplaints as $complaint) {
            $venue_id = $complaint->venue_id;

            if (isset($venueCounts[$venue_id])) {
                $venueCounts[$venue_id]++;
            } else {
                $venueCounts[$venue_id] = 1;
            }
        }

        // venue_id  highest count
        $mostUsedVenueId = null;
        $maxCount = 0;

        foreach ($venueCounts as $venue_id => $count) {
            if ($count > $maxCount) {
                $mostUsedVenueId = $venue_id;
                $maxCount = $count;
            }
        }

        $venueByComplaints = Complaint::where('venue_id', $mostUsedVenueId)->get();

        $venueName = Venue::where('id', $mostUsedVenueId)->pluck('name');

        return response()->json([
            'status' => true,
            'lab' => $venueName,
            'complaints' => $venueByComplaints
        ]);
    }

    //Deallocate
    public function Deallocate(Request $request, $id)
    {
        $lab = VenueAllocation::where('id', $id)->first();
        $lab->status = $request->status;
        $lab->save();
        return response()->json([
            'status' => true,
            'message' => 'Venue Deallocate Successfuly'
        ]);
    }

    //complaintCountWithCategory
    public function complaintCountWithCategory(Request $request)
    {
        $complaintCountsByLabAndCategory = [];
        $allComplaints = Complaint::with('venue', 'category')->get();

        foreach ($allComplaints as $complaint) {

            $labName = $complaint->venue->name;
            $categoryName = $complaint->category->name;

            if (!isset($complaintCountsByLabAndCategory[$labName][$categoryName])) {
                $complaintCountsByLabAndCategory[$labName][$categoryName] = 0;
            }
            $complaintCountsByLabAndCategory[$labName][$categoryName]++;
        }

        return response()->json([
            'status' => true,
            'results' => $complaintCountsByLabAndCategory
        ]);
    }

    //hodUnressolved_complaints
    public function hodUnressolved_complaints(Request $request)
    {
        $complaints = Complaint::where('status', 'unresolved')->get(['id', 'venue_id', 'user_id', 'category_id', 'status', 'date', 'description']);
        return response()->json([
            'result' => true,
            'unressolvecomplaints' => $complaints
        ]);
    }

    //datewise Complaints 
    public function DateWiseComplaints(Request $request)
    {
        try {
            $startDate = $request->start_date;
            $endDate   = $request->end_date;
            $complaints = Complaint::whereBetween('created_at', [$startDate, $endDate])->get(['id', 'venue_id', 'user_id', 'category_id', 'status', 'date', 'description']);
            return response()->json([
                'result' => true,
                'complaints' => $complaints
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while fetching complaints.'], 500);
        }
    }

    //Lab Admin Complaints
    public function labAdminComplaints(Request $request)
    {
        $labAdmins = User::where('user_type', 'lab_admin')->get();
        $labAdminData = [];
        foreach ($labAdmins as $labAdmin) {
            $venueAllocations = $labAdmin->venueAllocations;
            $venueAllocations = VenueAllocation::whereIn('venue_id', $venueAllocations->pluck('venue_id'))->get();
            $complaints = Complaint::whereIn('venue_id', $venueAllocations->pluck('venue_id'))->get();
            $totalComplaints = $complaints->count();
            $resolvedComplaints = $complaints->where('status', 'resolved')->count();
            $unresolvedComplaints = $totalComplaints - $resolvedComplaints;
            $labAdminName = $labAdmin->name;
            $labAdminData[] = [
                'Lab Admin' => $labAdminName,
                'total complaints' => $totalComplaints,
                'total resolved' => $resolvedComplaints,
                'total unresolved' => $unresolvedComplaints,
            ];
        }
        return response()->json($labAdminData);
    }
    
}
