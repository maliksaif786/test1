<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\User;
use App\Models\Venue;
use App\Models\VenueAllocation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('auth.login');
    }
    public function admin()
    {
        $solves = Complaint::where('status','resolved')->count();
        $unsolves = 1;
        $pending = Complaint::where('status','pending')->count();

        $complaintchart = app()->chartjs
            ->name('complaintchart')
            ->type('doughnut')
            ->size(['width' => 400, 'height' => 300])
            ->labels(['Solves', 'Not Solves', 'Pending'])
            ->datasets([
                [
                    'backgroundColor' => ['#37BB59', '#FF7B7B', '#08C2F9'],
                    'hoverBackgroundColor' => ['#289444', '#F90808', '#0392BD'],
                    'data' => [$solves, $unsolves, $pending]
                ]
            ])
            ->options(['responsive' => true, 'maintainAspectRatio' => false]);


        // total teacher and lab admin
        $teachers  = User::where('user_type','teacher')->count();
        $labAdmins = User::where('user_type','lab_admin')->count();
        $userchart = app()->chartjs
        ->name('userchart')
        ->type('bar')
        ->size(['width' => 400, 'height' => 300])
        ->labels(['Teachers', 'Lab Admins'])
        ->datasets([
            [
                'label' => ['Count'],
                'backgroundColor' => ['#37BB59', '#f7c740'],
                'hoverBackgroundColor' => ['#289444', '#fcba03'],
                'data' => [$teachers, $labAdmins]
            ]
        ])
        ->options(['responsive' => true, 'maintainAspectRatio' => false]);


          // affected lab
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
  
          $labName = $venueName;
          $count  = $maxCount;
          $labchart = app()->chartjs
          ->name('labchart')
          ->type('pie')
          ->size(['width' => 400, 'height' => 300])
          ->labels([$labName])
          ->datasets([
              [
                  'backgroundColor' => ['#d41528'],
                  'hoverBackgroundColor' => ['#f7051d'],
                  'data' => [$count]
              ]
          ])
          ->options(['responsive' => true, 'maintainAspectRatio' => false]);
  

        return view('lab_admin.dashboard', compact('complaintchart','userchart','labchart'));
    }

    public function lab_admins()
    {
        $users = User::where('user_type','lab_admin')->get();
        return view('lab_admin.users.index',compact('users'));
    }

    public function lab_allocate($id)
    {
        $lab_admin_id = $id;
        $venues = Venue::all();
        $venueAllocations = VenueAllocation::where('lab_admin_id', $id)->get();

        return view('lab_admin.users.user_allocation',compact('venues','venueAllocations','lab_admin_id'));
    }

    public function lab_allocattion(Request $request)
    {
        $currentDate = date('Y-m-d');

        $chkAssignLab = VenueAllocation::where('lab_admin_id', $request->lab_admin_id)->where('venue_id', $request->venue_id)->first();
        if (isset($chkAssignLab)) {
           
        toastr()->error('Lab Already Assign Successfuly');
        return redirect('lab_allocate/'.$request->lab_admin_id );
        } else {
            $assign_lab = new VenueAllocation();
            $assign_lab->lab_admin_id = $request->lab_admin_id;
            $assign_lab->venue_id = $request->venue_id;
            $assign_lab->status = 'allocate';
            $assign_lab->date = $currentDate;
            $assign_lab->save();
            toastr()->success('Lab Assign Successfuly');
            return redirect('lab_allocate/'.$request->lab_admin_id );
        }
        
    }

    public function Deallocate(Request $request, $id)
    {
        $lab = VenueAllocation::where('id', $id)->first();
        $lab->status = 'deallocate';
        $lab->save();
        toastr()->success('Venue Deallocate Successfuly');
        return redirect('lab_allocate/'.$lab->lab_admin_id );
    }

    public function complaints()
    {
        $complaints = Complaint::all();
        return view('lab_admin.complaint.index', compact('complaints'));
    }



    #####################Teacher#############
    public function teacher()
    {
        $solves = Complaint::where('status','resolved')->count();
        $unsolves = 1;
        $pending = Complaint::where('status','pending')->count();

        $complaintchart = app()->chartjs
            ->name('complaintchart')
            ->type('pie')
            ->size(['width' => 400, 'height' => 300])
            ->labels(['Solves', 'Not Solves', 'Pending'])
            ->datasets([
                [
                    'backgroundColor' => ['#37BB59', '#FF7B7B', '#08C2F9'],
                    'hoverBackgroundColor' => ['#289444', '#F90808', '#0392BD'],
                    'data' => [$solves, $unsolves, $pending]
                ]
            ])
            ->options(['responsive' => true, 'maintainAspectRatio' => false]);


        // total teacher and lab admin
        $teachers  = User::where('user_type','teacher')->count();
        $labAdmins = User::where('user_type','lab_admin')->count();
        $userchart = app()->chartjs
        ->name('userchart')
        ->type('pie')
        ->size(['width' => 400, 'height' => 300])
        ->labels(['Teachers', 'Lab Admins'])
        ->datasets([
            [
                'label' => ['Count'],
                'backgroundColor' => ['#37BB59', '#f7c740'],
                'hoverBackgroundColor' => ['#289444', '#fcba03'],
                'data' => [$teachers, $labAdmins]
            ]
        ])
        ->options(['responsive' => true, 'maintainAspectRatio' => false]);


          // affected lab
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
  
          $labName = $venueName;
          $count  = $maxCount;
          $labchart = app()->chartjs
          ->name('labchart')
          ->type('doughnut')
          ->size(['width' => 400, 'height' => 300])
          ->labels([$labName])
          ->datasets([
              [
                  'backgroundColor' => ['#d41528'],
                  'hoverBackgroundColor' => ['#f7051d'],
                  'data' => [$count]
              ]
          ])
          ->options(['responsive' => true, 'maintainAspectRatio' => false]);
  
        return view('teacher.dashboard',compact('complaintchart','labchart','userchart'));
    }
}
