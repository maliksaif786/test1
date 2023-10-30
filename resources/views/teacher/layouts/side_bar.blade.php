 <!--  Sidebar Starts  -->
 <div class="sidebar-wrapper sidebar-theme">
            <nav id="sidebar">
                <ul class="list-unstyled menu-categories" id="accordionExample">
                    <li class="menu">
                        <a href="#dashboard" data-active="true" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                            <div class="">
                                <i class="las la-home"></i>
                                <span>Dashboards</span>
                            </div>
                        </a>
                    </li>
                   
                    <li class="menu-title">Pages</li>

                    <?php
                        use App\Models\ComplainRequest;
                        use App\Models\Complaint;
                        $userID = Auth::user()->id;
                        $allcomplaints = Complaint::where('user_id', $userID)->get();
                        $complaintsRequests = [];
                        
                        foreach ($allcomplaints as $complaint) {
                            $complaintRequests = ComplainRequest::where('status','resolved')->where('complain_id', $complaint->id)->get();
                            $complaintsRequests = array_merge($complaintsRequests, $complaintRequests->all());
                        }
                        $totalResolvedComplaintRequests = count($complaintsRequests);
                    ?>
                    <!-- complaint start --> 
                    <li class="menu">
                        <a href="{{url('complaint_requests')}}"  class="dropdown-toggle">
                            <div class="">
                                <i class="la la-weixin"></i>
                                <span>Complaint Req</span>
                            </div>
                            <div>
                                <span class="menu-badge badge-danger">{{$totalResolvedComplaintRequests}}</span>
                            </div>
                        </a>
                    </li>
                    <!-- end complaint -->

                    <li class="menu active">
                        <a href="#maps" data-active="true"  data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                            <div class="">
                            <i class="la la-cubes"></i>
                                <span>Complaints</span>
                            </div>
                            <div>
                                <i class="las la-angle-right sidemenu-right-icon"></i>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled show" id="maps" data-parent="#accordionExample">
                            <li class="active">
                                 <a href="{{url('complaints')}}"  class="dropdown-toggle">
                                 All Complaints
                                </a>
                            </li>
                            <li>
                            <a href="{{url('resolved_complaints')}}"  class="dropdown-toggle">
                                <span>Resolved Complaints</span>
                            </a>
                            </li>
                            <li>
                            <a href="{{url('unresolved_complaints')}}"  class="dropdown-toggle">
                                <span>UnResolved Complaints</span>
                            </a>
                            </li>
                        </ul>
                    </li>
 
                </ul>
            </nav>
        </div>
        <!--  Sidebar Ends  -->