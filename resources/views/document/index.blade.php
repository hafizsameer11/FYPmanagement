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
                        <form action="{{ route('document.search') }}" method="GET" class="w-100">
                            <div class="row">

                                <div class="col-md-3">
                                    <input type="text" name="name" class="form-control" placeholder="Search by Name"
                                        value="{{ request('name') }}" />
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="spid" class="form-control" placeholder="Search by ID"
                                        value="{{ request('spid') }}" />
                                </div>
                                <div class="col-md-2">
                                    <select name="document_type" class="form-control">
                                        <option disabled selected>Select Type</option>
                                        <option value="Thesis">Thesis</option>
                                        <option value="Document">Document</option>
                                        <option value="SRS">SRS</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <button type="submit" class="btn btn-primary">Find</button>
                                </div>
                                <div class="col-md-1">
                                    <a href="{{ route('document.create') }}" class="btn btn-primary">Upload</a>
                                </div>
                            </div>
                        </form>
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
                                        <td>{{ $doc->student->department }}</td>
                                        <td>{{ $doc->document_type }}</td>
                                        <td>{{ $doc->student->project->name }}</td>
                                        <td>{{ $doc->status }}</td>

                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <a href="uploads/documents/{{ $doc->file }}" class="btn btn-info"
                                                    target="_blank"><i class="fas fa-eye"></i> View</a>
                                                {{-- <a href="#" class="btn btn-secondary"><i class="fas fa-comment"></i>
                                                    Comment</a> --}}
                                                <a href="{{ route('document.approve', ['id' => $doc->id]) }}"
                                                    class="btn btn-success"><i class="fas fa-check"></i> Approve</a>
                                                <a href="{{ route('document.unapprove', ['id' => $doc->id]) }}"
                                                    class="btn btn-warning"><i class="fas fa-times"></i> Unapprove</a>
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
