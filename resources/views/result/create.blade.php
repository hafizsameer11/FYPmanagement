@extends('layouts.main')

@section('main')
    <div class="main-content">

        <section class="section">
            <div class="section-header">
                <h1>New User</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="/admin">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item"><a>Users</a>
                    </div>
                    <div class="breadcrumb-item">New</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 ">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-12 col-lg-12">
                                        <form action="{{ isset($record) ? route('result.update', $record->id) : route('result.store') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="form-group col-lg-6">
                                                    <label>Student</label>
                                                    <select class="form-control select2" name="student_id">
                                                        @foreach ($students as $student)
                                                            <option value="{{ $student->id }}" {{ isset($record) && $record->student_id == $student->id ? 'selected' : '' }}>
                                                                {{ $student->user->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label>Grade</label>
                                                    <input type="text" name="grade" class="form-control" value="{{ isset($record) ? $record->grade : '' }}" />
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label>Class</label>
                                                    <input type="text" name="class" class="form-control" value="{{ isset($record) ? $record->class : '' }}" />
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label>CGPA</label>
                                                    <input type="text" name="cgpa" class="form-control" value="{{ isset($record) ? $record->cgpa : '' }}" />
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label for="username">Obtain Marks</label>
                                                    <input name="obtain_marks" type="text" class="form-control" value="{{ isset($record) ? $record->obtain_marks : '' }}" aria-describedby="emailHelp">
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label for="username">Total Marks</label>
                                                    <input name="total_marks" type="text" class="form-control" value="{{ isset($record) ? $record->total_marks : '' }}" aria-describedby="emailHelp">
                                                </div>
                                            </div>
                                            <div class="text-right mt-4">
                                                <button class="btn btn-primary">{{ isset($record) ? 'Update' : 'Save' }}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </section>


    </div>
@endsection
