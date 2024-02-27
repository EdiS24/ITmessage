      <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">

                    <!--- Sidemenu -->
					<!-- Log on to codeastro.com for more projects! -->
                    <div id="sidebar-menu">
                        
                        <!-- Left Menu Start -->
                        <ul class="metismenu" id="side-menu">
                            <li class="menu-title">{{__('global.main')}}</li>
                            <li class="">
                                <a href="{{route('admin')}}" class="waves-effect {{ request()->is("admin") || request()->is("admin/*") ? "mm active" : "" }}">
                                    <i class="ti-home"></i> <span> {{__('global.dashboard')}} </span>
                                </a>
                            </li>
                            

                            <li>
                            <a href="{{route('employees.index')}}" class="waves-effect {{ request()->is("employees") || request()->is("/employees/*") ? "mm active" : "" }}"><i class="ti-user"></i><span> {{__('global.members')}} </span></a>
                                <!-- <ul class="submenu">
                                    <li>
                                        <i class="dripicons-view-apps"></i><span>Employees List</span></a>
                                    </li>
                                   
                                </ul> -->
                            </li>
							<!-- Log on to codeastro.com for more projects! -->
                            <li class="menu-title">{{__('global.management')}}</li>

                            <li class="">
                                <a href="{{route('schedule.index')}}" class="waves-effect {{ request()->is("schedule") || request()->is("schedule/*") ? "mm active" : "" }}">
                                    <i class="dripicons-alarm"></i> <span> {{__('global.notifications')}} </span>
                                </a>
                            </li>
                             <li class="">
                                <a href="{{route('date.index')}}" class="waves-effect {{ request()->is("date") || request()->is("date/*") ? "mm active" : "" }}">
                                    <i class="ti-calendar"></i> <span> {{__('global.dates')}} </span>
                                </a>
                            </li>
                            
                            <li class="">
                                <a href="{{route('position.index')}}" class="waves-effect {{ request()->is("position") || request()->is("position/*") ? "mm active" : "" }}">
                                    <i class="dripicons-to-do"></i> <span> {{__('global.groups')}} </span>
                                </a>
                            </li>

                            {{-- <li class="">
                                <a href="/attendance" class="waves-effect {{ request()->is("attendance") || request()->is("attendance/*") ? "mm active" : "" }}">
                                    <i class="ti-calendar"></i> <span> Attendance Logs </span>
                                </a>
                            </li> --}}
                            {{-- <li class="">
                                <a href="/latetime" class="waves-effect {{ request()->is("latetime") || request()->is("latetime/*") ? "mm active" : "" }}">
                                    <i class="dripicons-warning"></i><span> Late Time </span>
                                </a>
                            </li>  --}}
                             {{-- <li class="">
                                <a href="/leave" class="waves-effect {{ request()->is("leave") || request()->is("leave/*") ? "mm active" : "" }}">
                                    <i class="dripicons-backspace"></i> <span> Leave </span>
                                </a>
                            </li> --}}
                            {{-- <li class="">
                                <a href="/overtime" class="waves-effect {{ request()->is("overtime") || request()->is("overtime/*") ? "mm active" : "" }}">
                                    <i class="dripicons-alarm"></i> <span> Over Time </span>
                                </a>
                            </li> --}}
                            {{-- <li class="menu-title">Tools</li>
                            <li class="">
                                <a href="{{ route("finger_device.index") }}" class="waves-effect {{ request()->is("finger_device") || request()->is("finger_device/*") ? "mm active" : "" }}">
                                    <i class="fas fa-fingerprint"></i> <span> Biometric Device </span>
                                </a>
                            </li>  --}}

                        </ul>
						<!-- Log on to codeastro.com for more projects! -->
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->
