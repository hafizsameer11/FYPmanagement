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
                                <a href="/admin.html">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                List
                            </li>
                        </ol>
                    </nav>
                    <h1 class="mb-0">Page Title</h1>
                </div>

                <div class="container">
                    <h2 class="text-center mt-5 mb-4">
                        Final Year Project Registration Form
                    </h2>
                    <form id="fypForm" action="{{ route('scope.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Project Details</h3>
                                <div class="form-group">
                                    <label>Department:</label>
                                    <input type="text" class="form-control" value="Computer Science" disabled />
                                </div>
                                <div class="form-group">
                                    <label>Class:</label>
                                    <input type="text" class="form-control" value="BSCS(Hons)" disabled />
                                </div>
                                <div class="form-group">
                                    <label>Session:</label>
                                    <input type="text" class="form-control" value="Main Fall 2020" disabled />
                                </div>
                                <div class="form-group">
                                    <label>Project ID:</label>
                                    <input type="text" class="form-control" value="{{ $student->project->id }}" placeholder="For office use only" disabled />
                                </div>
                                <div class="form-group">
                                    <label>Project Title:</label>
                                    <input type="text" name="title" class="form-control"
                                        value="E-Supervision System for Final Year Projects" />
                                </div>
                                <div class="form-group">
                                    <label>Type of Project:</label>
                                    <input type="text" name="type" class="form-control" value="" required/>
                                </div>
                                <div class="form-group">
                                    <label>Nature of Project:</label>
                                    <input type="text" name="nature" class="form-control" value="" required />
                                </div>
                                <div class="form-group">
                                    <label>Area of Specialization:</label>
                                    <input type="text" name="areaofspecialization" class="form-control" value="" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3>Student Information</h3>
                                <div class="form-group">
                                    <label>Registration Number:</label>
                                    <input type="text" name="registration_no" class="form-control" value="M Ahsan" />
                                </div>
                                <div class="form-group">
                                    <label>Student Name:</label>
                                    <input type="text" name="name" class="form-control" value="Nafeesah Sanwal" />
                                </div>
                                <div class="form-group">
                                    <label>CGPA:</label>
                                    <input type="text" name="cgpa" class="form-control" placeholder="Enter your CGPA" />
                                </div>
                                <div class="form-group">
                                    <label>Email ID:</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter your email" />
                                </div>
                                <div class="form-group">
                                    <label>Phone Number:</label>
                                    <input type="text" name="number" class="form-control" value="03026749011" />
                                </div>
                                <h3>Supervisor Information</h3>
                                <div class="form-group">
                                    <label>Name:</label>
                                    <input type="text" name="sname" class="form-control" placeholder="Enter supervisor name" />
                                </div>
                                <div class="form-group">
                                    <label>Designation:</label>
                                    <input type="text" name="sdesignation" class="form-control" placeholder="Enter supervisor designation" />
                                </div>
                                <div class="form-group">
                                    <label>Signature:</label>
                                    <input type="text" class="form-control" name="ssignature" placeholder="Supervisor's signature" />
                                </div>
                                <h3>Co-Supervisor Information (if any)</h3>
                                <div class="form-group">
                                    <label>Name:</label>
                                    <input type="text" name="cname" class="form-control" placeholder="Enter co-supervisor name" />
                                </div>
                                <div class="form-group">
                                    <label>Designation:</label>
                                    <input type="text" class="form-control"
                                        placeholder="Enter co-supervisor designation" name="cdesignation" />
                                </div>
                                <div class="form-group">
                                    <label>Signature:</label>
                                    <input type="text" class="form-control" name="csignature" placeholder="Co-supervisor's signature" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Project Rationale</h3>
                                <div class="form-group">
                                    <label>Purpose:</label>
                                    <textarea class="form-control" name="purpose" placeholder="Enter project purpose"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Motivation:</label>
                                    <textarea class="form-control" name="motivation" placeholder="Enter project motivation"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Relevance:</label>
                                    <textarea class="form-control" name="relevance" placeholder="Enter project relevance"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Personal Motivation:</label>
                                    <textarea class="form-control" name="personalmotivation" placeholder="Enter personal motivation"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3>Aims and Objectives</h3>
                                <div class="form-group">
                                    <label>Aims:</label>
                                    <textarea class="form-control"  name="aims" placeholder="Enter project aims"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Objectives:</label>
                                    <textarea class="form-control" name="objectives" placeholder="Enter project objectives"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Bootstrap JS and dependencies -->
                <script src="https:/code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                <script src="https:/cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
                <script src="https:/stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            </div>
        </section>
    </div>
@endsection
