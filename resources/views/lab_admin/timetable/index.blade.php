@extends('lab_admin.layouts.master')
@section('content')

<!--  Navbar Starts / Breadcrumb Area  -->
<div class="sub-header-container">
    <header class="header navbar navbar-expand-sm">
        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
            <i class="las la-bars"></i>
        </a>
        <ul class="navbar-nav flex-row">
            <li>
                <div class="page-header">
                    <nav class="breadcrumb-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">All Times</a></li>
                        </ol>
                    </nav>
                </div>
            </li>
        </ul>
    </header>
</div>
<!--  Navbar Ends / Breadcrumb Area  -->

<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

    <div class="widget-content widget-content-area br-6">
        <a href="{{url('times/create')}}" class="btn btn-success float-right my-2">Add Time</a>
        <h4 class="table-header">Time Table</h4>

        <div class="table-responsive mb-4">
            <table id="basic-dt" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Teacher</th>
                        <th>Venue</th>
                        <th>Day</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th class="no-content">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($times as $time)
                    <tr>
                        <td>{{$time->id}}</td>
                        <td>{{$time->teacher->name}}</td>
                        <td>{{$time->venue->name}}</td>
                        <td>{{$time->day}}</td>
                        <td>{{$time->start_time}}</td>
                        <td>
                        {{$time->end_time}}
                        </td>

                        <td>
                            <form method="POST" action="{{url('/times/'.$time->id)}}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a style="padding:3px; width:56px" href="{{url('/times/'.$time->id.'/edit')}}" class="btn btn-info m-1 btn-sm">Edit</a> 
                                <button style="padding:3px; width:56px" type="submit" data-toggle="confirmation" class="btn btn-danger m-1 btn-sm">
                                    Delete</button>

                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection