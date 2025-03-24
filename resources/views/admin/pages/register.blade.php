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
                <div class="">
                    <div class="">
                        <h5 class="">Registered Admin</h5>
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <!-- Admin Cards -->
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                            @foreach($admins as $admin)
                                <div class="col">
                                    <div class="card shadow-sm">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h5 class="card-title mb-0">
                                                    <i class="bi bi-person-fill me-2 text-primary"></i> {{ $admin->name }}
                                                </h5>
                                                <span class="badge bg-{{ $admin->status === 'Active' ? 'success' : ($admin->status === 'Inactive' ? 'danger' : 'warning') }}">
                                                    {{ ucfirst($admin->status) }}
                                                </span>
                                            </div>
                                            <ul class="list-unstyled">
                                                <li class="mb-2">
                                                    <i class="bi bi-envelope-fill me-2 text-primary"></i>
                                                    <strong>Email:</strong> {{ $admin->email }}
                                                </li>
                                                <li class="mb-2">
                                                    <i class="bi bi-globe me-2 text-primary"></i>
                                                    <strong>Country:</strong> {{ $admin->country ?? 'N/A' }}
                                                </li>
                                                <li class="mb-2">
                                                    <i class="bi bi-house-door-fill me-2 text-primary"></i>
                                                    <strong>Address:</strong> {{ $admin->address ?? 'N/A' }}
                                                </li>
                                                <li class="mb-2">
                                                    <i class="bi bi-telephone-fill me-2 text-primary"></i>
                                                    <strong>Phone:</strong> {{ $admin->phone ?? 'N/A' }}
                                                </li>
                                            </ul>
                                            <div class="d-flex justify-content-end gap-2">
                                                <!-- Edit Button -->
                                                <a href="#" class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#editModal{{ $admin->id }}">
                                                    <i class="bi bi-pencil-square text-primary"></i>
                                                </a>
                                                <!-- Delete Button -->
                                                <a href="#" class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $admin->id }}">
                                                    <i class="bi bi-trash text-primary"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Edit Modal for Each Admin -->
                                <div class="modal fade" id="editModal{{ $admin->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $admin->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel{{ $admin->id }}">Edit Admin</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('admin.admins.update', $admin->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Full Name</label>
                                                        <input type="text" class="form-control" id="name" name="name" value="{{ $admin->name }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">Email Address</label>
                                                        <input type="email" class="form-control" id="email" name="email" value="{{ $admin->email }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="country" class="form-label">Country</label>
                                                        <input type="text" class="form-control" id="country" name="country" value="{{ $admin->country }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="address" class="form-label">Address</label>
                                                        <input type="text" class="form-control" id="address" name="address" value="{{ $admin->address }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="phone" class="form-label">Phone</label>
                                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $admin->phone }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="status" class="form-label">Status</label>
                                                        <select class="form-select" id="status" name="status" required>
                                                            <option value="Active" {{ $admin->status === 'Active' ? 'selected' : '' }}>Active</option>
                                                            <option value="Inactive" {{ $admin->status === 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                                            <option value="Pending" {{ $admin->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                                                            <option value="Suspended" {{ $admin->status === 'Suspended' ? 'selected' : '' }}>Suspended</option>
                                                        </select>
                                                    </div>
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-primary w-50">Save Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Delete Confirmation Modal for Each Admin -->
                                <div class="modal fade" id="deleteModal{{ $admin->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $admin->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $admin->id }}">Confirm Deletion</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete <strong>{{ $admin->name }}</strong>?</p>
                                                <form action="{{ route('admin.admins.destroy', $admin->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger w-100">Yes, Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
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

    <!-- Add Admin Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Add New Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.admins.store') }}" method="POST">
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
                            <label for="country" class="form-label">Country</label>
                            <input type="text" class="form-control" id="country" name="country">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone">
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
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary w-50">Save Admin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- Template Main JS File -->
    <script src="{{asset('assets/js/main.js')}}"></script>

@endsection
