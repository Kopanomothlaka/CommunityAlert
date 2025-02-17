@extends('admin.dashboard')

@section('main-content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <div class="pagetitle d-flex justify-content-between align-items-center">
        <h1>Add Alerts</h1>
        <!-- Button to trigger modal -->
        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
            <i class="bi bi-plus-lg"></i> Add
        </a>
    </div>
    <hr> <!-- Horizontal Line -->


@endsection
