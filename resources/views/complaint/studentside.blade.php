@extends('layouts.main')
@section('main')
<div class="main-content">
    <section class="section">
      <!-- Navbar -->

      <div class="container-fluid mt-4">
        <div class="container mt-5">
          <h2>Submit Complaint</h2>
          <form id="complaintForm" method="POST" action="{{ route('complaint.submit.store') }}">
            @csrf
            <div class="form-group">
              <label for="complaintType">Complaint Type:</label>
              <select name="type"  class="form-control" id="complaintType" required>
                <option value="Supervisor">Supervisor</option>
                <option value="Project">Project</option>
                <option value="Other">Other</option>
              </select>
            </div>
            <div class="form-group">
              <label for="complaintDescription">Description:</label>
              <textarea name="description"
                class="form-control"
                id="complaintDescription"
                rows="4"
                required
              ></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
       
      </div>
    </section>
  </div>
@endsection
