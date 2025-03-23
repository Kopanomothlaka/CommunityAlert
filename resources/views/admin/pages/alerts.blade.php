@extends('admin.dashboard')

@section('main-content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <div class="pagetitle d-flex justify-content-between align-items-center">
        <h1>Add Alerts</h1>
        <!-- Button to trigger modal -->
        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAlertModal">
            <i class="bi bi-plus-lg"></i> Add Alert
        </a>
    </div>
    <hr> <!-- Horizontal Line -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Important Alerts</h5>

                        <!-- Display success message -->
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- Dynamic Data Table -->
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="table-light">
                                <tr>
                                    <th>Alert Name</th>
                                    <th>Location</th>
                                    <th>Start Date & Time</th>
                                    <th>End Date & Time</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($alerts as $alert)
                                    <tr>
                                        <td>{{ $alert->alert_name }}</td>
                                        <td>{{ $alert->location }}</td>
                                        <td>{{ $alert->start_datetime }}</td>
                                        <td>{{ $alert->end_datetime }}</td>
                                        <td>
                                            <span class="badge bg-{{ $alert->status === 'active' ? 'success' : 'secondary' }}">
                                                {{ ucfirst($alert->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <!-- Edit Icon -->
                                            <a href="#" class="btn btn-link p-0 me-2" aria-label="Edit" data-bs-toggle="modal" data-bs-target="#editModal" onclick="populateEditForm('{{ $alert->id }}', '{{ $alert->alert_name }}', '{{ $alert->location }}', '{{ $alert->start_datetime }}', '{{ $alert->end_datetime }}', '{{ $alert->status }}')">
                                                <i class="bi bi-pencil-square text-primary"></i>
                                            </a>
                                            <!-- Delete Icon -->
                                            <a href="#" class="btn btn-link p-0" aria-label="Delete" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="setDeleteAlert('{{ $alert->id }}', '{{ $alert->alert_name }}')">
                                                <i class="bi bi-trash-fill text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Static Pagination -->
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Add Alert Modal -->
    <div class="modal fade" id="addAlertModal" tabindex="-1" aria-labelledby="addAlertModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAlertModalLabel">Add New Alert</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.alerts.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="alertName" class="form-label">Alert Name</label>
                            <input type="text" class="form-control" id="alertName" name="alert_name" placeholder="e.g., Water Shortage, Power Outage" required>
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" id="location" name="location" placeholder="e.g., Downtown Area" required>
                        </div>
                        <div class="mb-3">
                            <label for="startDateTime" class="form-label">Start Date & Time</label>
                            <input type="datetime-local" class="form-control" id="startDateTime" name="start_datetime" required>
                        </div>
                        <div class="mb-3">
                            <label for="endDateTime" class="form-label">End Date & Time</label>
                            <input type="datetime-local" class="form-control" id="endDateTime" name="end_datetime" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                                <option value="pending">Pending</option>
                                <option value="suspended">Suspended</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Alert</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Alert Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Alert</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="editAlertName" class="form-label">Alert Name</label>
                            <input type="text" class="form-control" id="editAlertName" name="alert_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="editLocation" class="form-label">Location</label>
                            <input type="text" class="form-control" id="editLocation" name="location" required>
                        </div>
                        <div class="mb-3">
                            <label for="editStartDateTime" class="form-label">Start Date & Time</label>
                            <input type="datetime-local" class="form-control" id="editStartDateTime" name="start_datetime" required>
                        </div>
                        <div class="mb-3">
                            <label for="editEndDateTime" class="form-label">End Date & Time</label>
                            <input type="datetime-local" class="form-control" id="editEndDateTime" name="end_datetime" required>
                        </div>
                        <div class="mb-3">
                            <label for="editStatus" class="form-label">Status</label>
                            <select class="form-select" id="editStatus" name="status" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                                <option value="pending">Pending</option>
                                <option value="suspended">Suspended</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Alert Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Alert</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete the alert: <strong><span id="deleteAlertName"></span></strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Function to populate the edit form
        function populateEditForm(id, alertName, location, startDateTime, endDateTime, status) {
            document.getElementById('editForm').action = "{{ route('admin.alerts.update', '') }}/" + id;
            document.getElementById('editAlertName').value = alertName;
            document.getElementById('editLocation').value = location;
            document.getElementById('editStartDateTime').value = startDateTime.replace(' ', 'T');
            document.getElementById('editEndDateTime').value = endDateTime.replace(' ', 'T');
            document.getElementById('editStatus').value = status;
        }

        // Function to set the alert name and ID for deletion
        function setDeleteAlert(id, alertName) {
            document.getElementById('deleteForm').action = "{{ route('admin.alerts.destroy', '') }}/" + id;
            document.getElementById('deleteAlertName').textContent = alertName;
        }
    </script>

@endsection
