@extends('layouts.main')
@section('main')
    <div class="main-content">
        <section class="section">
            <!-- Navbar -->

            <div class="container-fluid mt-4">
                <!-- Dashboard Title -->
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

                <div class="container mt-5">
                    <div class="card">
                        <div class="card-header">Project Details</div>
                        <div class="card-body">
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addProjectModal">Add
                                New Project</a>

                            <div class="table-responsive mt-3">
                                <table class="table table-bordered" id="projectTable">
                                    <thead>
                                        <tr>
                                            <th>Project Name</th>
                                            <th>Project Status</th>
                                            <th>Project Number</th>
                                            <th>Project Added Year</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($projects as $project )
                                        <tr>
                                            <td>{{$project->name}}</td>
                                            <td>{{$project->status}}</td>
                                            <td>{{$project->pnumber}}</td>
                                            <td>{{$project->year}}</td>
                                            </tr>

                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add Project Modal -->
                <div class="modal fade" id="addProjectModal" tabindex="-1" role="dialog"
                    aria-labelledby="addProjectModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addProjectModalLabel">
                                    Add New Project
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="addProjectForm" action="{{ route('project.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="projectNumber">Project Number</label>
                                        <input type="text" class="form-control" id="projectNumber" name="pnumber"
                                            required />
                                    </div>
                                    <div class="form-group">
                                        <label for="projectName">Project Name</label>
                                        <input type="text" class="form-control" id="projectName" name="name"
                                            required />
                                    </div>
                                    <div class="form-group">
                                        <label for="projectStatus">Project Status</label>
                                        <select class="form-control" id="projectStatus" name="status" required>
                                            <option value="New">New</option>
                                            <option value="ongoing">Ongoing</option>
                                            <option value="completed">Completed</option>
                                            <option value="flopped">Flopped</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="projectAddedYear">Project Added Year</label>
                                        <input type="number" class="form-control" id="projectAddedYear" name="year"
                                            min="1900" max="2099" step="1" value="2024" required />
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Project</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </section>
    </div>
@endsection
