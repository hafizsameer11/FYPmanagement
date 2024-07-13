@extends('layouts.main')
@section('main')
<div class="main-content">
    <section class="section">
      <div
        class="section-header d-flex justify-content-between align-items-center"
      >
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

      <div class="container">
        <div class="card">
          <div class="card-header bg-primary text-white">
            Student Information
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Student Name</th>
                  <th scope="col">Project Name</th>
                  {{-- <th scope="col">Group</th> --}}
                  <th scope="col">Student ID</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($students as $student )
                <tr>
                  <td>{{ $student->user->name }}</td>
                  <td>{{ $student->project->name }}</td>
                  {{-- <td>Group A</td> --}}
                  <td>{{ $student->stid }}</td>
                </tr>

                @endforeach
           
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Modal for Progress -->
      <div
        class="modal fade"
        id="progressModal"
        tabindex="-1"
        aria-labelledby="progressModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="progressModalLabel">
                Progress Details
              </h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- Progress details content goes here -->

              <div class="card">
                <div class="card-header bg-info text-white">Progress</div>
                <div class="card-body">
                  <!-- Weekly Progress Report -->
                  <h5 class="card-title">Weekly Progress Report</h5>
                  <ul class="list-group mb-4">
                    <li class="list-group-item">
                      Week 1: Reviewed the current supervision system.
                      <span class="badge badge-info">In Progress</span>
                    </li>
                    <li class="list-group-item">
                      Week 2: Created diagrams for the current system.
                      <span class="badge badge-info">In Progress</span>
                    </li>
                    <li class="list-group-item">
                      Week 3: Consulted the supervisor and created
                      questionnaires.
                      <span class="badge badge-success">Completed</span>
                    </li>
                    <li class="list-group-item">
                      Week 4: Met with relevant teachers.
                      <span class="badge badge-success">Completed</span>
                    </li>
                    <!-- Add more weeks as needed -->
                  </ul>
                  <!-- Progress Bars -->
                  <h5 class="card-title">Overall Task Progress</h5>
                  <div class="progress mb-3">
                    <div
                      class="progress-bar bg-success"
                      role="progressbar"
                      style="width: 40%"
                    >
                      Review and Comparison - 40%
                    </div>
                  </div>
                  <div class="progress mb-3">
                    <div
                      class="progress-bar bg-warning"
                      role="progressbar"
                      style="width: 60%"
                    >
                      Diagrams of Current System - 60%
                    </div>
                  </div>
                  <div class="progress mb-3">
                    <div
                      class="progress-bar bg-success"
                      role="progressbar"
                      style="width: 100%"
                    >
                      Supervisor Consultation & Questionnaires - 100%
                    </div>
                  </div>
                  <!-- Add more progress bars as needed -->
                  <!-- Timeline View -->
                  <h5 class="card-title">Timeline View</h5>
                  <div class="timeline">
                    <div class="timeline-item left">
                      <div class="content">
                        <h6>Week 1</h6>
                        <p>Reviewed the current supervision system.</p>
                      </div>
                    </div>
                    <div class="timeline-item left">
                      <div class="content">
                        <h6>Week 1</h6>
                        <p>Reviewed the current supervision system.</p>
                      </div>
                    </div>
                    <div class="timeline-item right">
                      <div class="content">
                        <h6>Week 2</h6>
                        <p>Created diagrams for the current system.</p>
                      </div>
                    </div>
                    <div class="timeline-item left">
                      <div class="content">
                        <h6>Week 3</h6>
                        <p>
                          Consulted the supervisor and created
                          questionnaires.
                        </p>
                      </div>
                    </div>
                    <div class="timeline-item right">
                      <div class="content">
                        <h6>Week 4</h6>
                        <p>Met with relevant teachers.</p>
                      </div>
                    </div>
                    <!-- Add more timeline items as needed -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal for Upcoming Meetings -->
      <div
        class="modal fade"
        id="meetingsModal"
        tabindex="-1"
        aria-labelledby="meetingsModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="meetingsModalLabel">
                Upcoming Meetings Details
              </h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- Meeting details content goes here -->
              <div class="card">
                <div class="card-header bg-primary text-white">
                  Upcoming Meetings
                </div>
                <div class="card-body">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                      Supervisor meeting - June 20, 2024
                    </li>
                    <li class="list-group-item">
                      Group discussion - June 25, 2024
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal for Recent Feedback -->
      <div
        class="modal fade"
        id="feedbackModal"
        tabindex="-1"
        aria-labelledby="feedbackModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="feedbackModalLabel">
                Recent Feedback Details
              </h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- Feedback details content goes here -->
              <div class="card">
                <div class="card-header bg-warning text-white">
                  Recent Feedback
                </div>
                <div class="card-body">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                      Good progress on project proposal.
                    </li>
                    <li class="list-group-item">
                      Need to add more references in literature survey.
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal for Notifications -->
      <div
        class="modal fade"
        id="notificationsModal"
        tabindex="-1"
        aria-labelledby="notificationsModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="notificationsModalLabel">
                Notifications Details
              </h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- Notifications details content goes here -->
              <div class="card">
                <div class="card-header bg-danger text-white">
                  Notifications
                </div>
                <div class="card-body">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                      Your meeting with the supervisor is scheduled for
                      June 20, 2024.
                    </li>
                    <li class="list-group-item">
                      Submit the first draft of your project by June 22,
                      2024.
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
