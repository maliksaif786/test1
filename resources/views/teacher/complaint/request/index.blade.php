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
        <h4 class="table-header">Resolved Complaint Requests</h4>

        <div class="table-responsive mb-4">
            <table id="basic-dt" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Location</th>
                        <th>Category</th>
                        <th>Date</th>
                        <!-- <th>Status</th> -->
                        <th class="no-content">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($complaintsRequests as $complaint)
                    <tr>
                        <td>{{$complaint->user->name}}</td>
                        <td>{{$complaint->complain->venue->name}}</td>
                        <td>{{$complaint->complain->category->name}}</td>
                        <td>{{$complaint->date}}</td>
                        <!-- <td>
                            @if($complaint->status=='resolved')
                            <span class="badge badge-warning">{{$complaint->status}}</span>
                            @else
                            <span class="badge badge-danger">{{$complaint->status}}</span>
                            @endif
                        </td> -->

                        <td>
                                <a style="padding:3px; width:80px" href="{{url('/complaint_accept/'.$complaint->id)}}" class="btn btn-success m-1 btn-sm">Accept</a>
                                <a style="padding:3px; width:56px" href="{{url('/complaint_reject/'.$complaint->id)}}" class="btn btn-danger m-1 btn-sm">Reject</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection