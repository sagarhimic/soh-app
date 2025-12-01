<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SOH Application</title>

    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            overflow-x: hidden;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: #0d6efd;
            padding-top: 60px;
        }
        .sidebar a {
            padding: 12px 20px;
            display: block;
            color: #fff;
            text-decoration: none;
        }
        .sidebar a:hover {
            background: rgba(255,255,255,0.2);
        }

        .content {
            margin-left: 250px;
            padding: 25px;
        }

        .top-nav {
            position: fixed;
            left: 250px;
            right: 0;
            height: 60px;
            background: #fff;
            border-bottom: 1px solid #ddd;
            padding: 15px;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h5 class="text-center text-white">SOH System</h5>

        <a href="{{ url('/dashboard') }}">Dashboard</a>
        <a href="{{ url('/items') }}">Items</a>
        <a href="{{ url('/districts') }}">Districts</a>
        <a href="{{ url('/stock-updates') }}">Stock Updates</a>
        <a href="{{ url('/reports') }}">Reports</a>
        <a href="{{ url('/settings') }}">Settings</a>
    </div>

    <!-- Top Navbar -->
    <div class="top-nav d-flex justify-content-end align-items-center px-3">
        <strong>Welcome, Admin</strong>
    </div>

    <!-- Main Content -->
    <div class="content pt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
