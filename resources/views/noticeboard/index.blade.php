@extends('layouts.main')
@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Notifications</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="/admin">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">Notifications</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <div class="text-right">
                            <a href="{{ route('noticeboard.create') }}" class="btn btn-primary">Send notification</a>
                        </div>
                    </div>
                    <section class="card">
                        <div class="card-body">
                            <form class="mb-0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="input-label">Search</label>
                                            <input type="text" class="form-control" name="search" value="" />
                                        </div>
                                    </div>

                                    <div class="col-md-4">
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

                                    <div class="col-md-4">
                                        <div class="form-group mt-1">
                                            <label class="input-label mb-4"> </label>
                                            <input type="submit" class="text-center btn btn-primary w-100"
                                                value="Show Results" />
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped font-14" id="datatable-basic">
                                <tr>
                                    <th class="text-left">Title</th>

                                    <th class="text-center">Message</th>
                                    <th class="text-center">Type</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Created Date</th>
                                    <th>Actions</th>
                                </tr>
                                @foreach ($notices as $notice)
                                    <tr>
                                        <td>{{ $notice->title }}</td>

                                        <td class="text-center">
                                            <button type="button" data-item-id="{{ $notice->id }}"
                                                class="js-show-description btn btn-outline-primary" >
                                                Show
                                            </button>
                                            <input type="hidden"
                                                value="&lt;p&gt;&amp;nbsp;New financial document for course Meeting Reservation with type deduction with price ر.س 264&lt;/p&gt;" />
                                        </td>
                                        <td class="text-center">{{ $notice->type }}</td>
                                        <td class="text-center">
                                            <span class="text-danger">{{ $notice->staus }}</span>
                                        </td>
                                        <td class="text-center">{{ $notice->created_at }}</td>

                                        <td width="100">
                                            <a class="btn-transparent text-primary"
                                                href="{{ route('noticeboard.destroy',['id'=>$notice->id]) }}">
                                                <i class="fa fa-times" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>

                    <div class="card-footer text-center">
                        <nav>
                            <ul class="pagination">
                                <li class="page-item disabled" aria-disabled="true" aria-label="&laquo; Previous">
                                    <span class="page-link" aria-hidden="true">&lsaquo;</span>
                                </li>

                                <li class="page-item active" aria-current="page">
                                    <span class="page-link">1</span>
                                </li>
                                <li class="page-item">
                                    <a href="http:/127.0.0.1:8000/admin/notifications?page=2" class="page-link">2</a>
                                </li>
                                <li class="page-item">
                                    <a href="http:/127.0.0.1:8000/admin/notifications?page=3" class="page-link">3</a>
                                </li>
                                <li class="page-item">
                                    <a href="http:/127.0.0.1:8000/admin/notifications?page=4" class="page-link">4</a>
                                </li>
                                <li class="page-item">
                                    <a href="http:/127.0.0.1:8000/admin/notifications?page=5" class="page-link">5</a>
                                </li>
                                <li class="page-item">
                                    <a href="http:/127.0.0.1:8000/admin/notifications?page=6" class="page-link">6</a>
                                </li>
                                <li class="page-item">
                                    <a href="http:/127.0.0.1:8000/admin/notifications?page=7" class="page-link">7</a>
                                </li>

                                <li class="page-item">
                                    <a href="http:/127.0.0.1:8000/admin/notifications?page=2" class="page-link"
                                        rel="next" aria-label="Next &raquo;">&rsaquo;</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
    </div>

  <!-- Modal -->
<div class="modal fade" id="itemModal" tabindex="-1" role="dialog" aria-labelledby="itemModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="itemModalLabel">Item Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p id="itemDescription"></p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
</div>

@endsection

@section('additional-scripts')
<script>
    $(document).ready(function() {
        $('.js-show-description').click(function() {
            var itemId = $(this).data('item-id');

            // Assume AJAX call to fetch item description
            $.ajax({
                url: '/get-item-description/' + itemId,
                type: 'GET',
                success: function(response) {
                    $('#itemDescription').text(response.description); // Assuming response contains description
                    $('#itemModal').modal('show'); // Show modal
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    // Handle error scenario
                }
            });
        });
    });
</script>

@endsection
