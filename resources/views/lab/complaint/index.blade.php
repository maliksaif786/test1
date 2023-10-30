@extends('lab.layouts.master')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <style>
        /* Style for the modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            position: relative;
        }

        .close {
            position: absolute;
            right: 10px;
            top: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
    <div class="widget-content widget-content-area br-6">
        <h4 class="table-header">Complaint</h4>
        <div class="table-responsive mb-4">
            <table id="basic-dt" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Venue</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Count</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example data, replace this with your actual data -->
                    @foreach ($complaints as $venueCategoryDate => $complaintGroup)
                        @foreach ($complaintGroup as $index => $complaintsForCategory)
                            <tr>
                                <td>{{ $complaintsForCategory[0]->venue->name }}</td>
                                <td>{{ $complaintsForCategory[0]->category->name }}</td>
                                <td>{{ $venueCategoryDate }}</td>
                                <td class="complaint-count">{{ count($complaintsForCategory) }}</td>
                                <td>
                                    @if(count($complaintsForCategory) == 1)
                                    {{$complaintsForCategory[0]->description}}
                                    @else 
                                    <!-- You can add a message or leave it empty -->
                                    @endif
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="btn btn-primary detail-button" data-details='@json($complaintsForCategory)'>Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal" id="complaintModal">
    <div class="modal-content">
        <h3>Complaint Detail</h3>
        <span class="close" id="closeModal">&times;</span>
        <table class="complaint-details table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Complaint details will be dynamically populated here -->
            </tbody>
        </table>
        <button style="display:none" id="performAction" class="btn btn-primary">Action for All</button>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const detailButtons = document.querySelectorAll(".detail-button");
        const modal = document.getElementById("complaintModal");
        const closeModal = document.getElementById("closeModal");
        const complaintDetails = modal.querySelector(".complaint-details");
        const performActionButton = document.getElementById("performAction");

        // Initialize an empty array to store complaint data
        let allComplaints = [];

        detailButtons.forEach((button) => {
            button.addEventListener("click", function () {
                // Clear existing content
                complaintDetails.querySelector("tbody").innerHTML = "";

                // Get complaint details from the data-details attribute
                const details = JSON.parse(this.getAttribute("data-details"));
                const performAction = document.getElementById("performAction");

                if (details.length > 1) {
                   
                    performAction.style.display = "block";
                } else {
                    
                    performAction.style.display = "none";
                }

                // Store the complaint data
                allComplaints = details;

                details.forEach((c) => {
                    const row = document.createElement("tr");
                    row.innerHTML = `
                        <td>${c.id}</td>
                        <td>${c.user}</td>
                        <td>${c.date}</td>
                        <td>${c.status}</td>
                        <td>${c.description}</td>
                        <td><a href="{{ url('take_action') }}/${c.id}" class="btn btn-primary">Take Action</a></td>
                    `;
                    complaintDetails.querySelector("tbody").appendChild(row);
                });

                // Show the modal when the "Detail" button is clicked
                modal.style.display = "block";
            });
        });

        // Handle the action when "Perform Action for All" is clicked
        performActionButton.addEventListener("click", function () {
            const complaintIds = allComplaints.map(c => c.id);

            const url = "{{ url('all_take_action') }}?id[]=" + complaintIds.join("&id[]=");
            window.location.href = url;
        });

        // Close the modal when the close button is clicked
closeModal.addEventListener("click", function () {
    modal.style.display = "none";
});

// Close the modal when the user clicks outside of it
window.addEventListener("click", function (event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
});
    });
</script>

</body>
</html>

@endsection
