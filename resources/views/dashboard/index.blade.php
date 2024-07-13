@extends('layouts.main')
@section('main')

    <div class="main-content">
        <section class="section">
            <!-- Navbar -->

            <div class="container-fluid mt-4">
                <!-- Dashboard Title -->
                <div class="section-header d-flex justify-content-between align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="/MainPages/HODadmin.html">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Main
                            </li>
                        </ol>
                    </nav>
                    <h1 class="mb-0">Main</h1>
                </div>

                <!-- Dashboard Statistics -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="stat-card" href="#studenttable">
                            <i class="fas fa-user-graduate"></i>
                            <div>
                                <span>Total Students</span><br />
                                <span class="stat-number">47</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stat-card">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <div>
                                <span>Total Supervisors</span><br />
                                <span class="stat-number">59</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stat-card" href="/admin pages/Projects/Projects.html">
                            <i class="fas fa-project-diagram"></i>
                            <div>
                                <span>Total Projects</span><br />
                                <span class="stat-number">59</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Search Bar -->
                <div class="row search-bar mb-4">
                    <div class="col-md-5">
                        <input type="text" class="form-control" placeholder="Search" />
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control" placeholder="ID" />
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary btn-block">Find</button>
                    </div>
                </div>

                <!-- Students Table -->
                <div class="table-responsive" id="studenttable">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Password</th>
                                <th>No.</th>
                                <th>Student's Name</th>
                                <th>Supervisor</th>
                                <th>Department</th>
                                <th>Student Type</th>
                                <th>Project</th>
                                <th>Reg Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2728R2O</td>
                                <td>ST0D001</td>
                                <td>1.</td>
                                <td>M Ahsan Nafees<br />nafeesahsan@gmail.com</td>
                                <td>Zia-Ur-Rehman Zia</td>
                                <td>CS</td>
                                <td>New</td>
                                <td>ISP E Supervision System</td>
                                <td>20/03/2024</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>2728R2O</td>
                                <td>ST0D001</td>
                                <td>1.</td>
                                <td>M Ahsan Nafees<br />nafeesahsan@gmail.com</td>
                                <td>Zia-Ur-Rehman Zia</td>
                                <td>CS</td>
                                <td>New</td>
                                <td>ISP E Supervision System</td>
                                <td>20/03/2024</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>2728R2O</td>
                                <td>ST0D001</td>
                                <td>1.</td>
                                <td>M Ahsan Nafees<br />nafeesahsan@gmail.com</td>
                                <td>Zia-Ur-Rehman Zia</td>
                                <td>CS</td>
                                <td>New</td>
                                <td>ISP E Supervision System</td>
                                <td>20/03/2024</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <!-- Repeat the above <tr> block for more students -->
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

 @endsection
