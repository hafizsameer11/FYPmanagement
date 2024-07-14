@extends('layouts.main')
@section('main')
    <div class="main-content">
        <section class="section">
            <!-- Navbar -->

            <div class="container-fluid mt-4">
                <div class="section-header d-flex justify-content-between align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="/MainPages/HODadmin.html">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Main
                            </li>
                        </ol>
                    </nav>
                    <h1 class="mb-0">Main</h1>
                </div>



                <div class="card mb-4">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Manage Notices</h4>
                    </div>

                    <div class="card-body">
                        <ul class="list-group" id="upcomingMeetings">
                            @foreach ($notices as $notice)
                                <li class="list-group-item">
                                    <strong>Title {{ $notice->title }}</strong> <br>
                                    <strong>Description: </strong>{{ $notice->description }} <br>
                                    <strong>Date: </strong>{{ $notice->created_at }} <br>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Modal for Assigning New Meeting -->

            </div>
        </section>
    </div>
@endsection
@section('additional-scripts')

@endsection
