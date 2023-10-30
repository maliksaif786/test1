@extends('teacher.layouts.master')
@section('content')

<div class="layout-px-spacing">
                <div class="layout-top-spacing mb-2">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="container p-0">
                                <div class="row layout-top-spacing">
                                    <div class="col-lg-8 layout-spacing">
                                        <div class="statbox widget box box-shadow mb-4">
                                            <div class="widget-header bg-success">
                                                <div class="row">
                                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                        <h4>Add Complaint</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <form method="post" action="{{route('complaints.store')}}">
                                                @csrf
                                            <div class="widget-content widget-content-area">
                                                <div class="form-group row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                       
                                                            <div class="form-group mb-2">
                                                                <label class="col-form-label">Venue <span class="text-danger">*</span></label>
                                                                <select name="venue_id" class="form-control" required>
                                                                    <option value="">Select Venue</option>
                                                                    @foreach($venues as $venue)
                                                                    <option value="{{$venue->id}}">{{$venue->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                          <div class="form-group mb-2">
                                                            <label class="col-form-label">Category <span class="text-danger">*</span></label>
                                                            <select name="category_id" class="form-control" id="category" required>
                                                                <option value="">Select Category</option>
                                                                @foreach($categories as $category)
                                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="form-group mb-2">
                                                            <label class="col-form-label">Subcategory <span class="text-danger">*</span></label>
                                                            <select name="subcategory_id" class="form-control" id="subcategory" required>
                                                                <option value="">Select Subcategory</option>
                                                            </select>
                                                        </div>

                                                            <div class="form-group mb-2">
                                                                <label class="col-form-label">Date <span class="text-danger">*</span></label>
                                                                <input type="date" class="form-control" name="date" required>
                                                            </div>
                                                            <div class="form-group mb-2">
                                                                <label class="col-form-label">Description <span class="text-danger">*</span></label>
                                                                <textarea name="description" class="form-control" cols="30" rows="10" required></textarea>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-footer text-right">
                                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                                <button type="reset" class="btn btn-outline-primary">Cancel</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        // Handle category change event
        $("#category").change(function () {
            var categoryID = $(this).val();
            if (categoryID) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('/get-subcategories/') }}" + '/' + categoryID,
                    success: function (subcategories) {
                        // Clear subcategory dropdown
                        $("#subcategory").empty();

                        // Append new options to subcategory dropdown
                        $.each(subcategories, function (key, value) {
                            $("#subcategory").append(
                                $('<option>', {
                                    value: key,
                                    text: value
                                })
                            );
                        });
                    }
                });
            } else {
                // If no category selected, clear subcategory dropdown
                $("#subcategory").empty();
            }
        });
    });
</script>

@endsection