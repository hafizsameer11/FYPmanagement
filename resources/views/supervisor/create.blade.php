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

                <div class="container-fluid mt-4">
                    <h2 class="bg-primary text-white p-3 mb-4">
                        New Supervisor Information Form
                    </h2>
                    <form id="addSupervisorForm" action="{{ route('supervisor.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="role" value="supervisor">
                        <div class="form-group">
                            <label for="supervisorName">Supervisor Name:</label>
                            <input type="text" class="form-control" id="supervisorName" name="name" placeholder="Enter supervisor name" required />
                        </div>
                        <div class="form-group">
                            <label for="supervisorEmail">Supervisor Email:</label>
                            <input type="email" class="form-control" id="supervisorEmail" name="email" placeholder="Enter supervisor email" required />
                        </div>
                        <div class="form-group">
                            <label for="supervisorSPID">Supervisor ID (SPID):</label>
                            <input type="text" class="form-control" id="supervisorSPID" name="spid" placeholder="Enter supervisor ID" required />
                        </div>
                        <div class="form-group">
                            <label for="studentProject">Project:</label>
                            <select name="project_id"  class="custom-select" id="StudentType" onchange="fillStudent()">
                                {{-- <option selected disabled>Select Project</option> --}}
                                    @foreach ($projects as $project )
                                    <option value="{{ $project->id }}" name="project_id">{{ $project->name }}</option>

                                    @endforeach

                                {{-- <option value="ISP E supervisions">ISP E supervisions</option> --}}
                                {{-- <option value="ISP HRM">ISP HRM</option> --}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="expertArea">Expert Area:</label>
                            <input type="text" class="form-control" id="expertArea" name="expertarea" placeholder="Enter expert area" required />
                        </div>
                        <div class="form-group">
                            <label for="supervisorPassword">Password:</label>
                            <input type="password" class="form-control" id="supervisorPassword" name="password" placeholder="Enter password" required />
                        </div>
                        <div class="form-group">
                            <label for="supervisorConfirmPassword">Confirm Password:</label>
                            <input type="password" class="form-control" id="supervisorConfirmPassword" name="password_confirmation" placeholder="Confirm password" required />
                        </div>
                        <button type="submit" class="btn btn-primary" id="submitBtn">Add Supervisor</button>
                        <div id="passwordError" class="text-danger" style="display: none;">Passwords do not match</div>
                    </form>

                </div>


            </div>
        </section>
    </div>
@endsection
@section('additional-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const password = document.getElementById('supervisorPassword');
            const confirmPassword = document.getElementById('supervisorConfirmPassword');
            const submitBtn = document.getElementById('submitBtn');
            const passwordError = document.getElementById('passwordError');

            function checkPasswordMatch() {
                if (password.value !== confirmPassword.value) {
                    passwordError.style.display = 'block';
                    submitBtn.disabled = true;
                } else {
                    passwordError.style.display = 'none';
                    submitBtn.disabled = false;
                }
            }

            password.addEventListener('input', checkPasswordMatch);
            confirmPassword.addEventListener('input', checkPasswordMatch);
        });
    </script>
@endsection
