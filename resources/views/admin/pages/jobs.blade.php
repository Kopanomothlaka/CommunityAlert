@extends('admin.dashboard')

@section('main-content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <div class="pagetitle d-flex justify-content-between align-items-center">
        <h1>Job Postings</h1>
        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addJobModal">
            <i class="bi bi-plus-lg"></i> Post New Job
        </a>
    </div>
    <hr>

    <section class="section">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <!-- Job Card 1 -->
            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title mb-0">Senior Web Developer</h5>
                            <span class="badge bg-success">Open</span>
                        </div>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <i class="bi bi-building me-2 text-primary"></i>
                                <strong>Company:</strong> Tech Corp Inc.
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-geo-alt me-2 text-primary"></i>
                                <strong>Location:</strong> Remote
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-cash me-2 text-primary"></i>
                                <strong>Salary:</strong> $80,000 - $100,000
                            </li>
                        </ul>
                        <div class="mb-3">
                            <i class="bi bi-clock-history me-2 text-primary"></i>
                            <strong>Posted:</strong> 2023-11-01
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="#" class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#editJobModal"
                               onclick="populateEditForm('Senior Web Developer', 'Tech Corp Inc.', 'Remote', '80000', '100000', 'Full-time', 'IT', '2023-12-01', 'Open', 'Job description...')">
                                <i class="bi bi-pencil-square text-primary"></i>
                            </a>
                            <a href="#" class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#deleteJobModal"
                               onclick="setDeleteJob('Senior Web Developer')">
                                <i class="bi bi-trash text-primary"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title mb-0">Senior Web Developer</h5>
                            <span class="badge bg-success">Open</span>
                        </div>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <i class="bi bi-building me-2 text-primary"></i>
                                <strong>Company:</strong> Tech Corp Inc.
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-geo-alt me-2 text-primary"></i>
                                <strong>Location:</strong> Remote
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-cash me-2 text-primary"></i>
                                <strong>Salary:</strong> $80,000 - $100,000
                            </li>
                        </ul>
                        <div class="mb-3">
                            <i class="bi bi-clock-history me-2 text-primary"></i>
                            <strong>Posted:</strong> 2023-11-01
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="#" class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#editJobModal"
                               onclick="populateEditForm('Senior Web Developer', 'Tech Corp Inc.', 'Remote', '80000', '100000', 'Full-time', 'IT', '2023-12-01', 'Open', 'Job description...')">
                                <i class="bi bi-pencil-square text-primary"></i>
                            </a>
                            <a href="#" class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#deleteJobModal"
                               onclick="setDeleteJob('Senior Web Developer')">
                                <i class="bi bi-trash text-primary"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Add more job cards here -->
        </div>
    </section>

    <!-- Add Job Modal -->
    <div class="modal fade" id="addJobModal" tabindex="-1" aria-labelledby="addJobModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addJobModalLabel">Post New Job</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row g-3">
                            <!-- Job Title -->
                            <div class="col-md-12">
                                <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-card-heading text-primary"></i>
                                </span>
                                    <input type="text" class="form-control" placeholder="Job Title" required>
                                </div>
                            </div>

                            <!-- Company & Location -->
                            <div class="col-md-6">
                                <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-building text-primary"></i>
                                </span>
                                    <input type="text" class="form-control" placeholder="Company Name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-geo-alt text-primary"></i>
                                </span>
                                    <input type="text" class="form-control" placeholder="Job Location" required>
                                </div>
                            </div>

                            <!-- Salary & Type -->
                            <div class="col-md-4">
                                <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-cash text-primary"></i>
                                </span>
                                    <input type="number" class="form-control" placeholder="Min Salary">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-cash-stack text-primary"></i>
                                </span>
                                    <input type="number" class="form-control" placeholder="Max Salary">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-briefcase text-primary"></i>
                                </span>
                                    <select class="form-select">
                                        <option value="full-time">Full-time</option>
                                        <option value="part-time">Part-time</option>
                                        <option value="contract">Contract</option>
                                        <option value="remote">Remote</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Category & Deadline -->
                            <div class="col-md-6">
                                <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-tag text-primary"></i>
                                </span>
                                    <select class="form-select">
                                        <option value="it">IT</option>
                                        <option value="marketing">Marketing</option>
                                        <option value="finance">Finance</option>
                                        <option value="hr">Human Resources</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-calendar-check text-primary"></i>
                                </span>
                                    <input type="date" class="form-control" placeholder="Application Deadline">
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="col-12">
                                <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-file-text text-primary"></i>
                                </span>
                                    <textarea class="form-control" rows="5" placeholder="Job Description" required></textarea>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="col-md-12">
                                <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-info-circle text-primary"></i>
                                </span>
                                    <select class="form-select">
                                        <option value="open">Open</option>
                                        <option value="closed">Closed</option>
                                        <option value="pending">Pending</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Post Job</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Job Modal -->
    <div class="modal fade" id="editJobModal" tabindex="-1" aria-labelledby="editJobModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editJobModalLabel">Edit Job Posting</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row g-3">
                            <!-- Job Title -->
                            <div class="col-md-12">
                                <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-card-heading text-primary"></i>
                                </span>
                                    <input type="text" class="form-control" id="editJobTitle" placeholder="Job Title" required>
                                </div>
                            </div>

                            <!-- Company & Location -->
                            <div class="col-md-6">
                                <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-building text-primary"></i>
                                </span>
                                    <input type="text" class="form-control" id="editCompany" placeholder="Company Name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-geo-alt text-primary"></i>
                                </span>
                                    <input type="text" class="form-control" id="editLocation" placeholder="Job Location" required>
                                </div>
                            </div>

                            <!-- Salary & Type -->
                            <div class="col-md-4">
                                <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-cash text-primary"></i>
                                </span>
                                    <input type="number" class="form-control" id="editMinSalary" placeholder="Min Salary">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-cash-stack text-primary"></i>
                                </span>
                                    <input type="number" class="form-control" id="editMaxSalary" placeholder="Max Salary">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-briefcase text-primary"></i>
                                </span>
                                    <select class="form-select" id="editJobType">
                                        <option value="full-time">Full-time</option>
                                        <option value="part-time">Part-time</option>
                                        <option value="contract">Contract</option>
                                        <option value="remote">Remote</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Category & Deadline -->
                            <div class="col-md-6">
                                <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-tag text-primary"></i>
                                </span>
                                    <select class="form-select" id="editCategory">
                                        <option value="it">IT</option>
                                        <option value="marketing">Marketing</option>
                                        <option value="finance">Finance</option>
                                        <option value="hr">Human Resources</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-calendar-check text-primary"></i>
                                </span>
                                    <input type="date" class="form-control" id="editDeadline" placeholder="Application Deadline">
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="col-12">
                                <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-file-text text-primary"></i>
                                </span>
                                    <textarea class="form-control" id="editDescription" rows="5" placeholder="Job Description" required></textarea>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="col-md-12">
                                <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-info-circle text-primary"></i>
                                </span>
                                    <select class="form-select" id="editStatus">
                                        <option value="open">Open</option>
                                        <option value="closed">Closed</option>
                                        <option value="pending">Pending</option>
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

    <script>
        function populateEditForm(
            title,
            company,
            location,
            minSalary,
            maxSalary,
            type,
            category,
            deadline,
            status,
            description
        ) {
            document.getElementById('editJobTitle').value = title;
            document.getElementById('editCompany').value = company;
            document.getElementById('editLocation').value = location;
            document.getElementById('editMinSalary').value = minSalary;
            document.getElementById('editMaxSalary').value = maxSalary;
            document.getElementById('editJobType').value = type;
            document.getElementById('editCategory').value = category;
            document.getElementById('editDeadline').value = deadline;
            document.getElementById('editStatus').value = status;
            document.getElementById('editDescription').value = description;
        }

        function setDeleteJob(title) {
            document.getElementById('deleteJobTitle').textContent = title;
        }
    </script>

    <!-- Delete Job Modal -->
    <div class="modal fade" id="deleteJobModal" tabindex="-1" aria-labelledby="deleteJobModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteJobModalLabel">Delete Job Posting</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete the job posting: <strong><span id="deleteJobTitle"></span></strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function populateEditForm(title, company, location, minSalary, maxSalary, type, category, deadline, status, description) {
            document.getElementById('editJobTitle').value = title;
            document.getElementById('editCompany').value = company;
            // ... populate all other fields ...
        }

        function setDeleteJob(title) {
            document.getElementById('deleteJobTitle').textContent = title;
        }
    </script>

    <!-- Include remaining JS files as in original -->


@endsection
