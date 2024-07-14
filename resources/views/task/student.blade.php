@extends('layouts.main')
@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tasks</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="/admin">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">Tasks</div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-pen"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Project Tasks</h4>
                            </div>
                            <div class="card-body">{{ $totaltask }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Pending Review</h4>
                            </div>
                            <div class="card-body">{{ $Pending }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Passed</h4>
                            </div>
                            <div class="card-body">{{ $passed }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-times"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Failed</h4>
                            </div>
                            <div class="card-body">{{ $failed }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-body">
                <section class="card">
                    <div class="card-body">
                        <form method="get" class="mb-0">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="input-label">Start Date</label>
                                        <div class="input-group">
                                            <input type="date" id="fsdate" class="text-center form-control"
                                                name="from" value="" placeholder="Start Date" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="input-label">End Date</label>
                                        <div class="input-group">
                                            <input type="date" id="lsdate" class="text-center form-control"
                                                name="to" value="" placeholder="End Date" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="input-label">Project</label>
                                        <select name="webinar_ids[]" multiple=""
                                            class="form-control search-webinar-select2 select2-hidden-accessible"
                                            data-placeholder="Search classes" data-select2-id="select2-data-1-ss4o"
                                            tabindex="-1" aria-hidden="true"></select>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="input-label">Status</label>
                                        <select name="status" class="form-control populate">
                                            <option value="">All</option>
                                            <option value="active">Completed</option>
                                            <option value="inactive">Uncompleted</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group mt-1">
                                        <label class="input-label mb-4"> </label>
                                        <input type="submit" class="text-center btn btn-primary w-100"
                                            value="Show Results" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive text-center">
                            <table class="table table-striped font-14">
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                    <tr>

                                        <td>{{ $task->id }}</td>
                                        <td class="text-left">
                                            <div class="d-flex align-items-center">

                                                <div class="media-body ml-1">
                                                    <div class="mt-0 mb-1 font-weight-bold">
                                                        {{ $task->student->user->name }}
                                                    </div>
                                                    <div class="text-primary text-small font-600-bold">
                                                        {{ $task->student->user->email }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $task->name }}</td>
                                        <td>{{ $task->type }}</td>
                                        <td>{{ $task->student->project->name }}</td>
                                        <td>{{ $task->end_date }}</td>
                                        <td>{{ $task->end_date }}</td>
                                        <td>{{ $task->description }}
                                        </td>
                                        <td>{{ $task->status }}</td>
                                    </tr>

                                    @endforeach
                                    <!-- Add more task rows as needed -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('additional-scripts')
@endsection
