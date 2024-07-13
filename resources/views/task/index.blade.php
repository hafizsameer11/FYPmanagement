@extends('layouts.main')
@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Assign Final Year Project Tasks</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="/MainPages/Supervisoradmin.html">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">Tasks</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Assign New Task</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('task.store') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="taskName">Task Name</label>
                                    <input type="text" class="form-control" id="taskName" name="name"
                                        placeholder="Enter Task Name" required />
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="taskType">Task Type</label>
                                    <select class="form-control" id="taskType" name="type" required>
                                        <option value="Document Completion">
                                            Document Completion
                                        </option>
                                        <option value="Document Submission">
                                            Document Submission
                                        </option>
                                        <option value="Paper Solving">Paper Solving</option>
                                        <option value="Design Submission">
                                            Design Submission
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="assignedStudents">Assign to Students</label>
                                    <div class="input-group">
                                        <select class="form-control" id="assignedStudents" name="student_id" required>
                                            @foreach ($students as $student)
                                                <option value="{{ $student->id }}" data-group="Group C"
                                                    data-project="Project W" data-type="Type 3" data-supervisor="Dr. D"
                                                    data-regno="004">
                                                    {{ $student->user->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        {{-- <div class="input-group-append">
                                            <button class="btn btn-info" type="button" id="studentDetailsBtn">
                                                Show Details
                                            </button>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="startDate">Start Date</label>
                                    <input type="date" class="form-control" id="startDate" name="start_date" required />
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="endDate">End Date</label>
                                    <input type="date" class="form-control" id="endDate" name="end_date" required />
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter Task Description"
                                        required></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" id="addTaskBtn">
                                Add Task
                            </button>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4>Assigned Tasks</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="taskTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Assigned To</th>
                                        <th>Task Name</th>
                                        <th>Task Type</th>
                                        <th>Project Name</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                        <!-- New column for actions -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                        <tr>
                                            <td>{{ $task->student->stid }}</td>
                                            <td>{{ $task->student->user->name }}</td>
                                            <td>{{ $task->name }}</td>
                                            <td>{{ $task->type }}</td>
                                            <td>{{ $task->student->project->name }}</td>
                                            <td>{{ $task->start_dtae }}</td>
                                            <td>{{ $task->end_date }}</td>
                                            <td>
                                                {{ $task->description }}
                                            </td>
                                            <td>{{ $task->status }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary edit-btn" data-task-id="1">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <a href="{{ route('task.destroy', ['id' => $task->id]) }}"
                                                    class="btn btn-sm btn-outline-danger delete-btn" data-task-id="1">
                                                    <i class="fas fa-trash"></i> Delete
                                                </a>
                                                <div class="btn-group">
                                                    <button class="btn btn-sm btn-outline-secondary manage-status-btn"
                                                        data-task-id="1">
                                                        Manage Status
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="manageStatusModal" tabindex="-1" role="dialog"
                                            aria-labelledby="manageStatusModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="manageStatusModalLabel">
                                                            Manage Task Status
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Select new status for this task:</p>
                                                        <div class="btn-group">
                                                            <a href="{{ route('update_task_status', ['id' => $task->id, 'status' => 'Pending']) }}"
                                                                class="btn btn-sm btn-outline-secondary ">
                                                                Pending Review
                                                            </a>
                                                            <a href="{{ route('update_task_status', ['id' => $task->id, 'status' => 'passed']) }}"
                                                                class="btn btn-sm btn-outline-success ">
                                                                Passed
                                                            </a>
                                                            <a href="{{ route('update_task_status', ['id' => $task->id, 'status' => 'failed']) }}"
                                                                class="btn btn-sm btn-outline-danger ">
                                                                Failed
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">
                                                            Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="manageStatusModal" tabindex="-1" role="dialog"
                    aria-labelledby="manageStatusModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="manageStatusModalLabel">
                                    Manage Task Status
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Select new status for this task:</p>
                                <div class="btn-group">
                                    <a href="{{ route('update_task_status', ['id' => $task->id, 'status' => 'Pending']) }}"
                                        class="btn btn-sm btn-outline-secondary ">
                                        Pending Review
                                    </a>
                                    <a href="{{ route('update_task_status', ['id' => $task->id, 'status' => 'passed']) }}"
                                        class="btn btn-sm btn-outline-success ">
                                        Passed
                                    </a>
                                    <a href="{{ route('update_task_status', ['id' => $task->id, 'status' => 'failed']) }}"
                                        class="btn btn-sm btn-outline-danger ">
                                        Failed
                                    </a>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Student Details Modal -->
        <div class="modal fade" id="studentDetailsModal" tabindex="-1" role="dialog"
            aria-labelledby="studentDetailsModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="studentDetailsModalLabel">
                            Student Details
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Name:</strong> <span id="studentName"></span></p>
                        <p><strong>Group:</strong> <span id="studentGroup"></span></p>
                        <p>
                            <strong>Project:</strong> <span id="studentProject"></span>
                        </p>
                        <p><strong>Type:</strong> <span id="studentType"></span></p>
                        <p>
                            <strong>Supervisor:</strong>
                            <span id="studentSupervisor"></span>
                        </p>
                        <p>
                            <strong>Registration No:</strong>
                            <span id="studentRegNo"></span>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('additional-scripts')
    <script>
        document.addEventListener("click", function(event) {
            if (event.target.classList.contains("manage-status-btn")) {
                const taskId = event.target.getAttribute("data-task-id");
                $("#manageStatusModal").modal("show");
            }
        });
        document
            .getElementById("studentDetailsBtn")
            .addEventListener("click", function() {
                let id = $("#assignedStudents").val();
                console.log(id)
                $.ajax({
                    url: '/fetch-student-details/' + id,
                    type: 'GET',
                    success: function(response) {
                        const student = response.student;
                        // console.log(response);

                        // Fill the form with the meeting details
                        // $('#editMeetingId').val(meeting.id);
                        // $('#editMeetingTitle').val(meeting.title);
                        // $('#editMeetingDate').val(meeting.date);
                        // $('#editMeetingTime').val(meeting.time);

                        // // Populate the select element with students
                        // const studentSelect = $('#editStudentId');
                        // studentSelect.empty();
                        // students.forEach(student => {
                        //     const option = new Option(student.user.name, student.id);
                        //     studentSelect.append(option);
                        // });

                        // // Pre-select the current student
                        // studentSelect.val(meeting.student_id);
                        // $('#editMeetingForm').attr('action', '/update-meeting/' + meeting.id);

                        // // Show the modal
                        // $('#editMeetingModal').modal('show');
                    },
                    error: function(xhr) {
                        alert('An error occurred while fetching the meeting details.');
                    }
                });
            });
        $(document).ready(function() {
            $("#edit").on('click', function() {
                console.log("edited")
                let id = $(this).data('id');
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
