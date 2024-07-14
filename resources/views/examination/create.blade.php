@extends('layouts.main')
@section('main')
    <div class="main-content">
        {{-- <h2>Hello</h2> --}}
        <section class="section">
            <div class="container-fluid mt-4">
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
                    <div class="container mt-5">
                        <h2 class="mb-4">Manage FYP Tables</h2>

                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal"
                            data-target="#addTableModal">
                            Add New Table
                        </button>

                        <div id="tablesContainer" class="table-container">
                            <!-- Existing tables will be inserted here -->
                            @foreach ($tables as $table)
                                <div class="table-responsive" data-table-id="{{ $table->id }}">
                                    <h3>{{ $table->name }}</h3>
                                    <div class="action-buttons">
                                        <button type="button" class="btn btn-secondary btn-edit">Edit</button>
                                        <button type="button" class="btn btn-danger btn-delete">Delete</button>
                                        <button type="button" class="btn btn-primary btn-published">Published</button>
                                    </div>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                @foreach ($table->headers as $header)
                                                    <th>{{ $header }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($table->records as $record)
                                                <tr>
                                                    @foreach ($record->records as $value)
                                                        <td>{{ $value }}</td>
                                                    @endforeach
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="{{ count($table->headers) }}">No data available</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Modal to add new table -->
                    <div class="modal fade" id="addTableModal" tabindex="-1" role="dialog"
                        aria-labelledby="addTableModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addTableModalLabel">Add New Table</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="addTableForm">
                                        <div class="form-group">
                                            <label for="tableName">Table Name (optional)</label>
                                            <input type="text" class="form-control" id="tableName"
                                                placeholder="Enter Table Name" />
                                        </div>
                                        <div class="form-group">
                                            <label for="tableHeaders">Table Headers (comma-separated)</label>
                                            <input type="text" class="form-control" id="tableHeaders"
                                                placeholder="Header1, Header2, Header3" required />
                                        </div>
                                        <button type="submit" class="btn btn-primary">Create Table</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Edit Table Modal -->
    <div class="modal fade" id="editTableModal" tabindex="-1" role="dialog" aria-labelledby="editTableModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTableModalLabel">Edit Table Record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editTableForm">
                        <div id="recordFields">
                            <!-- Input fields for table record will be inserted here -->
                        </div>
                        <button type="submit" class="btn btn-primary">Update Record</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('additional-scripts')
    <script>
        $(document).ready(function() {
            let tables = @json($tables);

            function createTableHtml(table) {
                let headersHtml = "";
                table.headers.forEach((header) => {
                    headersHtml += `<th>${header}</th>`;
                });

                let tableHtml = `
                <div class="table-responsive" data-table-id="${table.id}">
                    <h3>${table.name}</h3>
                    <div class="action-buttons">
                        <button type="button" class="btn btn-secondary btn-edit">Edit</button>
                        <button type="button" class="btn btn-danger btn-delete">Delete</button>
                        <button type="button" class="btn btn-primary btn-published">Published</button>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>${headersHtml}</tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="${table.headers.length}">No data available</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            `;
                return tableHtml;
            }

            $("#addTableForm").on("submit", function(e) {
                e.preventDefault();
                let tableName = $("#tableName").val().trim();
                let tableHeaders = $("#tableHeaders").val().trim();

                if (tableHeaders) {
                    let headersArray = tableHeaders.split(",").map((header) => header.trim());

                    $.ajax({
                        url: "{{ route('dynamic-tables.store') }}",
                        method: "POST",
                        data: {
                            name: tableName,
                            headerss: headersArray.join(","),
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            let table = {
                                id: response.id,
                                name: response.name,
                                headers: headersArray,
                            };

                            let tableHtml = createTableHtml(table);
                            $("#tablesContainer").append(tableHtml);

                            tables.push(table);

                            $("#addTableForm")[0].reset();
                            $("#addTableModal").modal("hide");
                        },
                        error: function(response) {
                            alert("An error occurred while creating the table.");
                        }
                    });
                } else {
                    alert("Please enter table headers.");
                }
            });
            $("#tablesContainer").on("click", ".btn-edit", function() {
                let tableId = $(this).closest(".table-responsive").data("table-id");
                let table = tables.find(t => t.id == tableId);
                console.log("clicked");

                if (table) {
                    let fieldsHtml = "";
                    table.headers.forEach(header => {
                        fieldsHtml += `
                <div class="form-group">
                    <label for="${header}">${header}</label>
                    <input type="text" class="form-control" name="${header}" value="${getTableRecordValue(table, header)}" placeholder="Enter ${header}">
                </div>
            `;
                    });
                    $("#recordFields").html(fieldsHtml); // Populate fields in the modal
                    $("#editTableModal").data("table-id", tableId).modal("show");
                }
            });

            function getTableRecordValue(table, header) {
                // Replace this with logic to fetch existing record values based on `table` and `header`
                return ""; // Default or actual value from the record
            }

            $("#editTableForm").on("submit", function(e) {
                e.preventDefault();
                let tableId = $("#editTableModal").data("table-id");
                let table = tables.find(t => t.id == tableId);
                let formData = $(this).serialize();
                console.log(formData);

                if (table) {
                    $.ajax({
                        url: `/dynamic-tables/${tableId}/records`,
                        method: "POST",
                        data: formData + `&_token={{ csrf_token() }}`,
                        success: function(response) {
                            // Update the table UI with the new records
                            location.reload();

                        },
                        error: function(response) {
                            alert("An error occurred while adding the record.");
                        }
                    });
                }
            });

            $("#tablesContainer").on("click", ".btn-delete", function() {
                let tableId = $(this).closest(".table-responsive").data("table-id");

                $.ajax({
                    url: `/dynamic-tables/${tableId}`,
                    method: "DELETE",
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        $(`[data-table-id="${tableId}"]`).remove();
                        tables = tables.filter(t => t.id != tableId);
                    },
                    error: function(response) {
                        alert("An error occurred while deleting the table.");
                    }
                });
            });

            $("#tablesContainer").on("click", ".btn-published", function() {
                let tableId = $(this).closest(".table-responsive").data("table-id");
                $.ajax({
                    url: `/dynamic-publish/${tableId}`,
                    method: "GET",
                    success: function(response) {
                        alert(response.success);
                        location.reload();
                    },
                    error: function(response) {
                        alert("An error occurred while deleting the table.");
                    }
                });
            });
        });
    </script>
@endsection
