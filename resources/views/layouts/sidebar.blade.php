<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="">
                <img src="/favicon.ico" alt="Icon" style="width: 30px; height: 30px; vertical-align: middle" />
                <span
                    style="
              font-size: 14px;
              letter-spacing: 0px;
              font-weight: bold;
              vertical-align: middle;
            ">
                    ISP E Supervision System
                </span>
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="">
                <img src="/favicon.ico" alt="Icon" style="width: 30px; height: 30px; vertical-align: middle" />
                <!-- <span style="font-size: 12px; font-weight: bold; vertical-align: middle;">
                          ISP E S
                      </span> -->
            </a>
        </div>

        <div class="user-profile" style="text-align: center; margin: 20px 0">
            <img src="/Screenshot 2024-06-03 090851.png" alt="User Picture"
                style="width: 60px; height: 60px; border-radius: 50%" />
            <div style="margin-top: 10px">
                <span style="display: block; font-size: 14px; font-weight: bold">{{ Auth::user()->name }}s</span>
                <span style="display: block; font-size: 12px">{{ Auth::user()->role }}</span>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="">
                <a href="/MainPages/HODadmin.html" class="nav-link">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="menu-header">Education</li>
            @if (Auth::user()->role == 'hod' || Auth::user()->role == 'hofyp' || Auth::user()->role == 'coordi')
                <li class="nav-item dropdown">
                    <a href="/admin pages/HOD/Student/list.html" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-user-graduate"></i>
                        <span>Student</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="">
                            <a class="nav-link" href="{{ route('student.index') }}">List</a>
                        </li>
                        <li class="">
                            <a class="nav-link" href="{{ route('student.create') }}">New</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="{{ route('project.index') }}" class="nav-link">
                        <i class="fas fa-project-diagram"></i>
                        <span>Project</span>
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a href="" class="nav-link has-dropdown">
                        <i class="fas fa-project-diagram"></i>
                        <span>Scope of Project</span>
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a href="/" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <span>Supervisor</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="">
                            <a href="{{ route('supervisor.index') }}" class="nav-link">List</a>
                        </li>
                        <li class="">
                            <a class="nav-link" href="{{ route('supervisor.create') }}">New</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"
                        data-toggle="dropdown">
                        <i class="fas fa-clipboard-list"></i>
                        <span>Examination</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="">
                            <a class="nav-link" href="{{ route('showform') }}">Results</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a href="/admin pages/DocManaged" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-folder-open"></i>
                        <span>DocManagement</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="">
                            <a class="nav-link" href="{{ route('document.create') }}">Student Documents</a>
                        </li>
                        <li class="">
                            <a class="nav-link" href="/admin pages/DocManaged/StudentDoc/SupervisorDoc.html">Supervisor
                                Documents</a>
                        </li>
                    </ul>
                </li>
                <li class="">



                <li class="">
                    <a href="{{ route('progress.show') }}" class="nav-link">
                        <i class="fas fa-chart-line"></i>
                        <span>Progress</span>
                    </a>
                </li>
                <li class="menu-header">Users</li>

                <li class="nav-item dropdown">
                    <a href="/admin pages/HOD/users/" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-user-friends"></i>
                        <span>Users</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="">
                            <a class="nav-link" href="/admin pages/HOD/users/Head of Project&searchCommtie.html">Head Of
                                project</a>
                        </li>
                        <li class="">
                            <a class="nav-link" href="/admin pages/HOD/users/Head Of FYP.html">Head of FYP</a>
                        </li>
                        <li class="">
                            <a class="nav-link" href="/admin pages/HOD/users/Cordintor.html">Coordinator</a>
                        </li>
                        <li class="">
                            <a class="nav-link" href="/admin pages/HOD/users/staffs.html">Staff</a>
                        </li>
                        <li class="">
                            <a class="nav-link" href="/admin pages/HOD/users/create.html">New</a>
                        </li>
                    </ul>
                </li>

                <li class="menu-header">CRM</li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown">
                        <i class="fas fa-bullhorn"></i>
                        <span>Noticeboard</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="">
                            <a class="nav-link" href="{{ route('noticeboard.index') }}">List</a>
                        </li>
                        <li class="">
                            <a class="nav-link" href="{{ route('noticeboard.create') }}">New</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="{{ route('complaint.index') }}" class="nav-link">
                        <i class="fas fa-chart-line"></i>
                        <span>Complaints</span>
                    </a>
                </li>
            @elseif (Auth::user()->role == 'supervisor')
                <li class="">
                    <a href="{{ route('student.supervisor') }}" class="nav-link ">
                        <i class="fas fa-user-graduate"></i>
                        <span>Student</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('meeting.index') }}" class="nav-link ">
                        <i class="fas fa-handshake"></i>
                        <span>Meetings</span>
                    </a>
                </li>

                <li class="">
                    <a href="{{ route('task.index') }}" class="nav-link">
                        <i class="fas fa-tasks"></i>
                        <span>Student Task</span>
                    </a>
                </li>

                <li class="">
                    <a href="{{ route('complaint.index') }}" class="nav-link">
                        <i class="fas fa-chart-line"></i>
                        <span>Student Complaints</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"
                        data-toggle="dropdown">
                        <i class="fas fa-clipboard-list"></i>
                        <span>Examination</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="">
                            <a class="nav-link" href="{{ route('stshowform') }}">Results</a>
                        </li>
                    </ul>
                </li>

                <li class="">
                    <a href="{{ route('progress.show') }}" class="nav-link">
                        <i class="fas fa-chart-line"></i>
                        <span>Progress</span>
                    </a>
                </li>
            @elseif (Auth::user()->role == 'student')
            <li class="">
                <a href="{{ route('progress.create') }}" class="nav-link">
                    <i class="fas fa-chart-line"></i>
                    <span>Progress</span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('task.student') }}" class="nav-link">
                    <i class="fas fa-tasks"></i>
                    <span>Task</span>
                </a>
            </li>

            <li class="">
                <a href="{{ route('meeting.student') }}" class="nav-link">
                    <i class="fas fa-handshake"></i>
                    <span>Meetings</span>
                </a>
            </li>

            <li class="">
                <a href="{{ route('complaint.submit') }}" class="nav-link">
                    <i class="fas fa-comments"></i>
                    <span>Complaints</span>
                </a>
            </li>




            <li class="">
                <a href="{{ route('stshowform') }}" class="nav-link">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Results</span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('scope.index') }}" class="nav-link">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Scope Finalization</span>
                </a>
            </li>


            @endif




            @if (Auth::user()->role == 'student')

            @else
            @endif

            @if (Auth::user()->role == 'hod' || Auth::user()->role=='hofyp' || Auth::user()->role=='hop' || Auth::user()->role=='coordinator')
            @else
            <li class="menu-header">CRM</li>
                <li class="">
                    <a href="{{ route('complaint.submit') }}" class="nav-link">
                        <i class="fas fa-chart-line"></i>
                        <span>Complaints</span>
                    </a>
                </li>
            @endif


            <li>
                <a class="nav-link" href="{{ route('logout') }}">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
        <br /><br /><br />
    </aside>
</div>
