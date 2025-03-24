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

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <section class="section">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($jobs as $job)
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-title mb-0">{{ $job->title }}</h5>
                                <span class="badge bg-{{ $job->status === 'open' ? 'success' : 'danger' }}">{{ ucfirst($job->status) }}</span>
                            </div>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <i class="bi bi-building me-2 text-primary"></i>
                                    <strong>Company:</strong> {{ $job->company }}
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-geo-alt me-2 text-primary"></i>
                                    <strong>Location:</strong> {{ $job->location }}
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-cash me-2 text-primary"></i>
                                    <strong>Salary:</strong> R{{ number_format($job->min_salary) }} - R{{ number_format($job->max_salary) }}
                                </li>
                            </ul>
                            <div class="mb-3">
                                <i class="bi bi-clock-history me-2 text-primary"></i>
                                <strong>Posted:</strong> {{ $job->created_at->format('Y-m-d') }}
                            </div>
                            <div class="d-flex justify-content-end gap-2">
                                <a href="#" class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#editJobModal"
                                   onclick="populateEditForm('{{ $job->title }}', '{{ $job->company }}', '{{ $job->location }}', '{{ $job->min_salary }}', '{{ $job->max_salary }}', '{{ $job->job_type }}', '{{ $job->category }}', '{{ $job->deadline }}', '{{ $job->status }}', '{{ $job->description }}')">
                                    <i class="bi bi-pencil-square text-primary"></i>
                                </a>
                                <form action="{{ route('admin.jobs.destroy', $job) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this job?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link p-0">
                                        <i class="bi bi-trash text-primary"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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
                    <form id="addJobForm" action="{{ route('admin.jobs.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <!-- Job Title -->
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-card-heading text-primary"></i>
                                    </span>
                                    <input type="text" name="title" class="form-control" placeholder="Job Title" required>
                                </div>
                            </div>

                            <!-- Company & Location -->
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-building text-primary"></i>
                                    </span>
                                    <input type="text" name="company" class="form-control" placeholder="Company Name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-geo-alt text-primary"></i>
                                    </span>
                                    <input type="text" name="location" class="form-control" placeholder="Job Location" required>
                                </div>
                            </div>

                            <!-- Salary & Type -->
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-cash text-primary"></i>
                                    </span>
                                    <input type="number" name="min_salary" class="form-control" placeholder="Min Salary">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-cash-stack text-primary"></i>
                                    </span>
                                    <input type="number" name="max_salary" class="form-control" placeholder="Max Salary">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-briefcase text-primary"></i>
                                    </span>
                                    <select class="form-select" name="job_type">
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
                                    <select class="form-select" name="category">
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
                                    <input type="date" name="deadline" class="form-control" placeholder="Application Deadline">
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="col-12">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-file-text text-primary"></i>
                                    </span>
                                    <textarea class="form-control" name="description" rows="5" placeholder="Job Description" required></textarea>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-info-circle text-primary"></i>
                                    </span>
                                    <select class="form-select" name="status">
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
                    <button type="submit" form="addJobForm" class="btn btn-primary">Post Job</button>
                </div>
            </div>
        </div>
    </div>


@endsection
