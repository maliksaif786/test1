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



<!-- Feedback detail -->
<div class="col-md-12 mt-5">
    <div class="card d-block">
        <div class="card-body">
            <h4 class="mt-0 font-18">Feedbacks</h4>
            @php
            $array = [1, 2, 3, 4, 5];
            $count = count($feedbacks);
            @endphp
            @if($count > 0)
            @foreach($feedbacks as $action)
            <div class="media mt-4">
                <img class="mr-2 rounded-circle" src="{{asset('admin-theme/common-assets/img/profile-23.jpg')}}"
                    alt="Generic placeholder image" height="32">
                <div class="media-body">
                    <h5 class="mt-0 mb-1 font-15">{{$user->name}}
                        <small class="text-muted float-right font-11">
                            @php
                            $carbonDate = \Carbon\Carbon::parse($action->created_at);
                            @endphp
                            {{ $carbonDate->diffForHumans() }}
                        </small>
                    </h5>
                    <span class="font-13">{{$action->comment}}.</span>

                </div>
            </div>
            @endforeach
            @else
            <p>No Action</p>
            @endif

            <form action="{{url('feedback_save')}}" method="post">
                @csrf
                <input type="hidden" name="complain_id" value="{{$complaint->id}}">
                <div class="form-group mb-0 align-items-center d-flex mt-5">
                    <textarea name="comment" placeholder="Type here" class="form-control" required=""></textarea>
                    <button class="ml-2 btn-sm btn btn-primary bg-gradient-primary" type="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection