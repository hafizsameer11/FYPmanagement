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
                    <h1 class="mb-0">Scope Status</h1>
                </div>
                {{--
        <div class="add-student-btn">
          <a
            class="btn btn-primary"
            href="{{ route('student.create') }}"
            >Add Student</a
          >
        </div> --}}
                <!-- Dashboard Statistics -->

                <!-- Search Bar -->
                {{-- <div class="row search-bar mb-4">
          <div class="col-md-5">
            <input
              type="text"
              class="form-control"
              placeholder="Search"
            />
          </div>
          <div class="col-md-5">
            <input type="text" class="form-control" placeholder="ID" />
          </div>
          <div class="col-md-2">
            <button class="btn btn-primary btn-block">Find</button>
          </div>
        </div> --}}

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
                                <th>HOD Approval</th>
                                <th>HOP Approval</th>
                                {{-- <th>Group No</th> --}}
                                {{-- <th>Reg Date</th> --}}
                                {{-- <th>Actions</th> --}}
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>{{ $scopefinalization->id }}</td>
                                <td>{{ $scopefinalization->student->registration_no }}</td>
                                <td>{{ $scopefinalization->student->name }}</td>
                                {{-- <td>M Ahsan Nafees<br />nafeesahsan@gmail.com</td> --}}
                                <td>{{ $supervisor->name }}</td>
                                <td>{{ $scopefinalization->student->department }}</td>
                                <td>{{ $scopefinalization->hodapproval }}</td>
                                <td>{{ $scopefinalization->hopapproval }}</td>

                                {{-- <td>{{ $student->created_at }}</td>
                    <td>
                      <a href="#" class="btn btn-sm btn-primary"
                        ><i class="fas fa-edit"></i
                      ></a>
                      <a href="{{ route('student.destroy',['id'=>$student->id]) }}" class="btn btn-sm btn-danger"
                        ><i class="fas fa-trash"></i
                      ></a>
                    </td> --}}




                                <!-- Repeat the above <tr> block for more students -->
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
