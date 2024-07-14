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
                                <div class="col-12 col-md-6 col-lg-6">
                                    <form action="{{ route('user.update', ['id' => $user->id]) }}" method="POST">
                                        @csrf


                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ $user->name }}" placeholder="User Name">
                                        </div>

                                        <div class="form-group">
                                            <label>User Email:</label>
                                            <input type="text" name="email" class="form-control" value="{{ $user->email }}" placeholder="User Email">
                                        </div>

                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control" placeholder="Enter new password">
                                        </div>

                                        <div class="form-group">
                                            <label>User Role</label>
                                            <select class="form-control" name="role">
                                                <option disabled>Select a user role</option>
                                                <option value="coordinator" {{ $user->role == 'coordinator' ? 'selected' : '' }}>Coordinator</option>
                                                <option value="hofyp" {{ $user->role == 'hofyp' ? 'selected' : '' }}>Head Of FYP</option>
                                                <option value="hop" {{ $user->role == 'hop' ? 'selected' : '' }}>Head Of Project & Search committee</option>
                                            </select>
                                        </div>

                                        <div class="text-right mt-4">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>

@endsection
