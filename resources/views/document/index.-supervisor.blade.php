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
                <!-- Dashboard Statistics -->
                <div class="container-fluid my-5 STDDOCsrch">
                    <!-- Search Bar -->
                    <div class="row search-bar mb-4">
                        <div class="col-md-3">
                            <input type="text" class="form-control" placeholder="Search" />
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" placeholder="ID" />
                        </div>
                        <div class="col-md-2">
                            <select class="form-control">
                                <option disabled selected>Select Type</option>
                                <option value="type1">Type 1</option>
                                <option value="type2">Type 2</option>
                                <option value="type3">Type 3</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                        <div class="col-md-1">
                            <button class="btn btn-primary">Find</button>
                        </div>
                        <div class="col-md-1">
                            <button class="btn btn-primary">Upload</button>
                        </div>
                    </div>
                    <!-- Main Section - Document List -->
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>Student ID</th>
                                    <th>Student Name</th>
                                    <th>Supervisor Name</th>
                                    <th>Department</th>
                                    <th>Document Type</th>
                                    <th>Project Name</th>
                                    <th>Status</th>

                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($documents as $doc)
                                    <tr>

                                        <td>{{ $doc->student->stid }}</td>
                                        <td>{{ $doc->student->user->name }}</td>
                                        <td>{{ $doc->student->supervisor->user->name }}</td>
                                        <td>{{ $doc->student->department}}</td>
                                        <td>{{ $doc->document_type}}</td>
                                        <td>{{ $doc->student->project->name}}</td>
                                        <td>{{ $doc->status}}</td>

                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <a href="uploads/documents/{{ $doc->file }}" class="btn btn-info" target="_blank"><i class="fas fa-eye"></i> View</a>
                                                {{-- <a href="#" class="btn btn-secondary"><i class="fas fa-comment"></i>
                                                    Comment</a> --}}
                                                    <a href="{{ route('document.approve', ['id' => $doc->id]) }}" class="btn btn-success"><i class="fas fa-check"></i> Approve</a>
                                                    <a href="{{ route('document.unapprove', ['id' => $doc->id]) }}" class="btn btn-warning"><i class="fas fa-times"></i> Unapprove</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
