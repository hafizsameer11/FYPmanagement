@extends('layouts.main')
@section('main')
    <div class="main-content">
        <section class="section">
            <!-- Navbar -->
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
            <div class="container-fluid mt-4">
                <h2 class="bg-primary text-white p-3 mb-4">
                    Upload File Form For student
                </h2>
                <form method="POST" action="{{ route('document.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="studentProject">Select Student :</label>
                        <select name="student_id"  class="custom-select" id="StudentType" onchange="fillStudent()">
                                @foreach ($students as $student )
                                <option value="{{ $student->id }}" name="project_id">{{ $student->user->name }}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="studentType">Document Type:</label>
                        <select class="form-control"  name="document_type" id="studentType">
                            <option value="Thesis">Thesis</option>
                            <option value="Document">Document</option>
                            <option value="SRS">SRS</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="supervisorSPID">File Upload</label>
                        <input type="file" name="file" class="form-control" id="supervisorSPID" name="file"  required />
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Add Information
                    </button>
                </form>
            </div>

        </section>
    </div>
@endsection
