<!-- start: header -->
<header class="header">
        <div class="logo-container">
            <a href="../" class="logo">
                <img src="{{asset('assets/images/move.png')}}" height="47"  alt="JSOFT Admin" />
            </a>
            <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>
        </div>
    
        <!-- start: search & user box -->
        <div class="header-right">
    
            <form action="pages-search-results.html" class="search nav-form">
                <div class="input-group input-search">
                    <input type="text" class="form-control" name="q" id="q" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
    
            <span class="separator"></span>
    
            <ul class="notifications">

                <li>
                    <div class="dropdown-menu notification-menu large">
                        <div class="notification-title">
                            <span class="pull-right label label-default">3</span>
                            Tasks
                        </div>
    
                        <div class="content">
                            <ul>
                                <li>
                                    <p class="clearfix mb-xs">
                                        <span class="message pull-left">Generating Sales Report</span>
                                        <span class="message pull-right text-dark">60%</span>
                                    </p>
                                    <div class="progress progress-xs light">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                    </div>
                                </li>
    
                                <li>
                                    <p class="clearfix mb-xs">
                                        <span class="message pull-left">Importing Contacts</span>
                                        <span class="message pull-right text-dark">98%</span>
                                    </p>
                                    <div class="progress progress-xs light">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100" style="width: 98%;"></div>
                                    </div>
                                </li>
    
                                <li>
                                    <p class="clearfix mb-xs">
                                        <span class="message pull-left">Uploading something big</span>
                                        <span class="message pull-right text-dark">33%</span>
                                    </p>
                                    <div class="progress progress-xs light mb-xs">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 33%;"></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li>
                   
                    <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                        <i class="fa fa-bell"></i>
                        <span class="badge">{{auth()->user()->notifications->count()}}</span>
                    </a>
                   
                    <div class="dropdown-menu notification-menu">
                        <div class="notification-title">
                        <span class="pull-right label label-default">{{auth()->user()->notifications->count()}}</span>
                            Alerts
                        </div>
                        <div class="content">
                            <ul>
                                   
                                   
                                <li>
                                    <a href="#" class="clearfix">
                                        <div class="image">
                                            <i class="fa fa-thumbs-up bg-danger"></i>
                                        </div>
                                    <span class="title">Message</span>
                                    <span class="message">
                                    @foreach (auth()->user()->notifications as $notification)
                                    <div class="panel panel-default alert alert-info" role="alert">
                                    Expense:
                                    {{$notification = auth()->user()->notifications[0]->data['expense']}}
                                    </div>
                                       <div class="panel panel-default">
                                       {{$notification = auth()->user()->notifications[0]->data['purpose']}}
                                       </div>
                                       @endforeach
                                        </span>
                                    </a>
                                </li>
                               
                            </ul>
    
                            <hr />
    
                            <div class="text-right">
                                <a href="#" class="view-more">View All</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
    
            <span class="separator"></span>
    
            <div id="userbox" class="userbox">
                <a href="#" data-toggle="dropdown">
                    <figure class="profile-picture">
                        <img src="http://stylopics.com/wp-content/uploads/2013/09/itm_cute-white-cat-in-bucket2013-02-15_13-27-48_1.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="http://stylopics.com/wp-content/uploads/2013/09/itm_cute-white-cat-in-bucket2013-02-15_13-27-48_1.jpg" />
                    </figure>
                    @if(Auth::guard('admin')->check())
                    <div class="profile-info" >
                    
                        <span class="name"> {{Auth::user()->firstname}}</span>
                        <span class="role">administrator</span>
                       </div>
    
                    <i class="fa custom-caret"></i>
                </a>
    
                <div class="dropdown-menu">
                    <ul class="list-unstyled">
                        <li class="divider"></li>
                        <li>
                            <a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i class="fa fa-user"></i> My Profile</a>
                        </li>
                        <li>
                            <a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
                        </li>
                        <li>
                            <a role="menuitem" tabindex="-1" href="/admin/logout"><i class="fa fa-power-off"></i> Logout</a>
                        </li>
                    </ul>
                </div>
               
                @elseif(Auth::guard('web')->check())
                <div class="profile-info" >
                
                    <span class="name"> {{Auth::user()->firstname}}</span>
                    <span class="role">User</span>
                   </div>

                <i class="fa custom-caret"></i>
            </a>

            <div class="dropdown-menu">
                <ul class="list-unstyled">
                    <li class="divider"></li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i class="fa fa-user"></i> My Profile</a>
                    </li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
                    </li>
                    <li>
                    <a role="menuitem" tabindex="-1" href="{{route('users.logout')}}"><i class="fa fa-power-off"></i> Logout</a>
                    </li>
                </ul>
            </div>
            @endif
            </div>
        </div>
        <!-- end: search & user box -->
    </header>
    <!-- end: header -->