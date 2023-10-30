<?php

namespace App\Http\Controllers\Lab;

use App\Http\Controllers\Controller;
use App\Models\Time;
use App\Models\Venue;
use App\Models\User;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $times = Time::all();
        return view('lab_admin.timetable.index',compact('times'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $venues = Venue::all();
        $teachers = User::where('user_type','teacher')->get();
        return view('lab_admin.timetable.create',compact('venues','teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $time = new Time();
        $time->teacher_id = $request->teacher_id;
        $time->venue_id = $request->venue_id;
        $time->day = $request->day;
        $time->start_time = $request->start_time;
        $time->end_time = $request->end_time;
        $time->save();
        toastr()->success('Time Slot Added successfully');
        return redirect('times');
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
        $venues = Venue::all();
        $teachers = User::where('user_type','teacher')->get();
        $time = Time::find($id);
        return view('lab_admin.timetable.edit',compact('venues','teachers','time'));
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
        $time = Time::find($id);
        $time->teacher_id = $request->teacher_id;
        $time->venue_id = $request->venue_id;
        $time->day = $request->day;
        $time->start_time = $request->start_time;
        $time->end_time = $request->end_time;
        $time->save();
        toastr()->success('Time Slot Update successfully');
        return redirect('times');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $time = Time::find($id);
        $time->delete();
        toastr()->error('Time Slot Deleted successfully');
        return redirect('times');
    }
}
