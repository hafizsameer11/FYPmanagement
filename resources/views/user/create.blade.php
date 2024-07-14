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
                                    <form action="{{ route('user.store') }}" method="Post">
                                        @csrf
                     

                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control  "
                                                value=""
                                                placeholder="The user name will be displayed on all pages." />
                                        </div>

                                        <div class="form-group">
                                            <label for="username">User Email:</label>
                                            <input name="email" type="text" class="form-control  "
                                                id="username" value="" aria-describedby="emailHelp">
                                        </div>

                                        <div class="form-group">
                                            <label class="input-label">Password</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span type="button" class="input-group-text">
                                                        <i class="fa fa-lock"></i>
                                                    </span>
                                                </div>
                                                <input type="password" name="password"
                                                    class="form-control " />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>User Role</label>
                                            <select class="form-control select2 " id="roleId"
                                                name="role">
                                                <option disabled selected>Select a user role</option>
                                                <option value="coordinator">Coordinator</option>
                                                <option value="hofyp">Head Of FYP </option>
                                                <option value="hop">Head Of Project&Search committee </option>

                                            </select>
                                        </div>





                                        <div class="text-right mt-4">
                                            <button class="btn btn-primary">Save</button>
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
