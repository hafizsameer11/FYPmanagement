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
                            @foreach ($meetings as $meeting)
                                <li class="list-group-item">
                                    <strong>{{ $meeting->title }}</strong> with {{ $meeting->student->user->name }} on
                                    {{ $meeting->date }} at {{ $meeting->time }}
                                    <div class="action-buttons">
                                        <button class="btn btn-warning btn-sm" data-id="{{ $meeting->id }}"
                                            id="edit">Edit</button>
                                        <button class="btn btn-danger btn-sm"><a
                                                href="{{ route('meeting.destroy', ['id' => $meeting->id]) }}"> Delete
                                            </a></button>
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
                                <form id="assignMeetingForm" action="{{ route('meeting.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="meetingTitle">Meeting Title</label>
                                        <input type="text" name="title" class="form-control" id="meetingTitle"
                                            required />
                                    </div>
                                    <div class="form-group">
                                        <label for="meetingDate">Date</label>
                                        <input type="date" name="date" class="form-control" id="meetingDate"
                                            required />
                                    </div>
                                    <div class="form-group">
                                        <label for="meetingTime">Time</label>
                                        <input type="time" name="time" class="form-control" id="meetingTime"
                                            required />
                                    </div>

                                    <div class="form-group">
                                        <select name="student_id" class="custom-select" id="StudentType"
                                            onchange="fillStudent()">
                                            @foreach ($students as $supervisor)
                                                <option value="{{ $supervisor->id }}">{{ $supervisor->user->name }}</option>
                                            @endforeach
                                        </select>
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
                                <form id="editMeetingForm" action=""  method="POST" >
                                    @csrf
                                    <input type="hidden" id="editMeetingId" />
                                    <div class="form-group">
                                        <label for="editMeetingTitle">Meeting Title</label>
                                        <input type="text" class="form-control" name="title" id="editMeetingTitle"
                                            required />
                                    </div>
                                    <div class="form-group">
                                        <label for="editMeetingDate">Date</label>
                                        <input type="date" class="form-control" name="date" id="editMeetingDate"
                                            required />
                                    </div>
                                    <div class="form-group">
                                        <label for="editMeetingTime">Time</label>
                                        <input type="time" class="form-control" name="time" id="editMeetingTime"
                                            required />
                                    </div>
                                    <div class="form-group">
                                        <label for="editStudentId">Student</label>
                                        <select name="student_id" class="custom-select" id="editStudentId" required>
                                            <option value=""></option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
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
        $(document).ready(function() {
            $("#edit").on('click', function() {
                console.log("edited")
              let id=  $(this).data('id');
                $.ajax({
                    url: '/edit-meeting/' + id,
                    type: 'GET',
                    success: function(response) {
                        const meeting = response.meeting;
                        const students = response.student;

                        // Fill the form with the meeting details
                        $('#editMeetingId').val(meeting.id);
                        $('#editMeetingTitle').val(meeting.title);
                        $('#editMeetingDate').val(meeting.date);
                        $('#editMeetingTime').val(meeting.time);

                        // Populate the select element with students
                        const studentSelect = $('#editStudentId');
                        studentSelect.empty();
                        students.forEach(student => {
                            const option = new Option(student.user.name, student.id);
                            studentSelect.append(option);
                        });

                        // Pre-select the current student
                        studentSelect.val(meeting.student_id);
                        $('#editMeetingForm').attr('action', '/update-meeting/' + meeting.id);

                        // Show the modal
                        $('#editMeetingModal').modal('show');
                    },
                    error: function(xhr) {
                        alert('An error occurred while fetching the meeting details.');
                    }
                });
            })
        })

        function editMeeting(id) {}
    </script>
@endsection
