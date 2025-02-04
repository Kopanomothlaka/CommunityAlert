<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - Send Alert</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Sidebar styling */
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            padding-top: 20px;
            transition: all 0.3s;
        }
        .sidebar a {
            padding: 10px 20px;
            display: block;
            color: white;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #007bff;
        }
        .sidebar-toggler {
            display: none;
            background-color: #343a40;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            text-align: left;
            font-size: 18px;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.3s;
        }
        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 0;
                overflow: hidden;
            }
            .content {
                margin-left: 0;
            }
            .sidebar-toggler {
                display: block;
            }
        }
    </style>
</head>
<body class="bg-light">

<!-- Sidebar Toggle Button -->
<button class="sidebar-toggler" onclick="toggleSidebar()">☰ Menu</button>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <h4 class="text-center text-white">Admin Dashboard</h4>
    <a href="#">🏠 Home</a>
    <a href="#">📢 Alerts</a>
    <a href="#">📋 Reports</a>
    <a href="#">⚙ Settings</a>
    <a href="#">🔓 Logout</a>
</div>

<!-- Main Content -->
<div class="content">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-header text-white text-center" style="background-color: #343a40;">
                        <h4>Send Alert to Community</h4>
                    </div>
                    <div class="card-body" style="background-color: #f8f9fa;">
                        <form action="{{ route('alerts.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea name="message" id="message" class="form-control" rows="4" required></textarea>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn text-white" style="background-color: #343a40;">Send Alert</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleSidebar() {
        let sidebar = document.getElementById("sidebar");
        if (sidebar.style.width === "250px") {
            sidebar.style.width = "0";
        } else {
            sidebar.style.width = "250px";
        }
    }
</script>

</body>
</html>
