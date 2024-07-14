@extends('layouts.main')
@section('main')
    <div class="main-content">
        <section class="section">
            <!-- Navbar -->

            <div class="container-fluid mt-4">
                <div class="section-header d-flex justify-content-between align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="/MainPages/HODadmin.html">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Upcoming Meetings
                            </li>
                        </ol>
                    </nav>
                    <h1 class="mb-0">Upcoming Meetings</h1>
                </div>

                <div class="container mt-5">
                    <h1 class="mb-4"></h1>

                    <div class="card mb-4">
                        <div class="card-body">
                            <ul class="list-group" id="upcomingMeetings">
                             @foreach ($meetings as $meeting )


                                <!-- Example of upcoming meeting item -->
                                <li class="list-group-item">
                                    <h5></h5>
                                    <p>
                                        Date: <span class="meeting-date">{{ $meeting->date }}</span>
                                    </p>
                                    <p>
                                        Time: <span class="meeting-time">{{ $meeting->time }}</span>
                                    </p>
                                    <p>
                                        With: <span class="student-name">{{ $meeting->supervisor->user->name }}</span>
                                    </p>
                                    <p>
                                        Status:
                                        @if(strtotime($meeting->date) < strtotime(now()))
                                            <span class="student-name  text-danger">Passed</span>
                                        @else
                                            <span class="text-danger  text-primary">Upcoming</span>
                                        @endif
                                    </p>
                                    {{-- <button class="btn btn-primary view-meeting-details" data-toggle="modal"
                                        data-target="#viewMeetingModal">
                                        View Details
                                    </button> --}}
                                </li>
                                @endforeach
                                <!-- Dynamic Meetings List will populate here -->
                            </ul>
                        </div>
                    </div>

                    <!-- Modal for Viewing Meeting Details -->
                    <div class="modal fade" id="viewMeetingModal" tabindex="-1" aria-labelledby="viewMeetingModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="viewMeetingModalLabel">
                                        Meeting Details
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Title:</label>
                                        <p id="viewMeetingTitle"></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Date:</label>
                                        <p id="viewMeetingDate"></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Time:</label>
                                        <p id="viewMeetingTime"></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Student:</label>
                                        <p id="viewStudentName"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
