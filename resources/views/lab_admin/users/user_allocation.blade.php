@extends('lab_admin.layouts.master')

@section('content')
<!-- Navbar Starts / Breadcrumb Area -->
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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">All Lab Admins</a></li>
                        </ol>
                    </nav>
                </div>
            </li>
        </ul>
    </header>
</div>
<!-- Navbar Ends / Breadcrumb Area -->

<div class="row">
    <div class="col-xl-6 col-lg-6 col-sm-6">
        <div class="widget-content widget-content-area br-6">
            <?php
            use App\Models\User;
            $labAdmin = User::where('id',$lab_admin_id)->first();
            ?>
            <h4 class="table-header">{{$labAdmin->name}} Allocate Labs</h4>

            <div class="table-responsive mb-4">
                <table id="basic-dt" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <!-- <th>Lab Admin</th> -->
                            <th>Venue</th>
                            <th class="no-content">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($venueAllocations as $user)
                        <tr>
                            <!-- <td>{{$user->user->name}}</td> -->
                            <td>{{$user->venue->name}}</td>
                            <td>
                                <a style="padding:3px; width:80px" href="{{url('/lab_deallocate/'.$user->id)}}"
                                    class="btn btn-danger m-1 btn-sm">Deallocate</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="col-xl-6 col-lg-6 col-sm-6">
        <div class="statbox widget box box-shadow mb-4">
            <div class="widget-header bg-success">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Lab Allocate Category</h4>
                    </div>
                </div>
            </div>
            <form method="post" action="{{url('lab_allocattion')}}">
                @csrf
                <input type="hidden" name="lab_admin_id" value="{{$lab_admin_id}}">
                <div class="widget-content widget-content-area">
                    <div class="form-group row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group mb-2">
                                <label class="col-form-label">Venue</label>
                                <select name="venue_id"  class="form-control" required>
                                    <option value="">Select Venue</option>
                                    @foreach($venues as $venue)
                                    <option value="{{$venue->id}}">{{$venue->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget-footer text-right">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
