@extends('admin.dashboard')

@section('main-content')

    <div class="pagetitle d-flex justify-content-between align-items-center">
        <h1>Admin List</h1>
        <!-- Button to trigger modal -->
        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
            <i class="bi bi-plus-lg"></i> Add
        </a>
    </div>
    <hr> <!-- Horizontal Line -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Registered Admin</h5>

                        <!-- Static Data Table -->
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="table-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Residence</th>
                                    <th>Location</th>
                                    <th>Registration Date</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Unity Pugh</td>
                                    <td>#9958</td>
                                    <td>Curicó, Chile</td>
                                    <td>2005-02-11</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                </tr>
                                <tr>
                                    <td>Theodore Duran</td>
                                    <td>#8971</td>
                                    <td>Dhanbad, India</td>
                                    <td>1999-04-07</td>
                                    <td><span class="badge bg-secondary">Inactive</span></td>
                                </tr>
                                <tr>
                                    <td>Kylie Bishop</td>
                                    <td>#3147</td>
                                    <td>Norman, USA</td>
                                    <td>2005-09-08</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                </tr>
                                <tr>
                                    <td>Willow Gilliam</td>
                                    <td>#3497</td>
                                    <td>Amqui, Canada</td>
                                    <td>2009-11-29</td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>Blossom Dickerson</td>
                                    <td>#5018</td>
                                    <td>Kempten, Germany</td>
                                    <td>2006-11-09</td>
                                    <td><span class="badge bg-danger">Suspended</span></td>
                                </tr>
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

    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Add New Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                                <option value="Pending">Pending</option>
                                <option value="Suspended">Suspended</option>
                            </select>
                        </div>
                        <div class="text-center"> <!-- Centering the button -->
                            <button type="submit" class="btn btn-primary w-50">Save Admin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
