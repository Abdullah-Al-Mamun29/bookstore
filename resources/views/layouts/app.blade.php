<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Point | Laravel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <style>
        :root {
            --purple: #8e44ad;
            --dark-bg: #1e1e2f;
        }

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }

        .header-1 {
            background: var(--dark-bg);
            color: #fff;
            padding: 8px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-1 .contact-info {
            font-size: 13px;
        }

        .header-1 .contact-info i {
            color: var(--purple);
            margin-right: 5px;
        }

        .header-1 .social-links a {
            color: #fff;
            margin-left: 15px;
            font-size: 14px;
            text-decoration: none;
            transition: 0.3s;
        }

        .header-1 .social-links a:hover {
            color: var(--purple);
        }

        .header-2 {
            background: #fff;
            padding: 15px 5%;
            display: flex;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo {
            font-size: 26px;
            font-weight: 800;
            color: #333;
            text-decoration: none;
            display: flex;
            align-items: center;
            margin-right: auto;
        }

        .logo i {
            color: var(--purple);
            margin-right: 8px;
        }

        .logo span {
            color: var(--purple);
        }

        .navbar-links {
            margin-right: 20px;
        }

        .navbar-links a {
            margin: 0 15px;
            text-decoration: none;
            color: #444;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 14px;
            transition: 0.3s;
        }

        .navbar-links a:hover {
            color: var(--purple);
        }

        .header-icons {
            display: flex;
            align-items: center;
        }

        .header-icons a {
            color: #333;
            margin-left: 20px;
            font-size: 18px;
            text-decoration: none;
            transition: 0.3s;
            position: relative;
        }

        .header-icons a:hover {
            color: var(--purple);
        }

        .cart-badge {
            font-size: 12px;
            font-weight: bold;
            color: var(--purple);
            margin-left: 3px;
        }

        .user-name {
            font-size: 14px;
            font-weight: 600;
            color: #444;
            text-transform: uppercase;
            margin-left: 20px;
            text-decoration: none;
            transition: 0.3s;
        }

        .user-name:hover {
            color: var(--purple);
        }

        .alert-custom {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
        }
    </style>
</head>

<body>

    @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show alert-custom" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <header>
        <div class="header-1">
            <div class="contact-info">
                <i class="fas fa-envelope"></i> bookpoint@gmail.com
            </div>
            <div class="social-links">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </div>
        <div class="header-2">
            <a href="{{ route('home') }}" class="logo">
                <i class="fas fa-book-reader"></i> Book<span>Point</span>
            </a>
            <nav class="navbar-links d-none d-lg-block">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('about') }}">About</a>
                <a href="{{ route('shop') }}">Shop</a>
                <a href="{{ route('contact') }}">Contact</a>
            </nav>
            <div class="header-icons">
                <a href="{{ route('search') }}" class="fas fa-search"></a>

                @if(Session::has('user_id'))
                <a href="{{ route('cart.index') }}">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart-badge">({{ $cart_count }})</span>
                </a>
                <a href="{{ route('dashboard') }}" class="user-name">
                    <i class="fas fa-user me-1"></i> {{ Session::get('user_name') }}
                </a>
                @else
                <a href="{{ route('login') }}" class="fas fa-user"></a>
                <a href="{{ route('cart.index') }}">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart-badge">(0)</span>
                </a>
                @endif
            </div>
        </div>
    </header>

    @yield('content')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>

</html>