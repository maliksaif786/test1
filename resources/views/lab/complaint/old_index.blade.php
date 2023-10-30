@extends('lab.layouts.master')
@section('content')

<style> /* Styles for the modal */ .modal { display: none; position: fixed; z-index: 1; left: 0; top: 0; width: 100%;
    height: 100%; background-color: rgba(0, 0, 0, 0.7); } .modal-content { background-color: #fff; margin: 15% auto;
    padding: 20px; border: 1px solid #888; width: 80%; max-width: 600px; position: relative; } .close { position:
    absolute; top: 0; right: 0; padding: 10px; cursor: pointer; } </style> <!-- Navbar Starts / Breadcrumb Area -->
    <div class="sub-header-container"> <header class="header navbar navbar-expand-sm"> <a href="javascript:void(0);"
        class="sidebarCollapse" data-placement="bottom">
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

 <!-- Your HTML code -->
<div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
    <div class="widget-content widget-content-area br-6">
        <h4 class="table-header">Complaint</h4>
        <div class="table-responsive mb-4">
            <table id="basic-dt" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Venue</th>
                        <th>Category</th>
                        <th>Count</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($complaints as $venueCategory => $complaintGroup)
                        @foreach ($complaintGroup as $index => $complaintsForCategory)
                            <tr>
                                <td>{{ $complaintsForCategory[0]->venue->name }}</td>
                                <td>{{ $complaintsForCategory[0]->category->name }}</td>
                                <td class="complaint-count">{{ count($complaintsForCategory) }}</td>
                                <td>
                                    <button class="btn btn-primary open-modal-btn" data-modal-id="myModal{{ $index }}">Details</button>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
@foreach($complaints as $venueCategory => $complaintGroup)
    @foreach ($complaintGroup as $index => $complaintsForCategory)
        <div id="myModal{{ $index }}" class="modal">
            <div class="modal-content">
                <span class="close" id="closeModal{{ $index }}">&times;</span>
                <div id="modalContent">
                    <h2>Complaint Details</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Complaint ID</th>
                                <th>User</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="complaint-detail">
                            @foreach($complaintsForCategory as $c)
                                <tr>
                                    <td>{{ $c->id }}</td>
                                    <td>{{ $c->user->name }}</td>
                                    <td>{{ $c->created_at }}</td>
                                    <td>{{ $c->status }}</td>
                                    <td>
                                        <a href="{{url('take_action/'. $c->id)}}" class="btn btn-primary">Action</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endforeach
@endforeach

<script>
    const modalBtns = document.querySelectorAll(".open-modal-btn");
    modalBtns.forEach((btn) => {
        btn.addEventListener("click", function () {
            const modalId = this.getAttribute("data-modal-id");
            const modal = document.getElementById(modalId);

            modal.style.display = "block";
        });
    });

    const closeBtns = document.querySelectorAll(".close");

    closeBtns.forEach((btn) => {
        btn.addEventListener("click", function () {
            const modalId = this.getAttribute("id");
            const modal = document.getElementById(modalId.replace("close", ""));

            modal.style.display = "none";
        });
    });

    window.addEventListener("click", function (event) {
        modalBtns.forEach((btn) => {
            const modalId = btn.getAttribute("data-modal-id");
            const modal = document.getElementById(modalId);
            if (event.target === modal) {
                modal.style.display = "none";
            }
        });
    });
</script>



    @endsection