<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard | Book Point</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            overflow-x: hidden;
            background: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }

        .wrapper {
            display: flex;
            width: 100%;
            align-items: stretch;
        }

        #sidebar {
            min-width: 250px;
            max-width: 250px;
            background: #1e1e2f;
            min-height: 100vh;
            transition: all 0.3s;
        }

        .main {
            width: 100%;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .content {
            flex: 1;
        }

        .sidebar-logo {
            padding: 20px;
            border-bottom: 1px solid #343a40;
        }

        .sidebar-link {
            padding: 15px 25px;
            display: block;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: 0.3s;
        }

        .sidebar-link:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
        }

        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>

<body>

    <div class="wrapper">
        @include('user.sidebar')

        <div class="main">
            @include('user.navbar')

            <main class="content px-3 py-4">
                <div class="container-fluid">
                    <div class="mb-4 text-center">
                        <h2 class="fw-bold text-uppercase">User Dashboard</h2>
                    </div>

                    <div class="row g-4 justify-content-center">
                        <div class="col-md-4">
                            <div class="card p-5 text-center">
                                <h1 class="fw-bold text-primary" style="font-size: 50px;">{{ $total_pendings }}</h1>
                                <p class="text-muted text-uppercase fw-bold mb-0">Total Pendings</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card p-5 text-center">
                                <h1 class="fw-bold text-primary" style="font-size: 50px;">{{ $total_completed }}</h1>
                                <p class="text-muted text-uppercase fw-bold mb-0">Completed Orders</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card p-5 text-center">
                                <h1 class="fw-bold text-primary" style="font-size: 50px;">{{ $number_of_orders }}</h1>
                                <p class="text-muted text-uppercase fw-bold mb-0">Orders Placed</p>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-5">
                        <form action="{{ route('logout') }}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-lg px-5 py-2 rounded-0 text-uppercase fw-bold">Logout</button>
                        </form>
                    </div>
                </div>
            </main>

            @include('user.footer')
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('sidebar-toggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('d-none');
        });
    </script>
</body>

</html>