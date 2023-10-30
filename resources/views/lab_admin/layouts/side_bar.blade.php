 <!--  Sidebar Starts  -->
 <div class="sidebar-wrapper sidebar-theme">
            <nav id="sidebar">
                <ul class="list-unstyled menu-categories" id="accordionExample">
                    <li class="menu">
                        <a href="{{url('admin/dashboard')}}" data-active="true"  class="dropdown-toggle">
                            <div class="">
                                <i class="las la-home"></i>
                                <span>Dashboards</span>
                            </div>
                        </a> 
                    </li>
                    <?php
                        use App\Models\Venue;
                        $total_venues = Venue::count();
                    ?>
                   
                    <li class="menu-title">Pages</li>
                    <li class="menu">
                        <a href="{{url('lab_admins')}}"  class="dropdown-toggle">
                            <div class="">
                                <i class="fa fa-users"></i>
                                <span>Users</span>
                            </div>
                           
                        </a>
                       
                    </li>

                    <li class="menu">
                        <a href="{{url('venues')}}"  class="dropdown-toggle">
                            <div class="">
                                <i class="fa fa-building"></i>
                                <span>Venues</span>
                            </div>
                            <div>
                                <span class="menu-badge badge-danger">{{$total_venues}}</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="#maps" data-active="false"  data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                            <i class="fa fa-cubes"></i>
                                <span>Categories</span>
                            </div>
                            <div>
                                <i class="las la-angle-right sidemenu-right-icon"></i>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="maps" data-parent="#accordionExample">
                            <li class="active">
                                 <a href="{{url('categories')}}"  class="dropdown-toggle">
                                   Categories
                                </a>
                            </li>
                            <li>
                            <a href="{{url('sub_categories')}}"  class="dropdown-toggle">
                                <span>Sub Categories</span>
                        </a>
                            </li>
                        </ul>
                    </li>


                    <!-- complaint start --> 
                    <li class="menu">
                        <a href="{{url('admin/complaints')}}"  class="dropdown-toggle">
                            <div class="">
                                <i class="fa fa-message"></i>
                                <span>Complaints</span>
                            </div>
                        </a>
                    </li>
                    <!-- end complaint -->

                     <!-- time start --> 
                     <li class="menu">
                        <a href="{{url('times')}}"  class="dropdown-toggle">
                            <div class="">
                            <i class="far fa-clock"></i> 
                                <span>Time</span>
                            </div>
                        </a>
                    </li>
                    <!-- end time -->

                    <!-- Settings -->
                    <li class="menu">
                        <a href="#settings" data-active="false"  data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                            <i class="fa fa-cubes"></i>
                                <span>Settings</span>
                            </div>
                            <div>
                                <i class="las la-angle-right sidemenu-right-icon"></i>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="settings" data-parent="#accordionExample">
                            <li class="active">
                                 <a href="{{url('category_alert')}}"  class="dropdown-toggle">
                                    Category Alert
                                </a>
                            </li>
                            <li>
                            <a href="{{url('sub_categories')}}"  class="dropdown-toggle">
                                <span>Role Alert</span>
                        </a>
                            </li>
                        </ul>
                    </li>
                    <!-- End settings -->
 
                </ul>
            </nav>
        </div>
        <!--  Sidebar Ends  -->