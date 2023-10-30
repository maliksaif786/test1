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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboards</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Dashboard 1</span></li>
                        </ol>
                    </nav>
                </div>
            </li>
        </ul>

        <ul class="navbar-nav d-flex align-center ml-auto right-side-filter">
            <li class="nav-item more-dropdown">
                <div class="input-group input-group-sm">
                    <input id="rangeCalendarFlatpickr" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Date">
                    <div class="input-group-append">
                        <span class="input-group-text bg-primary border-primary" id="basic-addon2">
                            <i class="lar la-calendar"></i>
                        </span>
                    </div>
                </div>
            </li>
            <li class="nav-item more-dropdown">
                <a href="javascript: void(0);" data-original-title="Reload Data" data-placement="bottom" class="btn btn-primary dash-btn btn-sm ml-2 bs-tooltip">
                    <i class="las la-sync"></i>
                </a>
            </li>
            <li class="nav-item custom-dropdown-icon">
                <a href="javascript: void(0);" data-original-title="Filter" data-placement="bottom" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-primary dash-btn btn-sm ml-2 bs-tooltip">
                    <i class="las la-filter"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">
                    <a class="dropdown-item" data-value="Filter 1" href="javascript:void(0);">Filter 1</a>
                    <a class="dropdown-item" data-value="Filter 2" href="javascript:void(0);">Filter 2</a>
                    <a class="dropdown-item" data-value="Filter 3" href="javascript:void(0);">Filter 3</a>
                </div>
            </li>
        </ul>
    </header>
</div>
<!--  Navbar Ends / Breadcrumb Area  -->
<!-- Main Body Starts -->
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <a class="widget quick-category">
                <div class="quick-category-head">
                    <span class="quick-category-icon qc-primary rounded-circle">
                        <i class="la la-building"></i>
                    </span>
                    <div class="ml-auto">
                        <div class="quick-comparison qcompare-success">
                            <!-- <span>20%</span> -->
                            <i class="la la-building"></i>
                        </div>
                    </div>
                </div>
               
                <div class="quick-category-content">
                    <h3></h3>
                    <p class="font-17 text-primary mb-0">Total Venues</p>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <a class="widget quick-category">
                <div class="quick-category-head">
                    <span class="quick-category-icon qc-warning rounded-circle">
                        <i class="la la-cubes"></i>
                    </span>
                    <div class="ml-auto">
                        <div class="quick-comparison qcompare-danger">
                            <!-- <span>10%</span> -->
                            <i class="la la-cubes"></i>
                        </div>
                    </div>
                </div>
               
                <div class="quick-category-content">
                    <h3></h3>
                    <p class="font-17 text-warning mb-0">Total Categories</p>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <a class="widget quick-category">
                <div class="quick-category-head">
                    <span class="quick-category-icon qc-secondary rounded-circle">
                        <i class="la la-users"></i>
                    </span>
                    <div class="ml-auto">
                        <div class="quick-comparison qcompare-success">
                            <!-- <span>40%</span> -->
                            <i class="la la-users"></i>
                        </div>
                    </div>
                </div>
                <div class="quick-category-content">
                    <h3>30</h3>
                    <p class="font-17 text-secondary mb-0">Total Teachers</p>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <a class="widget quick-category">
                <div class="quick-category-head">
                    <span class="quick-category-icon qc-success-teal rounded-circle">
                        <i class="las la-user-plus"></i>
                    </span>
                    <div class="ml-auto">
                        <div class="quick-comparison qcompare-danger">
                            <!-- <span>50%</span> -->
                            <i class="las la-arrow-down"></i>
                        </div>
                    </div>
                </div>
                <div class="quick-category-content">
                    <h3>35</h3>
                    <p class="font-17 text-success-teal mb-0">New Customers</p>
                </div>
            </a>
        </div>

        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
            <div class="widget widget-three">
                <div class="widget-content">
                    <div class="widget-heading">
                        <h5 class="">Complaints</h5>
                        <span class="w-numeric-title">Status of last 8 days</span>
                    </div>
                    <div class="w-chart">
                        <div id="daily-sales"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
            <div class="widget widget-three">
                <div class="widget-heading">
                    <h5 class="">Total Complaints Issues</h5>
                    <span class="w-numeric-title">Year 2020</span>
                </div>
                <div class="widget-content">
                    <div class="customer-issues">
                        <div class="customer-issue-list">
                            <div class="customer-issue-details">
                                <div class="customer-issues-info">
                                    <h6 class="mb-2 font-12 text-success-teal">Resolved</h6>
                                    <p class="issues-count mb-2 font-12 text-success-teal">69000</p>
                                </div>
                                <div class="customer-issues-stats">
                                    <div class="progress">
                                        <div class="progress-bar bg-gradient-success position-relative" role="progressbar" style="width: 100%" aria-valuenow="69" aria-valuemin="0" aria-valuemax="100"><span class="success-teal"></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="customer-issue-list">
                            <div class="customer-issue-details">
                                <div class="customer-issues-info">
                                    <h6 class="mb-2 font-12 text-secondary">In Progress</h6>
                                    <p class="issues-count mb-2 font-12 text-secondary">2500</p>
                                </div>
                                <div class="customer-issues-stats">
                                    <div class="progress">
                                        <div class="progress-bar bg-gradient-secondary  position-relative" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"><span class="secondary"></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="customer-issue-list">
                            <div class="customer-issue-details">
                                <div class="customer-issues-info">
                                    <h6 class="mb-2 font-12 text-warning">Pending</h6>
                                    <p class="issues-count mb-2 font-12 text-warning">8500</p>
                                </div>
                                <div class="customer-issues-stats">
                                    <div class="progress">
                                        <div class="progress-bar bg-gradient-warning position-relative" role="progressbar" style="width: 11%" aria-valuenow="11" aria-valuemin="0" aria-valuemax="100"><span class="warning"></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-activity-four">
                <div class="widget-heading">
                    <h5 class="text-center"></h5>
                </div>
                <div class="widget-content">
                    <div id="registration-types">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget dashboard-table">
                <div class="widget-heading">
                    <h5 class="">Latest Complaints</h5>
                </div>
                <div class="widget-content">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="th-content">Name</div>
                                    </th>
                                    <th>
                                        <div class="th-content">Date</div>
                                    </th>
                                    <th>
                                        <div class="th-content">Venue</div>
                                    </th>
                                    <th>
                                        <div class="th-content">Description</div>
                                    </th>
                                    <th>
                                        <div class="th-content">Status</div>
                                    </th>
                                    <th>
                                        <div class="th-content">action</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Asad</td>
                                    <td>Jun 20, 2018</td>
                                    <td>lab1</td>
                                    <td>
                                       windows issue
                                    </td>
                                    <td><span class="badge badge-danger"> Pending </span></td>
                                    <td><a href="" class="btn btn-primary">Details</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div>
@endsection

