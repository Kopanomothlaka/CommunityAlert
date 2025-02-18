@extends('admin.dashboard')

@section('main-content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <div class="pagetitle d-flex justify-content-between align-items-center">
        <h1>User Reports</h1>

    </div>
    <hr>

    <section class="section">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <!-- Report Card 1 -->
            <div class="col" data-status="pending" data-category="security">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title mb-0">Suspicious Activity Reported</h5>
                        </div>
                        <div class="mb-2">
                            <span class="badge bg-warning text-dark">Security</span>
                            <span class="text-muted small ms-2">
                            <i class="bi bi-clock-history me-1"></i>2023-11-15 14:30
                        </span>
                        </div>
                        <p class="card-text text-muted truncate">Resident reported unfamiliar individuals loitering near block 5...</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#viewReportModal"
                                    onclick="viewReport('Suspicious Activity', 'security', 'Resident reported unfamiliar individuals loitering near block 5...', 'John Doe', '2023-11-15 14:30')">
                                <i class="bi bi-eye"></i> View
                            </button>
                            <div class="actions">

                                <a href="#" class="btn btn-link p-0" data-bs-toggle="modal"
                                   data-bs-target="#deleteReportModal"
                                   onclick="setDeleteReport('Suspicious Activity')">
                                    <i class="bi bi-trash text-primary"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add more report cards -->
        </div>
    </section>

    <!-- View Report Modal -->
    <div class="modal fade" id="viewReportModal" tabindex="-1" aria-labelledby="viewReportModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewReportModalLabel">Report Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Report Information</h6>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <strong>Title:</strong>
                                    <span id="reportTitle"></span>
                                </li>
                                <li class="mb-2">
                                    <strong>Category:</strong>
                                    <span id="reportCategory"></span>
                                </li>
                                <li class="mb-2">
                                    <strong>Status:</strong>
                                    <span id="reportStatus"></span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6>Reporter Information</h6>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <strong>Name:</strong>
                                    <span id="reporterName"></span>
                                </li>
                                <li class="mb-2">
                                    <strong>Submitted:</strong>
                                    <span id="reportDate"></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h6>Full Description</h6>
                        <p id="reportFullDescription" class="text-muted"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Delete Report Modal -->
    <div class="modal fade" id="deleteReportModal" tabindex="-1" aria-labelledby="deleteReportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteReportModalLabel">Delete Report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete the report: <strong><span id="deleteReportTitle"></span></strong>?</p>
                    <p class="text-muted small">This action cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger">Delete Report</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // View Report Handler
        function viewReport(title, category, description, reporter, date) {
            document.getElementById('reportTitle').textContent = title;
            document.getElementById('reportCategory').textContent = category;
            document.getElementById('reportStatus').textContent = document.querySelector(`#${category}Filter [value="${category}"]`).textContent;
            document.getElementById('reportFullDescription').textContent = description;
            document.getElementById('reporterName').textContent = reporter;
            document.getElementById('reportDate').textContent = date;
        }

        // Edit Report Handler
        function populateEditForm(id, title, category, status, description) {
            document.getElementById('editReportTitle').value = title;
            document.getElementById('editReportCategory').value = category;
            document.getElementById('editReportStatus').value = status;
            document.getElementById('editReportComments').value = description;
        }

        // Delete Report Handler
        function setDeleteReport(title) {
            document.getElementById('deleteReportTitle').textContent = title;
        }

        // Filter Reports
        function filterReports() {
            const status = document.getElementById('statusFilter').value;
            const category = document.getElementById('categoryFilter').value;

            document.querySelectorAll('.col[data-status]').forEach(card => {
                const cardStatus = card.getAttribute('data-status');
                const cardCategory = card.getAttribute('data-category');

                const statusMatch = !status || cardStatus === status;
                const categoryMatch = !category || cardCategory === category;

                card.style.display = (statusMatch && categoryMatch) ? 'block' : 'none';
            });
        }
    </script>

@endsection
