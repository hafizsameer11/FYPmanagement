<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Dashboard </title>
    <meta name="csrf-token" content="q70fR2gs72gquvmyAur6GGrCSoY5GyRmL4oPycwe">
    <!-- General CSS File -->
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/bootstrap/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/default/vendors/toast/jquery.toast.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/owl.carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/owl.carousel/owl.theme.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/daterangepicker/daterangepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/default/vendors/select2/select2.min.css') }}">



    <style>
.card-header {
    display: flex;
    justify-content: center;
}


    </style>
</head>

<body class="">

    <div id="app">
        <div class="main-wrapper">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="register-box">
                <div class="card card-outline card-primary">
                    <div class="card-header text-center">
                        <a href="#" class="h2 text-center"><b style="color:rgb(254,151,17)">I</b><b style="color:rgb(2,2,125);">S</b><b style="color:rgb(1,148,63);">P</b> <b style="color:rgb(1, 88, 37);">E </b> Supervision </a>
                    </div>
                    <div class="card-body login-form m-3">
                        <div class="form-group">
                            <h3 style="text-align:center; margin:5px">Welcome Here!</h3>
                            <hr style="margin-top:0px" />
                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#HODModal" data-bg-class="HOD">
                                Head of Department &emsp; <i class='fas fa-user-tie' style='font-size:20px'></i>
                            </button>
                            <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#HOPModal" data-bg-class="HOP">
                                Head of Project &emsp; <i class='fas fa-project-diagram' style='font-size:20px'></i>
                            </button>
                            <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#HOFYPModal" data-bg-class="HOFYP">
                                Head of Final Year Project &emsp; <i class='fas fa-tasks' style='font-size:20px'></i>
                            </button>
                            <button type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target="#CoordinatorModal" data-bg-class="Coordinator">
                                Coordinator &emsp; <i class='fas fa-user-cog' style='font-size:20px'></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#SupervisorModal"data-bg-class="Supervisor" > Supervisor &emsp; <i class='fas fa-user-check' style='font-size:20px'></i>
                            </button>
                            <button type="button" class="btn btn-dark btn-block" data-toggle="modal" data-target="#StudentModal"data-bg-class="Student">
                                Student &emsp; <i class='fas fa-user-graduate' style='font-size:20px'></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- HOD Modal -->
<div class="modal fade" id="HODModal" tabindex="-1" role="dialog" aria-labelledby="HODModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title blinking" id="HODModalTitle">HOD Portal Sign-In &emsp; <i class='fas fa-chalkboard-teacher' style='font-size:20px'></i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="loginForm" method="POST" action="{{ route('login') }}">
                    @csrf
                    <input type="hidden" name="type" value="hod">
                    <div class="input-group mb-3">
                        <input type="email" name="email" id="USERNAME" class="form-control" placeholder="Enter User Name" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" id="PASSWORD" class="form-control" required placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox" name="rememberme" id="rememberme" checked> Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-5">
                            <button type="submit" class="btn btn-success btn-block" id="myButtonT">Sign In</button>
                            <div id="loadingT" style="display:none;">
                            </div>
                        </div>
                    </div>
                    <hr>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- HOFYP Modal -->
<div class="modal fade" id="HOFYPModal" tabindex="-1" role="dialog" aria-labelledby="HOFYPModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title blinking" id="HOFYPModalTitle">Head of Final Year Project Portal Sign-In &emsp; <i class='fas fa-tasks' style='font-size:20px'></i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="HOFYPForm" autocomplete="off">
                    <div class="input-group mb-3">
                        <input type="email" id="USERNAME" name="USERNAME" class="form-control" placeholder="Enter User Name" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="PASSWORD" id="PASSWORD" class="form-control" required placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox" name="rememberme" id="rememberme" checked> Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-5">
                            <button type="submit" class="btn btn-success btn-block" id="myButtonF">Sign In</button>
                            <div id="loadingF" style="display:none;">
                                <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Coordinator Modal -->
