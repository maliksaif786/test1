<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ComplainRequest;
use App\Models\ComplaintAction;
use App\Models\Feedback;
use App\Models\SubCategory;
use App\Models\Complaint;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userID = Auth::user()->id;
        $complaints = Complaint::where('user_id', $userID)->get();
        return view('teacher.complaint.index',compact('complaints'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $venues = Venue::all();
        return view('teacher.complaint.create',compact('categories','venues'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userID = Auth::user()->id;
        $complaint = new Complaint();
        $complaint->venue_id = $request->venue_id;
        $complaint->user_id = $userID;
        $complaint->category_id = $request->category_id;
        $complaint->sub_category_id = $request->subcategory_id;
        $complaint->date = $request->date;
        $complaint->description = $request->description;
        $complaint->status = 'pending';
        $complaint->save();
        toastr()->success('Complaint Added successfully');
        return redirect('complaints');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getSubcategories($categoryID)
    {
        $subcategories = Subcategory::where('category_id', $categoryID)->pluck('name', 'id');
        return response()->json($subcategories);
    }

    public function complaint_request()
    {
        $userID = Auth::user()->id;
        $allcomplaints = Complaint::where('user_id', $userID)->get();
        $complaintsRequests = [];
        
        foreach ($allcomplaints as $complaint) {
            $complaintRequests = ComplainRequest::where('status','resolved')->where('complain_id', $complaint->id)->get();
            $complaintsRequests = array_merge($complaintsRequests, $complaintRequests->all());
        }
        return view('teacher.complaint.request.index',compact('complaintsRequests'));
    }

    public function complaint_accept($id)
    {
        $complaintReq = ComplainRequest::where('id',$id)->first();
        $complaintReq->status = 'Accepted';
        $complaintReq->save();
        $complaint = Complaint::where('id',$complaintReq->complain_id)->first();
        $complaint->status = 'resolved';
        $complaint->save();
        toastr()->success('Complaint Resolved successfully');
        return redirect('complaint_requests');
    }

    
    public function complaint_reject($id)
    {
        $complaintReq = ComplainRequest::where('id',$id)->first();
        $complaintReq->status = 'Rejected';
        $complaintReq->save();
        toastr()->error('Complaint Rejected successfully');
        return redirect('complaint_requests');
    }

    public function resolved_complaints()
    {
        $userID = Auth::user()->id;
        $complaints = Complaint::where('status','resolved')->where('user_id', $userID)->get();
        return view('teacher.complaint.resolved',compact('complaints'));
    }

    
    public function unresolved_complaints()
    {
        $userID = Auth::user()->id;
        $complaints = Complaint::where('status','!=', 'resolved')->where('user_id', $userID)->get();
        return view('teacher.complaint.unresolved_complaints',compact('complaints'));
    }

    public function complaint_detail($id)
    {
        $complaint = Complaint::find($id);
      $actions = ComplaintAction::where('complain_id',$id)->get();
      return view('teacher.complaint.detail',compact('complaint','actions'));
    }

    public function feedback($id)
    {
        $user = Auth::user();
      $complaint = Complaint::find($id);
      $feedbacks = Feedback::where('complain_id', $id)->get();
      return view('teacher.complaint.feedback',compact('feedbacks','complaint','user'));
    }

    public function feedback_save(Request $request)
    {
        $user = Auth::user();
        $feedback = new Feedback();
        $feedback->complain_id = $request->complain_id;
        $feedback->user_id = $user->id;
        $feedback->comment = $request->comment;
        $feedback->save();
        toastr()->success('Complaint Feedback Added successfully');
        return redirect('feedback/'.$request->complain_id);
    }

}
