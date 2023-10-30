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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">All Categories</a></li>
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
        <a href="{{url('categories/create')}}" class="btn btn-success float-right my-2">Add New</a>
        <h4 class="table-header">Categories</h4>

        <div class="table-responsive mb-4">
            <table id="basic-dt" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th class="no-content"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>
                            <form method="POST" action="{{url('/categories/'.$category->id)}}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a style="padding:3px; width:56px" href="{{url('/categories/'.$category->id.'/edit')}}" class="btn btn-info m-1 btn-sm">Edit</a>
                                <button style="padding:3px; width:56px" type="submit" data-toggle="confirmation" class="btn btn-danger m-1 btn-sm">
                                    Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th class="no-content"></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    @endsection