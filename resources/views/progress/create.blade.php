@extends('layouts.main')
@section('main')
    <div class="main-content">
        <div class="container-fluid mt-4">
            <!-- Dashboard Title -->
            <div class="section-header d-flex justify-content-between align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="/student.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Progress Report
                        </li>
                    </ol>
                </nav>
                {{-- <h1 class="mb-0">Progress Report Form for Final Year Project</h1> --}}
            </div>

            <div class="content">
                <section class="container mt-5">
                    <form id="progressReportForm" action="{{ route('progress.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="studentName">Student Name</label>
                            <input type="text" readonly class="form-control" name="student_name" id="studentName" value="{{ $student->user->name }}" required />
                        </div>
                        <div class="form-group">
                            <label for="studentID">Student ID</label>
                            <input type="text" readonly class="form-control" value="{{ $student->stid }}" name="student_id" id="studentID" required />
                        </div>
                        <div class="form-group">
                            <label for="projectTitle">Project Title</label>
                            <input type="text" value="{{ $student->project->name }}" class="form-control" name="project_title" id="projectTitle" readonly required />
                        </div>
                        <div class="form-group">
                            <label for="projectSupervisor">Project Supervisor/Advisor</label>
                            <input type="text" value="{{ $student->supervisor->user->name }}" class="form-control" name="project_supervisor" readonly id="projectSupervisor"
                                required />
                        </div>

                        <!-- Progress Details Section -->
                        <div id="weekProgressContainer">
                            <h5 class="mt-4">Weekly Progress</h5>

                        </div>
                        <button type="button" class="btn btn-secondary mt-3" onclick="addWeekProgress()">+ Add
                            Week</button>

                        <!-- Comments/Notes Section -->
                        <div class="form-group mt-5">
                            <label for="comments">Comments/Notes</label>
                            <textarea class="form-control" name="comments" id="comments" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="challenges">Challenges</label>
                            <textarea class="form-control" name="challenges" id="challenges" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="supervisorSignature">Project Supervisor/Advisor's Signature</label>
                            <input type="text" class="form-control" name="supervisor_signature"
                                id="supervisorSignature" />
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" name="date" id="date" required />
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </section>
            </div>
        </div>


    </div>
@endsection
@section('additional-scripts')

<script>
    let weekCounter = 0;

    function addWeekProgress() {
        weekCounter++;
        const weekProgressTemplate = `
        <div class="week-progress mt-4" data-week="${weekCounter}">
          <h6>Week ${weekCounter}</h6>
          <div class="form-group">
            <label for="weekStartDate_${weekCounter}">Week Start Date</label>
            <input type="date" class="form-control" name="week_start_date[]" id="weekStartDate_${weekCounter}" required>
          </div>
          <div class="form-group">
            <label for="weekEndDate_${weekCounter}">Week End Date</label>
            <input type="date" class="form-control" name="week_end_date[]" id="weekEndDate_${weekCounter}" required>
          </div>
          <div class="form-group">
            <label for="progressDescription_${weekCounter}">Progress Description</label>
            <textarea class="form-control" name="progress_description[]" id="progressDescription_${weekCounter}" rows="5" required></textarea>
          </div>

          <!-- Progress Evaluation Section -->
          <h6>Progress Evaluation</h6>
          <div class="form-group">
            <label for="researchAndDevelopment_${weekCounter}">Research and Development</label>
            <select class="form-control" name="research_and_development[]" id="researchAndDevelopment_${weekCounter}" required>
              <option value="N/A">N/A</option>
              <option value="In Progress">In Progress</option>
              <option value="Completed">Completed</option>
              <option value="Delayed">Delayed</option>
              <option value="Not Reported">Not Reported</option>
            </select>
          </div>
          <div class="form-group">
            <label for="coding_${weekCounter}">Coding</label>
            <select class="form-control" name="coding[]" id="coding_${weekCounter}" required>
              <option value="N/A">N/A</option>
              <option value="In Progress">In Progress</option>
              <option value="Completed">Completed</option>
              <option value="Delayed">Delayed</option>
              <option value="Not Reported">Not Reported</option>
            </select>
          </div>
          <div class="form-group">
            <label for="documentation_${weekCounter}">Documentation</label>
            <select class="form-control" name="documentation[]" id="documentation_${weekCounter}" required>
              <option value="N/A">N/A</option>
              <option value="In Progress">In Progress</option>
              <option value="Completed">Completed</option>
              <option value="Delayed">Delayed</option>
              <option value="Not Reported">Not Reported</option>
            </select>
          </div>
        </div>
      `;

        const weekProgressContainer = document.getElementById("weekProgressContainer");
        weekProgressContainer.insertAdjacentHTML("beforeend", weekProgressTemplate);
    }
</script>

@endsection
