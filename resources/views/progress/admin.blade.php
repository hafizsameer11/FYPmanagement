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
                        <div class="breadcrumb-item active">
                            <a href="/MainPages/Supervisoradmin.html">Dashboard</a>
                        </div>
                        <div class="breadcrumb-item">Tasks</div>
                    </div>
                </div>

                <div class="content">
                    <section class="container mt-5">
                        <h1>Progress Report Form for Final Year Project</h1>
                        <form id="studentSelectionForm" method="POST" action="{{ route('progress.show.single') }}">
                            @csrf
                            <div class="form-group">
                                <label for="studentNameSelect">Select Student</label>
                                <select class="form-control" name="id" id="studentNameSelect">
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                View Progress
                            </button>
                        </form>
                        @if (isset($progress))
                            <div id="weekButtons" class="mt-5">
                                <!-- Week buttons will be generated here -->
                                @foreach ($progress as $key => $record)
                                    <button class="btn btn-primary weekButton"
                                        data-index="{{ $key }}">{{ 'Week ' . ($key + 1) }}</button>
                                @endforeach
                            </div>

                            <div id="progressReportForm" class="mt-5">
                                <!-- Student Information Section -->
                                <div class="form-group">
                                    <label for="studentName">Student Name</label>
                                    <input type="text" class="form-control" id="studentName" readonly />
                                </div>
                                <div class="form-group">
                                    <label for="studentID">Student ID</label>
                                    <input type="text" class="form-control" id="studentID" readonly />
                                </div>
                                <div class="form-group">
                                    <label for="projectTitle">Project Title</label>
                                    <input type="text" class="form-control" id="projectTitle" readonly />
                                </div>
                                <div class="form-group">
                                    <label for="projectSupervisor">Project Supervisor/Advisor</label>
                                    <input type="text" class="form-control" id="projectSupervisor" readonly />
                                </div>

                                <!-- Progress Details Section -->
                                <div class="form-group">
                                    <label for="weekStartDate">Week Start Date</label>
                                    <input type="date" class="form-control" id="weekStartDate" readonly />
                                </div>
                                <div class="form-group">
                                    <label for="weekEndDate">Week End Date</label>
                                    <input type="date" class="form-control" id="weekEndDate" readonly />
                                </div>
                                <div class="form-group">
                                    <label for="progressDescription">Progress Description</label>
                                    <textarea class="form-control" id="progressDescription" rows="5" readonly></textarea>
                                </div>

                                <!-- Progress Evaluation Section -->
                                <h5>Progress Evaluation</h5>
                                <div class="form-group">
                                    <label for="researchAndDevelopment">Research and Development</label>
                                    <select class="form-control" id="researchAndDevelopment" readonly>
                                        <option value="N/A">N/A</option>
                                        <option value="IP">In Progress</option>
                                        <option value="C">Completed</option>
                                        <option value="D">Delayed</option>
                                        <option value="NR">Not Reported</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="coding">Coding</label>
                                    <select class="form-control" id="coding" readonly>
                                        <option value="N/A">N/A</option>
                                        <option value="IP">In Progress</option>
                                        <option value="C">Completed</option>
                                        <option value="D">Delayed</option>
                                        <option value="NR">Not Reported</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="documentation">Documentation</label>
                                    <select class="form-control" id="documentation" readonly>
                                        <option value="N/A">N/A</option>
                                        <option value="IP">In Progress</option>
                                        <option value="C">Completed</option>
                                        <option value="D">Delayed</option>
                                        <option value="NR">Not Reported</option>
                                    </select>
                                </div>

                                <!-- Comments/Notes Section -->
                                <div class="form-group">
                                    <label for="comments">Comments/Notes</label>
                                    <textarea class="form-control" id="comments" rows="5" readonly></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="challenges">Challenges</label>
                                    <textarea class="form-control" id="challenges" rows="5" readonly></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="supervisorSignature">Project Supervisor/Advisor's Signature</label>
                                    <input type="text" class="form-control" id="supervisorSignature" readonly />
                                </div>
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" class="form-control" id="date" readonly />
                                </div>
                            </div>
                        @endif
                    </section>
                </div>

                <script src="/assets/default/js/js for pages/progress.js"></script>
            </div>
        </section>
    </div>
@endsection
@section('additional-scripts')
    @if (isset($progress))
        <script>
            // jQuery for handling button clicks and populating progress details
            $(document).ready(function() {
                $('.weekButton').click(function() {
                    var index = $(this).data('index');
                    var progress = @json($progress); // Convert PHP array to JavaScript object
                    var st = @json($st);
                    console.log("clicked",progress)
                    // Populate student information (assuming it's in $progress[0])


                    $('#weekStartDate').val(progress[index].week_start_date);

                    $('#weekEndDate').val(progress[index].week_end_date);
                    $('#progressDescription').val(progress[index].description);
                    $('#researchAndDevelopment').val(progress[index].research);
                    $('#coding').val(progress[index].coding);
                    $('#documentation').val(progress[index].documentation);
                    $('#comments').val(progress[index].comments);
                    $('#challenges').val(progress[index].challenges);
                    $('#supervisorSignature').val(progress[index].supervisor_signature);
                    $('#date').val(progress[index].date);
                    $('#studentName').val(st.user.name);
                    $('#studentID').val(st.stid);
                    $('#projectTitle').val(st.project.name);
                    $('#projectSupervisor').val(st.supervisor.user.name);

                    // Populate progress details

                });
            });
        </script>
    @endif
@endsection
