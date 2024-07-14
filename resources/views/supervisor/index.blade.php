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
                                <a href="/admin.html">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                List
                            </li>
                        </ol>
                    </nav>
                    <h1 class="mb-0">Page Title</h1>
                </div>

                <div class="add-student-btn">
                    <a class="btn btn-primary" href="{{ route('supervisor.create') }}">Add Super Visers</a>
                </div>
                <!-- Dashboard Statistics -->

                <!-- Search Bar -->
                <div class="row search-bar mb-4">
                    <form action="{{ route('supervisor.search') }}" method="GET" class="w-100">
                        <div class="row">

                            <div class="col-md-5">
                                <input type="text" name="name" class="form-control" placeholder="Search by Name" value="{{ request('name') }}" />
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="spid" class="form-control" placeholder="Search by ID" value="{{ request('spid') }}" />
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary btn-block">Find</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Students Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>


                                <th>Student's Name</th>
                                <th>Supervisor Name</th>
                                <th>Supervisor ID</th>
                                <th>Supervisor Project</th>
                                <th>Expiration Area</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($supervisors as $supervisor)
                                <tr>


                                    <td>{{ $supervisor->id }}</td>

                                    <td>
                                        @foreach ($supervisor->student as $student)
                                            <li>{{ $student->user->name }}</li>
                                        @endforeach
                                    </td>
                                    <td>{{ $supervisor->user->name }}</td>
                                    <td>{{ $supervisor->spid }}</td>
                                    <td>
                                        @foreach ($supervisor->student as $student)
                                            <li>{{ $student->project->name }}</li>
                                        @endforeach
                                    </td>

                                    <!-- Leave blank if no assigned student -->

                                    <td>{{ $supervisor->expertarea }}</td>
                                    <!-- Adjust as needed -->

                                </tr>
                            @endforeach
                            <!-- Repeat the above <tr> block for more students -->
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
