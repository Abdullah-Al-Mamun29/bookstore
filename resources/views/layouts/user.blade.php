<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard | OnlineBookStore</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --orange: #f39c12;
            --dark-bg: #121212;
            --panel-bg: #1a1a1a;
        }

        body {
            background-color: var(--dark-bg);
            color: white;
            font-family: 'Poppins', sans-serif;
            margin: 0;
        }

        .wrapper {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        .sidebar {
            width: 260px;
            background: #000;
            border-right: 1px solid #333;
            padding: 20px;
            flex-shrink: 0;
        }

        .sidebar .brand {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 40px;
            color: #fff;
            text-decoration: none;
            display: block;
        }

        .sidebar .brand span {
            color: var(--orange);
        }

        .sidebar a {
            display: block;
            color: #aaa;
            text-decoration: none;
            padding: 12px 15px;
            border-radius: 5px;
            transition: 0.3s;
            font-size: 16px;
            margin-bottom: 5px;
        }

        .sidebar a:hover {
            background: #1a1a1a;
            color: #fff;
        }

        .main-panel {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }

        .top-nav {
            background: var(--panel-bg);
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #333;
        }

        .top-nav i {
            font-size: 20px;
            cursor: pointer;
            color: #aaa;
        }

        .content-body {
            padding: 40px;
            flex-grow: 1;
        }

        .footer {
            text-align: center;
            padding: 20px;
            color: #666;
            font-size: 14px;
            border-top: 1px solid #333;
        }

        .btn-home {
            background: #3498db;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
        }

        .btn-home:hover {
            background: #2980b9;
            color: white;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <nav class="sidebar">
            <a href="#" class="brand">Online<span>BookStore</span></a>
            <a href="{{ route('dashboard') }}"><i class="fas fa-th-large me-2"></i> Dashboard</a>
            <a href="#"><i class="fas fa-box me-2"></i> Your Orders</a>
            <a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
        </nav>
        <div class="main-panel">
            <header class="top-nav">
                <i class="fas fa-bars"></i>
                <a href="{{ route('home') }}" class="btn-home">Go to Homepage</a>
            </header>
            <main class="content-body">
                <h2 class="mb-5 text-center" style="color: #aaa; font-weight: 300; font-size: 35px;">User Dashboard</h2>
                @yield('user_content')
            </main>
            <footer class="footer">
                &copy; <a href="#" style="color: #3498db; text-decoration: none;">Online BookStore</a>, All Right Reserved.
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>