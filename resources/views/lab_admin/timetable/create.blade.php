@extends('teacher.layouts.master')
@section('content')

<div class="layout-px-spacing">
                <div class="layout-top-spacing mb-2">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="container p-0">
                                <div class="row layout-top-spacing">
                                    <div class="col-lg-8 layout-spacing">
                                        <div class="statbox widget box box-shadow mb-4">
                                            <div class="widget-header bg-success">
                                                <div class="row">
                                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                        <h4>Add Complaint</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <form method="post" action="{{route('times.store')}}">
                                                @csrf
                                            <div class="widget-content widget-content-area">
                                                <div class="form-group row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12">

                                                            <div class="form-group mb-2">
                                                                    <label class="col-form-label">Teacher <span class="text-danger">*</span></label>
                                                                    <select name="teacher_id" class="form-control" id="category" required>
                                                                        <option value="">Select Teacher</option>
                                                                        @foreach($teachers as $teacher)
                                                                        <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                       
                                                            <div class="form-group mb-2">
                                                                <label class="col-form-label">Venue <span class="text-danger">*</span></label>
                                                                <select name="venue_id" class="form-control" required>
                                                                    <option value="">Select Venue</option>
                                                                    @foreach($venues as $venue)
                                                                    <option value="{{$venue->id}}">{{$venue->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group mb-2">
                                                                <label class="col-form-label">Day of the Week <span class="text-danger">*</span></label>
                                                                <select name="day" class="form-control" required>
                                                                    <option value="">Select Day</option>
                                                                    <option value="Monday">Monday</option>
                                                                    <option value="Tuesday">Tuesday</option>
                                                                    <option value="Wednesday">Wednesday</option>
                                                                    <option value="Thursday">Thursday</option>
                                                                    <option value="Friday">Friday</option>
                                                                    <option value="Saturday">Saturday</option>
                                                                    <option value="Sunday">Sunday</option>
                                                                </select>
                                                            </div>


                                                     

                                                            <div class="form-group mb-2">
                                                                <label class="col-form-label">Start Time <span class="text-danger">*</span></label>
                                                                <input type="time" class="form-control" name="start_time" required>
                                                            </div>
                                                            <div class="form-group mb-2">
                                                                <label class="col-form-label">End Time <span class="text-danger">*</span></label>
                                                                <input type="time" class="form-control" name="end_time" required>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-footer text-right">
                                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                                <button type="reset" class="btn btn-outline-primary">Cancel</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


@endsection