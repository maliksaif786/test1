@extends('lab.layouts.master')
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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Complaint Detail</a></li>
                        </ol>
                    </nav>
                </div>
            </li>
        </ul>
    </header>
</div>
<!--  Navbar Ends / Breadcrumb Area  -->
<div class="container mt-5">
<div class="widget-content widget-content-area ">
<h4 class="table-header">Complaint Detail</h4>
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="table-responsive mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-hover">
                                <tr>
                                    <th>Teacher</th>
                                    <td>{{ $complaint->user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Venue</th>
                                    <td>{{ $complaint->venue->name }}</td>
                                </tr>
                                <tr>
                                    <th>status</th>
                                    <td> @if($complaint->status=='resolved')
                            <span class="badge badge-success">{{$complaint->status}}</span>
                            @else
                            <span class="badge badge-danger">{{$complaint->status}}</span>
                            @endif</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-hover">
                                <tr>
                                    <th>Category</th>
                                    <td>{{ $complaint->category->name }}</td>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <td>{{ $complaint->date }}</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ $complaint->description }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- status update -->
<div class="col-md-8 mt-5">
<form method="post" action="{{url('update_status')}}">
                @csrf
                <input type="hidden" name="complain_id" value="{{$complaint->id}}">
                <div class="widget-content widget-content-area">
                    <div class="form-group row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="form-group">
                                <select name="status"  class="form-control" required>
                                    <option value="">Select Status</option>
                                    <option value="resolved">Resolved</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="form-group mb-2">
                             <button type="submit" class="btn btn-success mr-2">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
</div>



<!-- actions detail -->
<div class="col-md-12 mt-5">
    <div class="card d-block">
        <div class="card-body">
            <h4 class="mt-0 font-18">Actions</h4>
            @php
            $array = [1, 2, 3, 4, 5];
            $count = count($actions);
            @endphp
            @if($count > 0)
            @foreach($actions as $action)
            <div class="media mt-4">
                <img class="mr-2 rounded-circle" src="{{asset('admin-theme/common-assets/img/profile-23.jpg')}}"
                    alt="Generic placeholder image" height="32">
                <div class="media-body">
                    <h5 class="mt-0 mb-1 font-15">Sajid
                        <small class="text-muted float-right font-11">
                            @php
                            $carbonDate = \Carbon\Carbon::parse($action->created_at);
                            @endphp
                            {{ $carbonDate->diffForHumans() }}
                        </small>
                    </h5>
                    <span class="font-13">{{$action->action}}.</span>

                </div>
            </div>
            @endforeach
            @else
            <p>No Action</p>
            @endif

            <form action="{{url('action_save')}}" method="post">
                @csrf
                <input type="hidden" name="complain_id" value="{{$complaint->id}}">
                <div class="form-group mb-0 align-items-center d-flex mt-5">
                    <textarea name="action" placeholder="Type here" class="form-control" required=""></textarea>
                    <button class="ml-2 btn-sm btn btn-primary bg-gradient-primary" type="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection