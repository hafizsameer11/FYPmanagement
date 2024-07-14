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
                    <a class="btn btn-primary" href="{{ route('student.create') }}">Add Student</a>
                </div>
                <!-- Dashboard Statistics -->

                <!-- Search Bar -->
                <div class="row search-bar mb-4">
                    <div class="col-md-5">
                        <input type="text" class="form-control" placeholder="Search" />
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control" placeholder="ID" />
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary btn-block">Find</button>
                    </div>
                </div>

                <!-- Students Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>No.</th>
                                <th>Student's Name</th>
                                <th>Supervisor</th>
                                <th>Department</th>
                                <th>Student Type</th>
                                <th>Project</th>
                                {{-- <th>Group No</th> --}}
                                <th>Reg Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->id }}</td>
                                    <td>{{ $student->stid }}</td>
                                    <td>{{ $student->user->name }}</td>
                                    {{-- <td>M Ahsan Nafees<br />nafeesahsan@gmail.com</td> --}}
                                    <td>{{ $student->supervisor->user->name }}</td>
                                    <td>{{ $student->department }}</td>
                                    <td>{{ $student->type }}</td>
                                    <td>{{ $student->project->name }}</td>

                                    <td>{{ $student->created_at }}</td>
                                    <td>
                                        <a href="{{ route('student.edit', ['id' => $student->id]) }}"
                                            class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('student.destroy', ['id' => $student->id]) }}"
                                            class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                            @endforeach


                            <!-- Repeat the above <tr> block for more students -->
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
