@extends('layouts.main')

@section('main')
<div class="main-content">
    <section class="section">
      <!-- Navbar -->

      <div class="container-fluid mt-4">
        <!-- Dashboard Title -->
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

        <div class="container mt-5">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header bg-info text-white">Progress</div>
              <div class="card-body">
                <!-- Weekly Progress Report -->
                <h5 class="card-title">Weekly Progress Report</h5>
                <ul class="list-group mb-4">
                    @foreach ($progress as $key=>$prog )

                    <li class="list-group-item">
                      Week {{ $key }}: {{ $prog->description }}
                      <span class="badge badge-info">{{ $prog->documentation }}</span>
                    </li>
                    @endforeach

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
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card">
                <div class="card-header bg-primary text-white">
                  Current Tasks
                </div>
                <div class="card-body">
                  <ul class="list-group list-group-flush">
                    @foreach ($tasks as $task )
                    <li class="list-group-item">
                     {{$task->name}}
                    </li>

                    @endforeach

                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card">
                <div class="card-header bg-success text-white">
                  Upcoming Meetings
                </div>
                <div class="card-body">
                  <ul class="list-group list-group-flush">
                    @foreach ($meetings as $meeting )
                    <li class="list-group-item">
                        {{$meeting->title}} - {{ $meeting->date }}
                        </li>
                        @endforeach
                    {{-- <li class="list-group-item">
                      Supervisor meeting - June 20, 2024
                    </li> --}}

                  </ul>
                </div>
              </div>
              <div class="card mt-4">
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
            <div class="col-lg-4 col-md-12 mb-4">
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
