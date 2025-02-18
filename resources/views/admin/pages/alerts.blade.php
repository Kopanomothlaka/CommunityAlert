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

                        <!-- Static Data Table -->
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
                                <tr>
                                    <td>Water Shortage</td>
                                    <td>Downtown Area</td>
                                    <td>2023-10-01 10:00 AM</td>
                                    <td>2023-10-01 12:00 PM</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <!-- Edit Icon -->
                                        <a href="#" class="btn btn-link p-0 me-2" aria-label="Edit" data-bs-toggle="modal" data-bs-target="#editModal" onclick="populateEditForm('Water Shortage', 'Downtown Area', '2023-10-01T10:00', '2023-10-01T12:00', 'active')">
                                            <i class="bi bi-pencil-square text-primary"></i>
                                        </a>
                                        <!-- Delete Icon -->
                                        <a href="#" class="btn btn-link p-0" aria-label="Delete" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="setDeleteAlert('Water Shortage')">
                                            <i class="bi bi-trash-fill text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Power Outage</td>
                                    <td>Suburban Area</td>
                                    <td>2023-10-02 02:00 PM</td>
                                    <td>2023-10-02 04:00 PM</td>
                                    <td><span class="badge bg-secondary">Inactive</span></td>
                                    <td>
                                        <!-- Edit Icon -->
                                        <a href="#" class="btn btn-link p-0 me-2" aria-label="Edit" data-bs-toggle="modal" data-bs-target="#editModal" onclick="populateEditForm('Power Outage', 'Suburban Area', '2023-10-02T14:00', '2023-10-02T16:00', 'inactive')">
                                            <i class="bi bi-pencil-square text-primary"></i>
                                        </a>
                                        <!-- Delete Icon -->
                                        <a href="#" class="btn btn-link p-0" aria-label="Delete" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="setDeleteAlert('Power Outage')">
                                            <i class="bi bi-trash-fill text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                <!-- Add more static rows as needed -->
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
                    <form>
                        <div class="mb-3">
                            <label for="alertName" class="form-label">Alert Name</label>
                            <input type="text" class="form-control" id="alertName" placeholder="e.g., Water Shortage, Power Outage">
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" id="location" placeholder="e.g., Downtown Area">
                        </div>
                        <div class="mb-3">
                            <label for="startDateTime" class="form-label">Start Date & Time</label>
                            <input type="datetime-local" class="form-control" id="startDateTime">
                        </div>
                        <div class="mb-3">
                            <label for="endDateTime" class="form-label">End Date & Time</label>
                            <input type="datetime-local" class="form-control" id="endDateTime">
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                                <option value="pending">Pending</option>
                                <option value="suspended">Suspended</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save Alert</button>
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
                    <form>
                        <div class="mb-3">
                            <label for="editAlertName" class="form-label">Alert Name</label>
                            <input type="text" class="form-control" id="editAlertName">
                        </div>
                        <div class="mb-3">
                            <label for="editLocation" class="form-label">Location</label>
                            <input type="text" class="form-control" id="editLocation">
                        </div>
                        <div class="mb-3">
                            <label for="editStartDateTime" class="form-label">Start Date & Time</label>
                            <input type="datetime-local" class="form-control" id="editStartDateTime">
                        </div>
                        <div class="mb-3">
                            <label for="editEndDateTime" class="form-label">End Date & Time</label>
                            <input type="datetime-local" class="form-control" id="editEndDateTime">
                        </div>
                        <div class="mb-3">
                            <label for="editStatus" class="form-label">Status</label>
                            <select class="form-select" id="editStatus">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                                <option value="pending">Pending</option>
                                <option value="suspended">Suspended</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save Changes</button>
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
                    <button type="button" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Function to populate the edit form
        function populateEditForm(alertName, location, startDateTime, endDateTime, status) {
            document.getElementById('editAlertName').value = alertName;
            document.getElementById('editLocation').value = location;
            document.getElementById('editStartDateTime').value = startDateTime;
            document.getElementById('editEndDateTime').value = endDateTime;
            document.getElementById('editStatus').value = status;
        }

        // Function to set the alert name for deletion
        function setDeleteAlert(alertName) {
            document.getElementById('deleteAlertName').textContent = alertName;
        }
    </script>



    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('assets/js/main.js')}}"></script>

@endsection
