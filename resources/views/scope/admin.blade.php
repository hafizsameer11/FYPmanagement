@extends('layouts.main')

@section('main')
<div class="main-content">



    <section class="section">
        <!-- Navbar -->


        <div class="container-fluid mt-4">
            <!-- Dashboard Title -->
            <div class="section-header">
                <h1>Assign Final Year Project Tasks</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a
                            href="/MainPages/Supervisoradmin.html">Dashboard</a></div>
                    <div class="breadcrumb-item">Tasks</div>
                </div>
            </div>
@if(isset($scopefinalization))
            <div class="container my-5">
                <h2 class="text-center mb-4">Final Year Project Details</h2>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="card-title">Project Details</h3>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Department</li>
                                    <li class="list-group-item">Class: BSCS(Hons)</li>
                                    <li class="list-group-item">Session: Main Fall 2020</li>
                                    <li class="list-group-item">Project ID: 12345</li>
                                    <li class="list-group-item">Project Title: {{$scopefinalization->title}}</li>
                                    <li class="list-group-item">Type of Project: {{$scopefinalization->type}}</li>
                                    <li class="list-group-item">Nature of Project: {{$scopefinalization->nature}}</li>
                                    <li class="list-group-item">Area of Specialization: {{$scopefinalization->areaofspecialization}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="card-title">Student Information</h3>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Registration Number:{{$scopefinalization->student->registration_no}}</li>
                                    <li class="list-group-item">Student Name: {{$scopefinalization->student->name}}</li>
                                    <li class="list-group-item">CGPA: {{$scopefinalization->student->cgpa}}</li>
                                    <li class="list-group-item">Email ID: {{$scopefinalization->student->email}}</li>
                                    <li class="list-group-item">Phone Number: {{$scopefinalization->student->number}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="card-title">Supervisor Information</h3>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Name: {{$supervisor->name}}/li>
                                    <li class="list-group-item">Designation: {{$supervisor->designation}}</li>
                                    <li class="list-group-item">Signature: {{$supervisor->signature}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="card-title">Co-Supervisor Information</h3>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Name: Dr. {{$cosupervisor->name}}</li>
                                    <li class="list-group-item">Designation: {{$cosupervisor->designation}}</li>
                                    <li class="list-group-item">Signature:{{$cosupervisor->designation}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="card-title">Project Rationale</h3>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Purpose: {{$scopefinalization->project->prupose}}</li>
                                    <li class="list-group-item">Motivation: {{$scopefinalization->project->motivation}}</li>
                                    <li class="list-group-item">Relevance:  {{$scopefinalization->project->relevance}}</li>
                                    <li class="list-group-item">Personal Motivation: I {{$scopefinalization->project->relevance}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="card-title">Aims and Objectives</h3>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Aims:  {{$scopefinalization->project->aims}}</li>
                                    <li class="list-group-item">Objectives: {{$scopefinalization->project->objectives}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    @if (Auth::user()->role=='hod')
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="card-title">Head of Projects Approval</h3>
                                <div class="btn ">Unapproved</div>
                                <div class="btn">Approved</div>

                                <div>Date: <input type="date"></div>
                            </div>

                        </div>
                    </div>
                    @elseif (Auth::user()->role=='hop')
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="card-title">Head of Projects Approval</h3>
                                <div class="btn ">Unapproved</div>
                                <div class="btn">Approved</div>

                                <div>Date: <input type="date"></div>
                            </div>

                        </div>
                    </div>
                    @endif
                </div>
            </div>
       @endif
        </div>
    </section>

</div>
@endsection
