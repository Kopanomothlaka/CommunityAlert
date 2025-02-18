@extends('admin.dashboard')

@section('main-content')

    <div class="pagetitle d-flex justify-content-between align-items-center">
        <h1>User List</h1>

    </div>
    <hr> <!-- Horizontal Line -->



    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Registered Users</h5>

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
                                    <th>Action</th>

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

@endsection