<div class="modal fade" id="CoordinatorModal" tabindex="-1" role="dialog" aria-labelledby="CoordinatorModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title blinking" id="CoordinatorModalTitle">Coordinator Portal Sign-In &emsp; <i class='fas fa-user-cog' style='font-size:20px'></i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="CoordinatorForm" autocomplete="off">
                    <div class="input-group mb-3">
                        <input type="email" id="USERNAME" name="USERNAME" class="form-control" placeholder="Enter User Name" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="PASSWORD" id="PASSWORD" class="form-control" required placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox" name="rememberme" id="rememberme" checked> Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-5">
                            <button type="submit" class="btn btn-success btn-block" id="myButtonC">Sign In</button>
                            <div id="loadingC" style="display:none;">
                                <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Supervisor Modal -->
<div class="modal fade" id="SupervisorModal" tabindex="-1" role="dialog" aria-labelledby="SupervisorModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title blinking" id="SupervisorModalTitle">Head of Supervisor Portal Sign-In &emsp; <i class='fas fa-user-check' style='font-size:20px'></i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="SupervisorForm" autocomplete="off">
                    <div class="input-group mb-3">
                        <input type="email" id="USERNAME" name="USERNAME" class="form-control" placeholder="Enter User Name" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="PASSWORD" id="PASSWORD" class="form-control" required placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox" name="rememberme" id="rememberme" checked> Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-5">
                            <button type="submit" class="btn btn-success btn-block" id="myButtonS">Sign In</button>
                            <div id="loadingS" style="display:none;">
                                <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Student Modal -->
<div class="modal fade" id="StudentModal" tabindex="-1" role="dialog" aria-labelledby="StudentModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title blinking" id="StudentModalTitle">Student Portal Sign-In &emsp; <i class='fas fa-user-graduate' style='font-size:20px'></i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="StudentForm" autocomplete="off">
                    <div class="input-group mb-3">
                        <input type="email" id="USERNAME" name="USERNAME" class="form-control" placeholder="Enter User Name" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="PASSWORD" id="PASSWORD" class="form-control" required placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox" name="rememberme" id="rememberme" checked> Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-5">
                            <button type="submit" class="btn btn-success btn-block" id="myButtonSt">Sign In</button>
                            <div id="loadingSt" style="display:none;">
                                <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- HOP Modal -->
<div class="modal fade" id="HOPModal" tabindex="-1" role="dialog" aria-labelledby="HOPModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title blinking" id="HOPModalTitle">Head of Project Portal Sign-In &emsp; <i class='fas fa-project-diagram' style='font-size:20px'></i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="HOPForm" autocomplete="off">
                    <div class="input-group mb-3">
                        <input type="email" id="USERNAME" name="USERNAME" class="form-control" placeholder="Enter User Name" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="PASSWORD" id="PASSWORD" class="form-control" required placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox" name="rememberme" id="rememberme" checked> Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-5">
                            <button type="submit" class="btn btn-success btn-block" id="myButtonP">Sign In</button>
                            <div id="loadingP" style="display:none;">
                                <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </form>
            </div>
        </div>
    </div>
</div>



        </div>



    </div>




    <!-- General JS Scripts -->
    <script src="{{ asset('assets/admin/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/poper/popper.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/stisla.js') }}"></script>
    <script src="{{ asset('assets/default/vendors/toast/jquery.toast.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/daterangepicker/daterangepicker.min.js') }}"></script>
    <script src="{{ asset('assets/default/vendors/select2/select2.min.js') }}"></script>

    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script src="{{ asset('assets/admin/js/scripts.js') }}"></script>

    <script src="{{ asset('assets/default/vendors/chartjs/chart.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/owl.carousel/owl.carousel.min.js') }}"></script>

    <link href="{{ asset('assets/default/vendors/flagstrap/css/flags.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/default/vendors/flagstrap/js/jquery.flagstrap.min.js') }}"></script>
    <script src="{{ asset('assets/default/js/parts/top_nav_flags.min.js') }}"></script>
    <script src="{{ asset('assets/default/js/panel/ai-content-generator.min.js') }}"></script>


    <script>
    </script>
</body>

</html>
