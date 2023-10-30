<?php

namespace App\Http\Controllers\LabAdmin;

use App\Http\Controllers\Controller;
use App\Models\ComplainRequest;
use App\Models\Complaint;
use App\Models\ComplaintAction;
use App\Models\VenueAllocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LabAdminController extends Controller
{
     public function index()
     {
        return view('lab.dashboard');
     }

     public function complaints()
     {
      $userID = Auth::user()->id;
      $venueAssign = VenueAllocation::where('lab_admin_id', $userID)->get();

      $complaints = Complaint::whereIn('venue_id', $venueAssign->pluck('venue_id'))
         ->where('status', '!=', 'resolved')
         ->get()
         ->groupBy(['venue_id', 'category_id']);

      return view('lab.complaint.index',compact('complaints'));
     }

     public function take_action($id)
     {
      $complaint = Complaint::find($id);
      $actions = ComplaintAction::where('complain_id',$id)->get();
      return view('lab.complaint.take_action',compact('complaint','actions'));
     }

     public function AllAction(Request $request)
     {
         $ids = $request->id;
         $selectedComplaints = [];
         
         foreach ($ids as $id) {
            $actions = ComplaintAction::where('complain_id',$id)->get();
            $comReq = ComplainRequest::where('complain_id',$id)->count();
            $complaint = Complaint::where('id', $id)->first();
            if ($complaint) {
               $selectedComplaints[] = $complaint;
            }
         }
         
         return view('lab.complaint.take_action_all',compact('selectedComplaints','actions','comReq'));
     }

     public function action_save(Request $request)
     {
         $currentDate = date('Y-m-d');
         $actions = new ComplaintAction();
         $actions->complain_id = $request->complain_id;
         $actions->action  = $request->action;
         $actions->date = $currentDate;
         $actions->save();
        toastr()->success('Action Added successfully');
        return redirect()->back();
     }

     //all action save
     public function all_action_save(Request $request)
     {
      $complintIDS = $request->complain_id;

      foreach($complintIDS as $id)
         {
            $currentDate = date('Y-m-d');
         $actions = new ComplaintAction();
         $actions->complain_id = $id;
         $actions->action  = $request->action;
         $actions->date = $currentDate;
         $actions->save();
         }

      toastr()->success('Action Added successfully');
        return redirect()->back();
     }

     public function update_status(Request $request)
     {
      $complintIDS = $request->complain_id;
      if(count($complintIDS) == 1){
         $currentDate = date('Y-m-d');
         $labAdminID = Auth::user()->id;
         $complainRequest = new ComplainRequest();
         $complainRequest->lab_admin_id = $labAdminID;
         $complainRequest->complain_id = $request->complain_id;
         $complainRequest->status = $request->status;
         $complainRequest->date = $currentDate;
         $complainRequest->save();
      }
      else
      {
         foreach($complintIDS as $id)
         {
            $currentDate = date('Y-m-d');
            $labAdminID = Auth::user()->id;
            $complainRequest = new ComplainRequest();
            $complainRequest->lab_admin_id = $labAdminID;
            $complainRequest->complain_id = $id;
            $complainRequest->status = $request->status;
            $complainRequest->date = $currentDate;
            $complainRequest->save();
         }
      }

      
      toastr()->success('Status Updated successfully');
        return redirect()->back();
     }
}
