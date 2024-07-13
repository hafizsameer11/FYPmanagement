@extends('layouts.main')
@section('main')
<div class="main-content">
    <section class="section">
      <!-- Navbar -->

      <div
        class="section-header d-flex justify-content-between align-items-center"
      >
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
        <button
          type="button"
          class="btn btn-primary mb-3"
          data-toggle="modal"
          data-target="#addComplaintModal"
        >
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
            <!-- Complaints will be dynamically added here -->
          </tbody>
        </table>
      </div>

      <!-- Add Complaint Modal -->
      <div
        class="modal fade"
        id="addComplaintModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="addComplaintModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addComplaintModalLabel">
                Add New Complaint
              </h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="addComplaintForm">
                <div class="form-group">
                  <label for="complaintType">Type</label>
                  <input
                    type="text"
                    class="form-control"
                    id="complaintType"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="complaintDescription">Description</label>
                  <textarea
                    class="form-control"
                    id="complaintDescription"
                    rows="3"
                    required
                  ></textarea>
                </div>
                <div class="form-group">
                  <label for="complaintStatus">Status</label>
                  <select
                    class="form-control"
                    id="complaintStatus"
                    required
                  >
                    <option value="Open">Open</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Closed">Closed</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="complaintComments">Comments</label>
                  <textarea
                    class="form-control"
                    id="complaintComments"
                    rows="3"
                  ></textarea>
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
      <div
        class="modal fade"
        id="editComplaintModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="editComplaintModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editComplaintModalLabel">
                Edit Complaint
              </h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="editComplaintForm">
                <input type="hidden" id="editComplaintId" />
                <div class="form-group">
                  <label for="editComplaintType">Type</label>
                  <input
                    type="text"
                    class="form-control"
                    id="editComplaintType"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="editComplaintDescription"
                    >Description</label
                  >
                  <textarea
                    class="form-control"
                    id="editComplaintDescription"
                    rows="3"
                    required
                  ></textarea>
                </div>
                <div class="form-group">
                  <label for="editComplaintStatus">Status</label>
                  <select
                    class="form-control"
                    id="editComplaintStatus"
                    required
                  >
                    <option value="Open">Open</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Closed">Closed</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="editComplaintComments">Comments</label>
                  <textarea
                    class="form-control"
                    id="editComplaintComments"
                    rows="3"
                  ></textarea>
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
      <div
        class="modal fade"
        id="commentModal"
        tabindex="-1"
        aria-labelledby="commentModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="commentModalLabel">
                Add Comment
              </h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="commentText">Comment:</label>
                <textarea
                  class="form-control"
                  id="commentText"
                  rows="4"
                ></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-dismiss="modal"
              >
                Close
              </button>
              <button
                type="button"
                class="btn btn-primary"
                onclick="submitComment()"
              >
                Submit
              </button>
            </div>
          </div>
        </div>
      </div>
      <script>
        const complaints = [
          {
            id: 1,
            type: "Supervisor",
            description: "Issue with supervisor",
            status: "Pending",
            comments: [
              "we  reviewed  your  compluian we   will  resolved this  as  posible  as  soon ",
            ],
          },
          {
            id: 2,
            type: "Project",
            description: "Project related issue",
            status: "Pending",
            comments: [
              "we  reviewed  your  compluian we   will  resolved this  as  posible  as  soon ",
            ],
          },
        ];
        let currentComplaintId = null;

        function loadComplaints() {
          const complaintsTable =
            document.getElementById("complaintsTable");
          complaintsTable.innerHTML = "";

          complaints.forEach((complaint) => {
            const row = document.createElement("tr");
            row.innerHTML = `
              <td>${complaint.id}</td>
              <td>${complaint.type}</td>
              <td>${complaint.description}</td>
              <td>${complaint.status}</td>
              <td>${complaint.comments.join("<br>")}</td>
              <td>
                  <button class="btn btn-success btn-sm" onclick="resolveComplaint(${
                    complaint.id
                  })">Resolve</button>
                  <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#commentModal" onclick="prepareComment(${
                    complaint.id
                  })">Comment</button>
              </td>
          `;
            complaintsTable.appendChild(row);
          });
        }

        function resolveComplaint(id) {
          const complaint = complaints.find((c) => c.id === id);
          if (complaint) {
            complaint.status = "Resolved";
            alert(`Complaint ID ${id} has been resolved.`);
            loadComplaints();
          }
        }

        function prepareComment(id) {
          currentComplaintId = id;
          document.getElementById("commentText").value = "";
        }

        function submitComment() {
          const commentText =
            document.getElementById("commentText").value;
          if (commentText) {
            const complaint = complaints.find(
              (c) => c.id === currentComplaintId
            );
            if (complaint) {
              complaint.comments.push(commentText);
              alert(
                `Your comment on complaint ID ${currentComplaintId} has been added.`
              );
              $("#commentModal").modal("hide");
              loadComplaints();
            }
          } else {
            alert("Please enter a comment.");
          }
        }

        window.onload = loadComplaints;
      </script>
    </section>
  </div>
@endsection
