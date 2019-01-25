
        <!-- start: sidebar -->
        <aside id="sidebar-left" class="sidebar-left">
        
            <div class="sidebar-header">
                <div class="sidebar-title">
                   <h4 style="font-size:15px" class="text-primary"> Navigation</h4>
                </div>
                <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>
        
            <div class="nano">
                <div class="nano-content">
                    <nav id="menu" class="nav-main" role="navigation">
                        <ul class="nav nav-main">
                            <li class="nav-active">
                                <a style="font-size:15px" href="/admin">
                                    <i style="font-size:24px"class="fa fa-home" aria-hidden="true"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                           
                            <li class="nav-parent">
                                   
                                <a style="font-size:15px">
                                    <i style="font-size:24px" class="fa fa-link" aria-hidden="true"></i>
                                    <span>Users</span>
                                </a>
                                <ul class="nav nav-children ">     
                                    <li>
                                        <a href="/admin/user/create">
                                             Add User
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/admin/user/role">
                                             Add Role
                                        </a>
                                    </li>
                                    <li>
                                        <a  href="/admin/user/view">
                                             View Users
                                        </a>
                                    </li>   
                                </ul>   
                            </li>
                            <li class="nav-parent">
                                <a style="font-size:15px">
                                    <i style="font-size:24px" class="fa fa-building-o" aria-hidden="true"></i>
                                    <span>Departments</span>
                                </a>
                                <ul class="nav nav-children">
                                   
                                    <li>
                                        <a href="{{ route('admin.dept.create') }}">
                                             Add Department
                                        </a>
                                    </li> 
                                    <li>
                                        <a href="{{ route('admin.dept.show') }}">
                                             View Departments
                                        </a>
                                    </li>    
                                </ul>
                            </li>             
                            <li class="nav-parent">
                                <a style="font-size:15px">
                                    <i style="font-size:24px" class="fa fa-gear fa-spin" aria-hidden="true"></i>
                                    <span>Settings</span>
                                </a>
                                <ul class="nav nav-children">
                                    <li>
                                        <a class="fa fa-envelope" style="font-size:18px" href="/admin/setting/email">
                                             Mail
                                        </a>
                                    </li>
                                    <li>
                                        <a class="fa fa-mobile-phone" style="font-size:24px" href="/admin/setting/sms">
                                             Sms
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-parent">
                                           
                                    <a style="font-size:15px">
                                        <i style="font-size:24px" class="fa fa-tasks" aria-hidden="true"></i>
                                                <span>Tasks</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li>
                                            <a class="fa fa-thumb-tack"  style="font-size:18px" href="/admin/tasks/assign">
                                                 Assign
                                            </a>
                                        </li>
                                        <li>
                                            <a class="fa fa-eye"  style="font-size:18px" href="/admin/tasks/view">
                                                View 
                                            </a>
                                        </li>   
                                    </ul>
                                </li>
                                <li class="nav-parent">
                                    <a style="font-size:15px">
                                        <i style="font-size:24px" class="fa fa-user" aria-hidden="true"></i>
                                        <span>Customers</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li>
                                                <a class="fa fa-eye"  style="font-size:18px" href="/admin/customers/show">
                                                     View 
                                                </a>
                                            </li>
                                    </ul>
                                </li>
                            </li>
                        </ul>
                    </nav>
        
                    <hr class="separator" />
        
                    <hr class="separator" />
        
                    <div class="sidebar-widget widget-stats">
                        <div class="widget-header">
                            <h6>Company Stats</h6>
                            <div class="widget-toggle">+</div>
                        </div>
                        <div class="widget-content">
                            <ul>
                                <li>
                                    <span class="stats-title">Stat 1</span>
                                    <span class="stats-complete">85%</span>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">
                                            <span class="sr-only">85% Complete</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <span class="stats-title">Stat 2</span>
                                    <span class="stats-complete">70%</span>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
                                            <span class="sr-only">70% Complete</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <span class="stats-title">Stat 3</span>
                                    <span class="stats-complete">2%</span>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
                                            <span class="sr-only">2% Complete</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
        
            </div>
        
        </aside>
        <!-- end: sidebar -->
        
				<section role="main" class="content-body">
					<header class="page-header">
                            <a href="/admin">

                            <h2> <i class="fa fa-home"></i> Welcome </h2>
                            </a>
					</header>

						