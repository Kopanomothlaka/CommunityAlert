@extends('admin.dashboard')

@section('main-content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="pagetitle d-flex justify-content-between align-items-center">
        <h1>Community Meetings</h1>
        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMeetingModal">
            <i class="bi bi-plus-lg"></i> Add Meeting
        </a>
    </div>
    <hr>

    <section class="section">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($meetings as $meeting)
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-title mb-0">{{ $meeting->title }}</h5>
                                <span class="badge bg-{{ $meeting->status === 'scheduled' ? 'success' : ($meeting->status === 'ongoing' ? 'warning' : 'danger') }}">
                                {{ ucfirst($meeting->status) }}
                            </span>
                            </div>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <i class="bi bi-calendar-event me-2 text-primary"></i>
                                    <strong>Date:</strong> {{ $meeting->start_time->format('Y-m-d H:i') }} - {{ $meeting->end_time->format('H:i') }}
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-geo-alt me-2 text-primary"></i>
                                    <strong>Location:</strong> {{ $meeting->location }}
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-people me-2 text-primary"></i>
                                    <strong>Attendees:</strong> {{ implode(', ', $meeting->attendees ?? []) }}
                                </li>
                            </ul>
                            <div class="mb-3">
                                <i class="bi bi-journal-text me-2 text-primary"></i>
                                <strong>Agenda:</strong> {{ $meeting->agenda }}
                            </div>
                            <div class="d-flex justify-content-end gap-2">
                                <a href="#" class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#editMeetingModal" onclick="populateEditForm('{{ $meeting->id }}', '{{ $meeting->title }}', '{{ $meeting->start_time->format('Y-m-d\TH:i') }}', '{{ $meeting->end_time->format('Y-m-d\TH:i') }}', '{{ $meeting->location }}', `{{ json_encode($meeting->attendees) }}`, '{{ $meeting->agenda }}', '{{ $meeting->description }}', '{{ $meeting->status }}')">
                                    <i class="bi bi-pencil-square text-primary"></i>
                                </a>
                                <a href="#" class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#deleteMeetingModal" onclick="setDeleteMeeting('{{ $meeting->title }}', '{{ $meeting->id }}')">
                                    <i class="bi bi-trash text-primary"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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
                    <form action="{{ route('admin.meetings.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <!-- Meeting Title -->
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-card-heading text-primary"></i>
                                    </span>
                                    <input type="text" name="title" class="form-control" placeholder="Meeting Title" required>
                                </div>
                            </div>

                            <!-- Start Time -->
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-calendar-date text-primary"></i>
                                    </span>
                                    <input type="datetime-local" name="start_time" class="form-control" required>
                                </div>
                            </div>

                            <!-- End Time -->
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-calendar-date text-primary"></i>
                                    </span>
                                    <input type="datetime-local" name="end_time" class="form-control" required>
                                </div>
                            </div>

                            <!-- Location -->
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-geo-alt text-primary"></i>
                                    </span>
                                    <input type="text" name="location" class="form-control" placeholder="Meeting Location" required>
                                </div>
                            </div>

                            <!-- Agenda -->
                            <div class="col-12">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-journal-text text-primary"></i>
                                    </span>
                                    <textarea name="agenda" class="form-control" rows="3" placeholder="Meeting Agenda" required></textarea>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="col-12">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-text-paragraph text-primary"></i>
                                    </span>
                                    <textarea name="description" class="form-control" rows="3" placeholder="Detailed Description"></textarea>
                                </div>
                            </div>



                            <!-- Status -->
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-info-circle text-primary"></i>
                                    </span>
                                    <select name="status" class="form-select" required>
                                        <option value="scheduled">Scheduled</option>
                                        <option value="ongoing">Ongoing</option>
                                        <option value="completed">Completed</option>
                                        <option value="canceled">Canceled</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Schedule Meeting</button>
                        </div>
                    </form>
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
                    <form id="editMeetingForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <!-- Meeting Title -->
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-card-heading text-primary"></i>
                                    </span>
                                    <input type="text" name="title" id="editMeetingTitle" class="form-control" placeholder="Meeting Title" required>
                                </div>
                            </div>

                            <!-- Start Time -->
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-calendar-date text-primary"></i>
                                    </span>
                                    <input type="datetime-local" name="start_time" id="editStartTime" class="form-control" required>
                                </div>
                            </div>

                            <!-- End Time -->
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-calendar-date text-primary"></i>
                                    </span>
                                    <input type="datetime-local" name="end_time" id="editEndTime" class="form-control" required>
                                </div>
                            </div>

                            <!-- Location -->
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-geo-alt text-primary"></i>
                                    </span>
                                    <input type="text" name="location" id="editLocation" class="form-control" placeholder="Meeting Location" required>
                                </div>
                            </div>

                            <!-- Agenda -->
                            <div class="col-12">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-journal-text text-primary"></i>
                                    </span>
                                    <textarea name="agenda" id="editAgenda" class="form-control" rows="3" placeholder="Meeting Agenda" required></textarea>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="col-12">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-text-paragraph text-primary"></i>
                                    </span>
                                    <textarea name="description" id="editDescription" class="form-control" rows="3" placeholder="Detailed Description"></textarea>
                                </div>
                            </div>



                            <!-- Status -->
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-info-circle text-primary"></i>
                                    </span>
                                    <select name="status" id="editStatus" class="form-select" required>
                                        <option value="scheduled">Scheduled</option>
                                        <option value="ongoing">Ongoing</option>
                                        <option value="completed">Completed</option>
                                        <option value="canceled">Canceled</option>
                                    </select>
                                </div>
                            </div>
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
                    <form id="deleteMeetingForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Function to populate the edit form
        function populateEditForm(id, title, startTime, endTime, location, attendees, agenda, description, status) {
            document.getElementById('editMeetingForm').action = "{{ route('admin.meetings.update', '') }}/" + id;
            document.getElementById('editMeetingTitle').value = title;
            document.getElementById('editStartTime').value = startTime;
            document.getElementById('editEndTime').value = endTime;
            document.getElementById('editLocation').value = location;
            document.getElementById('editAgenda').value = agenda;
            document.getElementById('editDescription').value = description;
            document.getElementById('editStatus').value = status;

            // Set attendees
            const attendeesArray = JSON.parse(attendees);
            const selectElement = document.getElementById('editAttendees');
            Array.from(selectElement.options).forEach(option => {
                option.selected = attendeesArray.includes(option.value);
            });
        }

        // Function to set the meeting title for deletion
        function setDeleteMeeting(title, id) {
            document.getElementById('deleteMeetingTitle').textContent = title;
            document.getElementById('deleteMeetingForm').action = "{{ route('admin.meetings.destroy', '') }}/" + id;
        }
    </script>
@endsection
