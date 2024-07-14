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
{{--
            <div class="add-student-btn">
                <a class="btn btn-primary" href="{{ route('student.create') }}">Add Student</a>
            </div> --}}
            <!-- Dashboard Statistics -->

            <!-- Search Bar -->


            <!-- Students Table -->
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-sm btn-primary"><i
                                        class="fas fa-edit"></i></a>
                                <a href="{{ route('user.destroy', ['id' => $user->id]) }}" class="btn btn-sm btn-danger"><i
                                        class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </section>
</div>
@endsection
