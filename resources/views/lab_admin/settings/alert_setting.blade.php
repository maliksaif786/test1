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
           
            <h4 class="table-header"> Alert Settings</h4>

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
                        @foreach($settings as $setting)
                        <tr>
                            <td>{{$setting->role}}</td>
                            <td>
                                <a style="padding:3px; width:80px" href="{{url('/lab_deallocate/'.$setting->id)}}"
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
                        <h4>Add  Setting</h4>
                    </div>
                </div>
            </div>
            <form method="post" action="{{url('category_alert_save')}}">
                @csrf
               
                <div class="widget-content widget-content-area">
                    <div class="form-group row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group mb-2">
                                <label class="col-form-label">Venue</label>
                                <select name="category_id"  class="form-control" required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group mb-2">
                                <label class="col-form-label">Venue</label>
                                <select name="role"  class="form-control" required>
                                    <option value="hod">HOD</option>
                                    <option value="teacher">Teacher</option>
                                    <option value="lab_admin">Lab Admin</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group mb-2">
                                <label class="col-form-label">Day</label>
                               <input type="text" name="day" class="form-control" required>
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
