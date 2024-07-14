<div id="app">
    <div class="main-wrapper">
      <button type="button" class="sidebar-close">
        <i class="fa fa-times"></i>
      </button>
      <div class="navbar-bg"></div>
      <!--  navbar -->
              <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                  <ul class="navbar-nav mr-3">
                    <li>
                      <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"
                        ><i class="fas fa-bars"></i
                      ></a>
                    </li>
                    <li>
                      <a
                        href="#"
                        data-toggle="search"
                        class="nav-link nav-link-lg d-sm-none"
                        ><i class="fas fa-search"></i
                      ></a>
                    </li>
                  </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                  <form
                    action="/locale"
                    method="post"
                    class="mr-2 mr-md-3 mb-0 admin-navbar-locale"
                  >
                    <input
                      type="hidden"
                      name="_token"
                      value="q70fR2gs72gquvmyAur6GGrCSoY5GyRmL4oPycwe"
                    />

                    <input type="hidden" name="locale" />
                  </form>

                  <li class="dropdown dropdown-list-toggle">
                    <a
                      href="#"
                      data-toggle="dropdown"
                      class="nav-link notification-toggle nav-link-lg"
                    >
                      <i class="fa fa-info-circle"></i>
                    </a>
                    <div class="dropdown-menu dropdown-list dropdown-menu-right">
                      <div class="dropdown-list-icons mb-0" height="150px">
                        <a
                          href="/Screenshot 2024-06-03 090851.png"
                          class="dropdown-item"
                        >
                          <div
                            class="dropdown-item-icon bg-info text-white d-flex align-items-center justify-content-center"
                          >
                            <i class="fa fa-info"></i>
                          </div>
                          <div class="dropdown-item-desc">
                            ISP E Supervision LMS Version 1.0
                            <div class="time text-primary">
                              All rights reserved for ISP E Supervision SYSTEM
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                  </li>

                  <li class="dropdown dropdown-list-toggle">
                    <a
                      href="#"
                      data-toggle="dropdown"
                      class="nav-link notification-toggle nav-link-lg beep"
                    >
                      <i class="far fa-bell"></i>
                    </a>

                    {{-- <div class="dropdown-menu dropdown-list dropdown-menu-right">
                      <div class="dropdown-header">
                        Notifications
                        <div class="float-right">
                          <a href="admin/notifications/mark_all_read"
                            >Mark All As Read</a
                          >
                        </div>
                      </div>

                      <div class="dropdown-list-content dropdown-list-icons">
                        <a
                          href="/admin pages/Noticebored/noticeboards/notifications.html"
                          class="dropdown-item"
                        >
                          <div
                            class="dropdown-item-icon bg-info text-white d-flex align-items-center justify-content-center"
                          >
                            <i class="far fa-user"></i>
                          </div>
                          <div class="dropdown-item-desc">
                            New Student Documents document
                            <div class="time text-primary">
                              2024 Feb 20 | 10:54 pm
                            </div>
                          </div>
                        </a>
                        <a
                          href="/admin pages/Noticebored/noticeboards/notifications.html"
                          class="dropdown-item"
                        >
                          <div
                            class="dropdown-item-icon bg-info text-white d-flex align-items-center justify-content-center"
                          >
                            <i class="far fa-user"></i>
                          </div>
                          <div class="dropdown-item-desc">
                            New Complain Alert
                            <div class="time text-primary">
                              2024 Feb 20 | 10:53 pm
                            </div>
                          </div>
                        </a>
                        <a
                          href="/admin pages/Noticebored/noticeboards/notifications.html"
                          class="dropdown-item"
                        >
                          <div
                            class="dropdown-item-icon bg-info text-white d-flex align-items-center justify-content-center"
                          >
                            <i class="far fa-user"></i>
                          </div>
                          <div class="dropdown-item-desc">
                            New user registered
                            <div class="time text-primary">
                              2024 Feb 19 | 04:51 pm
                            </div>
                          </div>
                        </a>
                        <a
                          href="/admin pages/Noticebored/noticeboards/"
                          class="dropdown-item"
                        >
                          <div
                            class="dropdown-item-icon bg-info text-white d-flex align-items-center justify-content-center"
                          >
                            <i class="far fa-user"></i>
                          </div>
                          <div class="dropdown-item-desc">
                            New user registered
                            <div class="time text-primary">
                              2024 Feb 19 | 04:18 pm
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="dropdown-footer text-center">
                        <a
                          href="/admin pages/Noticebored/noticeboards/notifications.html"
                          >View All <i class="fas fa-chevron-right"></i
                        ></a>
                      </div>
                    </div> --}}
                  </li>

                  <li class="dropdown">
                    <a
                      href="#"
                      data-toggle="dropdown"
                      class="nav-link dropdown-toggle nav-link-lg nav-link-user"
                    >
                      <img
                        alt="image"
                        src="{{ asset('assets/favicon.ico') }}"
                        class="rounded-circle mr-1"
                      />
                      <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name }}</div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">

                      <div class="dropdown-divider"></div>
                      <a
                        href="{{ route('logout') }}"
                        class="dropdown-item has-icon text-danger"
                      >
                        <i class="fas fa-sign-out-alt"></i> Logout
                      </a>
                    </div>
                  </li>
                </ul>
              </nav>
