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
                        <form method="post" action="/admin/noticeboards/store" class="form-horizontal form-bordered mt-4">
                            <input type="hidden" name="_token" value="Ob4QFESeSc20rH3Vs4j1zCyAEHBfyHJsGnptX1he" />

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="inputDefault">Title</label>
                                        <input type="text" name="title" class="form-control" value="" />
                                        <div class="invalid-feedback"></div>
                                    </div>

                                    <div class="form-group">
                                        <label class="input-label">Type</label>
                                        <select name="type" data-plugin-selectTwo class="form-control populate">
                                            <option value="">All Types</option>

                                            <option value="organizations">Head Of FYP</option>
                                            <option value="students_and_instructors">
                                                Head Of Project & committee
                                            </option>
                                            <option value="students_and_instructors">
                                                Coordinator
                                            </option>
                                            <option value="instructors">Supervisor</option>
                                            <option value="students">Students</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Message</label>
                                <textarea name="message" class="summernote form-control text-left"></textarea>
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="form-group">
                                <div>
                                    <button class="btn btn-primary" type="submit">
                                        Send a notice
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
