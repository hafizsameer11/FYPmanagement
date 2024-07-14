@extends('layouts.main')
@section('main')
    <div class="main-content">
        <section class="section">
            <!-- Navbar -->

            <div class="container-fluid mt-4">
                <!-- Dashboard Title -->
                <div class="section-header">
                    <h1>Assign Final Year Project Tasks</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active">
                            <a href="/MainPages/Supervisoradmin.html">Dashboard</a>
                        </div>
                        <div class="breadcrumb-item">Tasks</div>
                    </div>
                </div>

                <div class="content">
                    <section class="container mt-5">
                        <h1>Select Student</h1>
                        <form id="studentSelectionForm" method="POST" action="{{ route('scope.form.submit') }}">
                            @csrf
                            <div class="form-group">
                                <label for="studentNameSelect">Select Student</label>
                                <select class="form-control" name="id" id="studentNameSelect">
                                    @foreach ($students as $student)
                                        <option value="{{ $student->user->id }}">{{ $student->user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                View Progress
                            </button>
                        </form>

                    </section>
                </div>

                <script src="/assets/default/js/js for pages/progress.js"></script>
            </div>
        </section>
    </div>
@endsection

