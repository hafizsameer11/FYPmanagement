@extends('layouts.main')
@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>New Notice</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="/admin">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">New Notice</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('noticeboard.store') }}" class="form-horizontal form-bordered mt-4">
                            @csrf <!-- CSRF Protection -->

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="inputDefault">Title</label>
                                        <input type="text" name="title" class="form-control" value="{{ old('title') }}" required />
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="input-label">Type</label>
                                        <select name="type" class="form-control populate" required>
                                            <option value="">Select Type</option>
                                            <option value="hofyp">Head Of FYP</option>
                                            <option value="hop">Head Of Project & committee</option>
                                            <option value="coodinator">Coordinator</option>
                                            <option value="supervisor">Supervisor</option>
                                            <option value="student">Students</option>
                                        </select>
                                        @error('type')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Message</label>
                                <textarea name="description" class="summernote form-control text-left" required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div>
                                    <button class="btn btn-primary" type="submit">Send a notice</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
