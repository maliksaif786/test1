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
                                                        <h4>Update Complaint</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <form method="post" action="{{route('times.update',$time->id)}}">
                                            {{ method_field('PUT') }}
                                            {{ csrf_field() }}
                                            <div class="widget-content widget-content-area">
                                                <div class="form-group row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12">

                                                            <div class="form-group mb-2">
                                                                    <label class="col-form-label">Teacher <span class="text-danger">*</span></label>
                                                                    <select name="teacher_id" class="form-control" id="category" required>
                                                                        <option value="">Select Teacher</option>
                                                                        @foreach($teachers as $teacher)
                                                                        <option value="{{$teacher->id}}" <?php if($teacher->id == $time->teacher_id) echo'selected'; ?>>{{$teacher->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                       
                                                            <div class="form-group mb-2">
                                                                <label class="col-form-label">Venue <span class="text-danger">*</span></label>
                                                                <select name="venue_id" class="form-control" required>
                                                                    <option value="">Select Venue</option>
                                                                    @foreach($venues as $venue)
                                                                    <option value="{{$venue->id}}" <?php if($venue->id == $time->venue_id) echo'selected'; ?>>{{$venue->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group mb-2">
                                                                <label class="col-form-label">Day of the Week <span class="text-danger">*</span></label>
                                                                <select name="day" class="form-control" required>
                                                                    <option value="">Select Day</option>
                                                                    <option value="Monday" <?php if($time->day == 'Monday') echo'selected'; ?>>Monday</option>
                                                                    <option value="Tuesday" <?php if($time->day == 'Tuesday') echo'selected'; ?>>Tuesday</option>
                                                                    <option value="Wednesday" <?php if($time->day == 'Wednesday') echo'selected'; ?>>Wednesday</option>
                                                                    <option value="Thursday" <?php if($time->day == 'Thursday') echo'selected'; ?>>Thursday</option>
                                                                    <option value="Friday" <?php if($time->day == 'Friday') echo'selected'; ?>>Friday</option>
                                                                    <option value="Saturday" <?php if($time->day == 'Saturday') echo'selected'; ?>>Saturday</option>
                                                                    <option value="Sunday" <?php if($time->day == 'Sunday') echo'selected'; ?>>Sunday</option>
                                                                </select>
                                                            </div>


                                                     

                                                            <div class="form-group mb-2">
                                                                <label class="col-form-label">Start Time <span class="text-danger">*</span></label>
                                                                <input type="time" class="form-control" value="{{$time->start_time}}" name="start_time" required>
                                                            </div>
                                                            <div class="form-group mb-2">
                                                                <label class="col-form-label">End Time <span class="text-danger">*</span></label>
                                                                <input type="time" class="form-control" value="{{$time->end_time}}" name="end_time" required>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-footer text-right">
                                                <button type="submit" class="btn btn-primary mr-2">Update</button>
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