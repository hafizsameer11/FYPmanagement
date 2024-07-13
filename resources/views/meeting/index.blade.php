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
                                Main
                            </li>
                        </ol>
                    </nav>
                    <h1 class="mb-0">Main</h1>
                </div>

                <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#assignMeetingModal">
                    Assign New Meeting
                </button>

                <div class="card mb-4">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Manage Upcoming Meetings</h4>
                    </div>

                    <div class="card-body">
                        <ul class="list-group" id="upcomingMeetings">
                          @foreach ($meetings as $meeting )

                          <li class="list-group-item">
                            <strong>{{ $meeting->title }}</strong> with {{ $meeting->student->user->name }} on {{ $meeting->date }} at {{ $meeting->time }}
                            <div class="action-buttons">
                                <button class="btn btn-warning btn-sm" onclick="editMeeting({{ $meeting->id }}})">Edit</button>
                                <button class="btn btn-danger btn-sm" ><a href="{{ rooute('meeting.destroy',['id'=>$meeting->id]) }}"> Delete </a></button>
                            </div>
                        </li>
                          @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Modal for Assigning New Meeting -->
                <div class="modal fade" id="assignMeetingModal" tabindex="-1" aria-labelledby="assignMeetingModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="assignMeetingModalLabel">
                                    Assign New Meeting
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="assignMeetingForm">
                                    <div class="form-group">
                                        <label for="meetingTitle">Meeting Title</label>
                                        <input type="text" class="form-control" id="meetingTitle" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="meetingDate">Date</label>
                                        <input type="date" class="form-control" id="meetingDate" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="meetingTime">Time</label>
                                        <input type="time" class="form-control" id="meetingTime" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="studentName">Student Name</label>
                                        <input type="text" class="form-control" id="studentName" required />
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        Assign Meeting
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal for Editing Meeting -->
                <div class="modal fade" id="editMeetingModal" tabindex="-1" aria-labelledby="editMeetingModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editMeetingModalLabel">
                                    Edit Meeting
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="editMeetingForm">
                                    <input type="hidden" id="editMeetingId" />
                                    <div class="form-group">
                                        <label for="editMeetingTitle">Meeting Title</label>
                                        <input type="text" class="form-control" id="editMeetingTitle" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="editMeetingDate">Date</label>
                                        <input type="date" class="form-control" id="editMeetingDate" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="editMeetingTime">Time</label>
                                        <input type="time" class="form-control" id="editMeetingTime" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="editStudentName">Student Name</label>
                                        <input type="text" class="form-control" id="editStudentName" required />
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        Save Changes
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('additional-scripts')
<script>
     // Function to edit a meeting
     window.editMeeting = function (id) {
        };
</script>
@endsection
