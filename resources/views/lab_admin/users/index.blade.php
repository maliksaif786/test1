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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">All Lab Admins</a></li>
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
        <!-- <a href="{{url('sub_categories/create')}}" class="btn btn-success float-right my-2">Add New</a> -->
        <h4 class="table-header">Lab Admins</h4>

        <div class="table-responsive mb-4">
            <table id="basic-dt" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th class="no-content"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                        <a style="padding:3px; width:80px" href="{{url('/lab_allocate/'.$user->id)}}"  class="btn btn-success m-1 btn-sm">Allocation</a>    
                        </td>
                    </tr>
                    @endforeach
                </tbody>
               
            </table>
        </div>
    </div>
    @endsection