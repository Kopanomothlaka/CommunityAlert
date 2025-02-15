<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CommunityAlert Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar {
            background-color: #2c3e50;
            min-height: 100vh;
            padding: 20px;
        }

        .nav-link {
            color: #ecf0f1 !important;
            margin: 8px 0;
            border-radius: 5px;
        }

        .nav-link:hover {
            background-color: #34495e;
        }

        .main-content {
            padding: 20px;
            background-color: #f8f9fa;
            min-height: 100vh;
        }

        .welcome-message {
            color: #bdc3c7;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 col-12 sidebar">
            <h2 class="text-white mb-4">CommunityAlert</h2>
            <p class="welcome-message">Welcome back Steven Kopano</p>

            <nav class="nav flex-column">
                <a class="nav-link active" href="#">
                    <i class="fas fa-home me-2"></i> Home
                </a>
                <a class="nav-link" href="#">
                    <i class="fas fa-bell me-2"></i> Alerts
                </a>
                <a class="nav-link" href="#">
                    <i class="fas fa-file-alt me-2"></i> Reports
                </a>
                <a class="nav-link" href="#">
                    <i class="fas fa-briefcase me-2"></i> Jobs
                </a>
                <a class="nav-link" href="#">
                    <i class="fas fa-users me-2"></i> Users
                </a>
                <a class="nav-link" href="#">
                    <i class="fas fa-chart-bar me-2"></i> Analytics
                </a>
                <a class="nav-link" href="#">
                    <i class="fas fa-cog me-2"></i> Settings
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 col-12 main-content">
            <div class="input-group mb-4">
                <input type="text" class="form-control" placeholder="Search here...">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>

            <h4 class="mb-4">Alerts</h4>

            <!-- Alert Cards (Example) -->
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Recent Activity</h5>
                            <p class="card-text">No new alerts</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/your-kit-code.js" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
