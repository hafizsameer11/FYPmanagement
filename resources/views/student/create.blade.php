@extends('layouts.main')
@section('main')
    <div class="main-content">
        <section class="section">
            <!-- Navbar -->
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

            <div class="container-fluid mt-4">
                <h2 class="bg-primary text-white p-3 mb-4">
                    New Student Information Form
                </h2>
                <form method="POST" action="{{ route('student.store') }}">
                    @csrf
                    <input type="hidden" name="role" value="student">
                    <div class="form-group">
                        <label for="studentName">Student Name:</label>
                        <input type="text" name="name" class="form-control" id="studentName"
                            placeholder="Enter student name" />
                    </div>
                    <div class="form-group">
                        <label for="studentID">Student ID:</label>
                        <input type="text" name="stid" class="form-control" id="studentID"
                            placeholder="Enter student ID" />
                    </div>
                    <div class="form-group">
                        <label for="studentID">Student Email</label>
                        <input type="text" name="email" class="form-control" id="studentID"
                            placeholder="Enter student ID" />
                    </div>
                    <div class="form-group">
                        <label for="studentProject">Student Project:</label>
                        <select name="project_id"  class="custom-select" id="StudentType" onchange="fillStudent()">
                            @foreach ($projects as $project )
                            <option value="{{ $project->id }}">{{ $project->name }}</option>                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="studentProject">Super Visor:</label>
                        <select name="supervisor_id"  class="custom-select" id="StudentType" onchange="fillStudent()">
                            @foreach ($supervisors as $supervisor )
                            <option value="{{ $supervisor->id }}">{{ $supervisor->user->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="studentType">Student Type:</label>
                        <select class="form-control" name="type" id="studentType">
                            <option value="Undergraduate">New</option>
                            <option value="Graduate">Backlog</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="studentDepartment">Student Department:</label>
                        <input type="text" name="department" class="form-control" id="studentDepartment"
                            placeholder="Enter student department" />
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" />
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password:</label>
                        <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm password" />
                    </div>

                    <!-- Group Assignment Section -->
                    <div class="form-group">
                        <label for="groupAssignment">Group Assignment:</label>
                        <div id="groupAssignmentSection">
                            <!-- This section will dynamically update based on selected project -->
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Add Information
                    </button>
                </form>
            </div>
            <script>
                function fillSupervisor() {
                    var supervisorSelect =
                        document.getElementById("SupervisorType");
                    var selectedSupervisor =
                        supervisorSelect.options[supervisorSelect.selectedIndex].text;
                    document
                        .getElementById("assignedSupervisor")
                        .setAttribute("value", selectedSupervisor);
                }

                function fillStudent() {
                    var studentSelect = document.getElementById("StudentType");
                    var selectedStudent =
                        studentSelect.options[studentSelect.selectedIndex].text;
                    document
                        .getElementById("assignedStudent")
                        .setAttribute("value", selectedStudent);

                    // Assuming you want to dynamically generate group options based on selected project
                    var project = studentSelect.value;
                    var groupAssignmentSection = document.getElementById(
                        "groupAssignmentSection"
                    );

                    // Clear previous options
                    groupAssignmentSection.innerHTML = "";

                    if (project === "ISP E supervisions") {
                        // Example: Adding predefined groups for ISP E supervisions
                        var groups = ["Group N0 1", "Group N0 2", "Group N0 3"];
                        var groupSelect = document.createElement("select");
                        groupSelect.className = "custom-select";
                        groupSelect.innerHTML =
                            "<option selected disabled>Select Group</option>";

                        groups.forEach(function(group) {
                            var option = document.createElement("option");
                            option.value = group;
                            option.text = group;
                            groupSelect.appendChild(option);
                        });

                        groupAssignmentSection.appendChild(groupSelect);
                    } else if (project === "ISP HRM") {
                        // Example: Adding predefined groups for ISP HRM
                        var groups = ["Group X", "Group Y", "Group Z"];
                        var groupSelect = document.createElement("select");
                        groupSelect.className = "custom-select";
                        groupSelect.innerHTML =
                            "<option selected disabled>Select Group</option>";

                        groups.forEach(function(group) {
                            var option = document.createElement("option");
                            option.value = group;
                            option.text = group;
                            groupSelect.appendChild(option);
                        });

                        groupAssignmentSection.appendChild(groupSelect);
                    }
                    // Add logic for other projects or group creation as needed
                }
            </script>
        </section>
    </div>
@endsection
