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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Complaints Actions</a></li>
                        </ol>
                    </nav>
                </div>
            </li>
        </ul>
    </header>
</div>

<!-- status update -->
<div class="col-md-8 mt-5">
    @if($comReq==0)
    <form method="post" action="{{url('update_status')}}">
        @csrf
        @foreach (request('id') as $id)
                <input type="hidden" name="complain_id[]" value="{{$id}}">
                @endforeach
        <div class="widget-content widget-content-area">
            <div class="form-group row">
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <div class="form-group">
                        <select name="status" class="form-control" required>
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
    @else
    <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="form-group mb-2">
                        <button type="submit" class="btn btn-danger ">Process please wait...</button>
                    </div>
                </div>
                @endif

</div>

<div class="row mt-5">

<div class="col-xl-6 col-lg-6 col-sm-6 layout-spacing">
    <div class="widget-content widget-content-area br-6">
        <h4 class="table-header">Complaint</h4>
        <div class="table-responsive mb-4">
            <table class="table table-hover" style="width:100%">
            <thead>
                            <tr>
                                <th>User</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody class="complaint-detail">
                            @foreach($selectedComplaints as $c)
                                <tr>
                                    <td>{{ $c->user->name }}</td>
                                    <td>{{ $c->created_at }}</td>
                                    <td>{{ $c->status }}</td>
                                    <td>{{ $c->description }}</td>
                                </tr>
                            @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- actions detail -->
<div class="col-md-6">
    <div class="card d-block">
        <div class="card-body">
            <h4 class="mt-0 font-18">Actions
            @foreach (request('id') as $id)
  
@endforeach
            </h4>
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

            <form action="{{url('all_action_save')}}" method="post">
                @csrf
                @foreach (request('id') as $id)
                <input type="hidden" name="complain_id[]" value="{{$id}}">
                @endforeach
                <div class="form-group mb-0 align-items-center d-flex mt-5">
                    <textarea name="action" placeholder="Type here" class="form-control" required=""></textarea>
                    <button class="ml-2 btn-sm btn btn-primary bg-gradient-primary" type="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
    
</div>

@endsection