@extends('admin.dashboard')

@section('main-content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <div class="pagetitle d-flex justify-content-between align-items-center">
        <h1>Community Meetings</h1>
        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMeetingModal">
            <i class="bi bi-plus-lg"></i> Add Meeting
        </a>
    </div>
    <hr>



    <section class="section">
        <div class="row">
            <!-- Meeting Cards -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title mb-0">Water Management Meeting</h5>
                            <span class="badge bg-success">Active</span>
                        </div>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <i class="bi bi-calendar-event me-2 text-primary"></i>
                                <strong>Date:</strong> 2023-11-15 14:00 - 16:00
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-geo-alt me-2 text-primary"></i>
                                <strong>Location:</strong> Community Hall
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-people me-2 text-primary"></i>
                                <strong>Attendees:</strong> All Residents
                            </li>
                        </ul>
                        <div class="mb-3">
                            <i class="bi bi-journal-text me-2 text-primary"></i>
                            <strong>Agenda:</strong> Discuss water conservation measures
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <!-- Edit Icon (Blue) -->
                            <a href="#" class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#editMeetingModal" onclick="populateEditForm('Water Management Meeting', '2023-11-15T14:00', '2023-11-15T16:00', 'Community Hall', 'All Residents', 'Discuss water conservation measures', 'active')">
                                <i class="bi bi-pencil-square text-primary"></i>
                            </a>
                            <!-- Delete Icon (Blue) -->
                            <a href="#" class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#deleteMeetingModal" onclick="setDeleteMeeting('Water Management Meeting')">
                                <i class="bi bi-trash text-primary"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add more meeting cards as needed -->
        </div>
    </section>




    <!-- Add Meeting Modal -->
    <div class="modal fade" id="addMeetingModal" tabindex="-1" aria-labelledby="addMeetingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addMeetingModalLabel">New Community Meeting</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row g-3">
                            <!-- Meeting Title -->
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-card-heading text-primary"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Meeting Title">
                                </div>
                            </div>

                            <!-- Date & Time -->
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-calendar-date text-primary"></i>
                                    </span>
                                    <input type="datetime-local" class="form-control">
                                </div>
                            </div>

                            <!-- Location -->
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-geo-alt text-primary"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Meeting Location">
                                </div>
                            </div>

                            <!-- Agenda -->
                            <div class="col-12">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-journal-text text-primary"></i>
                                    </span>
                                    <textarea class="form-control" rows="3" placeholder="Meeting Agenda"></textarea>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="col-12">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-text-paragraph text-primary"></i>
                                    </span>
                                    <textarea class="form-control" rows="3" placeholder="Detailed Description"></textarea>
                                </div>
                            </div>

                            <!-- Attendees -->
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-people text-primary"></i>
                                    </span>
                                    <select class="form-select" multiple>
                                        <option value="parents">Parents</option>
                                        <option value="men">Men</option>
                                        <option value="women">Women</option>
                                        <option value="all">All Residents</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-info-circle text-primary"></i>
                                    </span>
                                    <select class="form-select">
                                        <option value="scheduled">Scheduled</option>
                                        <option value="ongoing">Ongoing</option>
                                        <option value="completed">Completed</option>
                                        <option value="canceled">Canceled</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Schedule Meeting</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Meeting Modal -->
    <div class="modal fade" id="editMeetingModal" tabindex="-1" aria-labelledby="editMeetingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editMeetingModalLabel">Edit Meeting</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row g-3">
                            <!-- Meeting Title -->
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-card-heading text-primary"></i>
                                    </span>
                                    <input type="text" class="form-control" id="editMeetingTitle" placeholder="Meeting Title">
                                </div>
                            </div>

                            <!-- Date & Time -->
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-calendar-date text-primary"></i>
                                    </span>
                                    <input type="datetime-local" class="form-control" id="editStartDateTime">
                                </div>
                            </div>

                            <!-- Location -->
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-geo-alt text-primary"></i>
                                    </span>
                                    <input type="text" class="form-control" id="editLocation" placeholder="Meeting Location">
                                </div>
                            </div>

                            <!-- Agenda -->
                            <div class="col-12">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-journal-text text-primary"></i>
                                    </span>
                                    <textarea class="form-control" id="editAgenda" rows="3" placeholder="Meeting Agenda"></textarea>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="col-12">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-text-paragraph text-primary"></i>
                                    </span>
                                    <textarea class="form-control" id="editDescription" rows="3" placeholder="Detailed Description"></textarea>
                                </div>
                            </div>

                            <!-- Attendees -->
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-people text-primary"></i>
                                    </span>
                                    <select class="form-select" id="editAttendees" multiple>
                                        <option value="parents">Parents</option>
                                        <option value="men">Men</option>
                                        <option value="women">Women</option>
                                        <option value="all">All Residents</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-info-circle text-primary"></i>
                                    </span>
                                    <select class="form-select" id="editStatus">
                                        <option value="scheduled">Scheduled</option>
                                        <option value="ongoing">Ongoing</option>
                                        <option value="completed">Completed</option>
                                        <option value="canceled">Canceled</option>
                                    </select>
                                </div>
                            </div>
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

    <!-- Delete Meeting Modal -->
    <div class="modal fade" id="deleteMeetingModal" tabindex="-1" aria-labelledby="deleteMeetingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteMeetingModalLabel">Delete Meeting</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete the meeting: <strong><span id="deleteMeetingTitle"></span></strong>?</p>
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
        function populateEditForm(title, startDateTime, endDateTime, location, attendees, agenda, status) {
            document.getElementById('editMeetingTitle').value = title;
            document.getElementById('editStartDateTime').value = startDateTime;
            document.getElementById('editLocation').value = location;
            document.getElementById('editAgenda').value = agenda;
            document.getElementById('editStatus').value = status;
            // Set attendees (if needed)
        }

        // Function to set the meeting title for deletion
        function setDeleteMeeting(title) {
            document.getElementById('deleteMeetingTitle').textContent = title;
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
