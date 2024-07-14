@extends('layouts.main')
@section('main')
    <div class="main-content">
        <section class="section">
            <!-- Navbar -->

            <div class="section-header d-flex justify-content-between align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="/MainPages/HOFYPadmin.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Main
                        </li>
                    </ol>
                </nav>
                <h1 class="mb-0">Main</h1>
            </div>

            <div class="container mt-5">
                <h2>Manage Complaints</h2>
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addComplaintModal">
                    Add Complaint
                </button>
                <table class="table table-bordered table-hover table-responsive">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Comments</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="complaintsTable">
                        @foreach ($complaints as $comp)
                            <tr>
                                <td>{{ $comp->id }}</td>
                                <td>{{ $comp->type }}</td>
                                <td>{{ $comp->description }}</td>
                                <td>{{ $comp->status }}</td>
                                <td>{{ $comp->comments }}</td>
                                <td>
                                    <a class="btn btn-success btn-sm" href="{{ route('complaint.resolve',['id'=>$comp->id]) }}">Resolve</a>
                                    <button class="btn btn-primary btn-sm" data-id="{{ $comp->id }}"
                                        onclick="openCommentModal({{ $comp->id }})">Comment</button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <!-- Add Complaint Modal -->
            <div class="modal fade" id="addComplaintModal" tabindex="-1" role="dialog"
                aria-labelledby="addComplaintModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addComplaintModalLabel">
                                Add New Complaint
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="addComplaintForm" action="{{ route('complaint.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="complaintType">Complaint Type:</label>
                                    <select class="form-control" name="type" id="complaintType" required>
                                        <option value="Supervisor">Supervisor</option>
                                        <option value="Project">Project</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="complaintDescription">Description</label>
                                    <textarea class="form-control" name="description" id="complaintDescription" rows="3" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="complaintStatus">Status</label>
                                    <select class="form-control" name="status" id="complaintStatus" required>
                                        <option value="Open">Open</option>
                                        <option value="In Progress">In Progress</option>
                                        <option value="Closed">Closed</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="complaintComments">Comments</label>
                                    <textarea class="form-control" name="comments" id="complaintComments" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Add Complaint
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Complaint Modal -->
            <div class="modal fade" id="editComplaintModal" tabindex="-1" role="dialog"
                aria-labelledby="editComplaintModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editComplaintModalLabel">
                                Edit Complaint
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="editComplaintForm">
                                <input type="hidden" id="editComplaintId" />
                                <div class="form-group">
                                    <label for="editComplaintType">Type</label>
                                    <input type="text" class="form-control" id="editComplaintType" required />
                                </div>
                                <div class="form-group">
                                    <label for="editComplaintDescription">Description</label>
                                    <textarea class="form-control" id="editComplaintDescription" rows="3" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="editComplaintStatus">Status</label>
                                    <select class="form-control" id="editComplaintStatus" required>
                                        <option value="Open">Open</option>
                                        <option value="In Progress">In Progress</option>
                                        <option value="Closed">Closed</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="editComplaintComments">Comments</label>
                                    <textarea class="form-control" id="editComplaintComments" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Save Changes
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Comment Modal -->
            <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="commentModalLabel">Add Comment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="commentForm">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="commentText">Comment:</label>
                                    <textarea class="form-control" id="commentText" name="commentText" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection
@section('additional-scripts')
    <script>
        var currentComplaintId = null;

        function openCommentModal(complaintId) {
            currentComplaintId = complaintId;
            $("#commentModal").modal("show");
        }

        $(document).ready(function() {
            $('#commentForm').on('submit', function(event) {
                event.preventDefault();
                const commentText = document.getElementById("commentText").value;
                console.log(commentText);

                $.ajax({
                    url: `/complaints/update-comment/${currentComplaintId}`,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        comment: commentText
                    },
                    success: function(response) {
                        if (response.success) {
                            alert(response.message);
                            $("#commentModal").modal("hide");
                            loadComplaints();
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function(xhr) {
                        alert('An error occurred while updating the comment.');
                    }
                });
            });
        });
    </script>
@endsection
