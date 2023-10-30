@extends('teacher.layouts.master')
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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">All Complaints</a></li>
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
        <a href="{{url('complaints/create')}}" class="btn btn-success float-right my-2">Add Complaint</a>
        <h4 class="table-header"> Resolved Complaints</h4>

        <div class="table-responsive mb-4">
            <table id="basic-dt" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Location</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th class="no-content">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($complaints as $complaint)
                    <tr>
                        <td>{{$complaint->id}}</td>
                        <td>{{$complaint->user->name}}</td>
                        <td>{{$complaint->venue->name}}</td>
                        <td>{{$complaint->category->name}}</td>
                        <td>{{$complaint->date}}</td>
                        <td>
                            @if($complaint->status=='resolved')
                            <span class="badge badge-success">{{$complaint->status}}</span>
                            @else
                            <span class="badge badge-danger">{{$complaint->status}}</span>
                            @endif
                        </td>

                        <td>
                                <a style="padding:3px; width:80px" href="{{url('/complaint_detail/'.$complaint->id)}}" class="btn btn-primary m-1 btn-sm">Detail</a>
                                <a style="padding:3px; width:86px" href="{{url('/feedback/'.$complaint->id)}}" class="btn btn-info m-1 btn-sm">Feedback</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
      
            </table>
        </div>
    </div>
@endsection