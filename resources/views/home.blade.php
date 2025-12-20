@extends('layouts.app')

@section('content')
<div class="container-fluid p-0 mb-4">
    <div class="owl-carousel header-carousel position-relative">
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid w-100" src="{{ asset('images/carousel-1.jpg') }}" style="height: 720px; object-fit: cover;">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-sm-10 col-lg-8">
                            <h1 class="display-3 text-white animated slideInDown text-capitalize">Adventures in Wonderland</h1>
                            <p class="text-white mb-4 pb-2">Take a whimsical journey to Wonderland with this enchanting children's book. Filled with colorful characters and imaginative landscapes, it's a tale that sparks the imagination and instills the joy of storytelling in young minds.</p>
                            <a href="{{ route('shop') }}" class="btn text-white py-md-3 px-md-5 me-3 animated slideInLeft" style="background: #8e44ad;">Discover More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="owl-carousel-item position-relative">
            <img class="img-fluid w-100" src="{{ asset('images/carousel-2.jpg') }}" style="height: 720px; object-fit: cover;">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-sm-10 col-lg-8">
                            <h1 class="display-3 text-white animated slideInDown text-capitalize">Love in Bloom</h1>
                            <p class="text-white mb-4 pb-2">Fall in love with this heartwarming romance that blooms against all odds. Join the protagonists on a rollercoaster of emotions as they navigate through life's challenges, proving that love can conquer even the toughest obstacles.</p>
                            <a href="{{ route('shop') }}" class="btn text-white py-md-3 px-md-5 me-3 animated slideInLeft" style="background: #8e44ad;">Discover More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="owl-carousel-item position-relative">
            <img class="img-fluid w-100" src="{{ asset('images/carousel-3.jpg') }}" style="height: 720px; object-fit: cover;">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-sm-10 col-lg-8">
                            <h1 class="display-3 text-white animated slideInDown text-capitalize">Mysteries of Midnight</h1>
                            <p class="text-white mb-4 pb-2">Uncover dark secrets and hidden agendas in this gripping mystery thriller. As the clock strikes midnight, the plot thickens, and the characters find themselves entangled in a web of intrigue that keeps readers on the edge of their seats.</p>
                            <a href="{{ route('shop') }}" class="btn text-white py-md-3 px-md-5 me-3 animated slideInLeft" style="background: #8e44ad;">Discover More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="owl-carousel-item position-relative">
            <img class="img-fluid w-100" src="{{ asset('images/carousel-4.jpg') }}" style="height: 720px; object-fit: cover;">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-sm-10 col-lg-8">
                            <h1 class="display-3 text-white animated slideInDown text-capitalize">Whispers of Time</h1>
                            <p class="text-white mb-4 pb-2">Stay up-to-date with the latest literary treasures! Discover fresh voices and exciting stories in our New Releases section. Be among the first to experience these literary delights.</p>
                            <a href="{{ route('shop') }}" class="btn text-white py-md-3 px-md-5 me-3 animated slideInLeft" style="background: #8e44ad;">Discover More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="py-5 bg-light">
    <div class="container text-center">
        <div class="mb-5">
            <p class="text-purple fw-bold mb-0">———— CATEGORIES ————</p>
            <h1 class="display-5 fw-bold" style="color: #8e44ad;">Popular Categories</h1>
        </div>
        <div class="owl-carousel category-slider">
            @foreach($categories as $category)
            <div class="item p-3">
                <a href="{{ route('category.show', $category->id) }}" class="cat-card shadow-sm">
                    <div class="cat-icon-box">
                        {!! $category->cat_icon !!}
                    </div>
                    <h4 class="cat-title">{{ $category->cat_name }}</h4>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<div class="container py-5">
    <div class="text-center mb-5">
        <h1 style="color: #8e44ad;">Best Selling Books</h1>
    </div>
    <div class="owl-carousel product-carousel">
        @foreach($products as $product)
        <div class="p-2">
            <div class="card shadow-sm border-0 text-center h-100">
                <img src="{{ asset('uploaded_img/'.$product->image) }}" class="card-img-top" style="height: 350px; object-fit: cover;">
                <div class="card-body">
                    <h6 class="fw-bold mb-1">{{ $product->name }}</h6>
                    <p class="text-muted small mb-2">{{ $product->author }}</p>
                    <h6 class="text-purple fw-bold mb-3">BDT {{ $product->price }}/-</h6>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="{{ $product->name }}">
                        <input type="hidden" name="price" value="{{ $product->price }}">
                        <input type="hidden" name="image" value="{{ $product->image }}">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="btn btn-primary w-100">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="container-fluid banner-section text-center text-white mb-5">
    <div class="py-5">
        <h5 class="fw-bold text-uppercase" style="letter-spacing: 2px;">Book Day</h5>
        <h1 class="display-3 fw-bold text-uppercase mb-3" style="color: #8e44ad;">Super Sales</h1>
        <h2 class="fw-bold mb-3">Limited offer online shop</h2>
        <p class="fs-5 mb-4">Your next adventure is just a book away</p>
        <a href="{{ route('shop') }}" class="btn btn-shop-now px-5 py-2">Shop Now</a>
    </div>
</div>

<div class="container py-5">
    <div class="row align-items-center bg-white rounded shadow-sm p-4">
        <div class="col-md-6">
            <h4 class="text-muted">NEWSLETTER</h4>
            <h1 class="fw-bold" style="color: #8e44ad;">Join the Community</h1>
            <form action="{{ route('subscribe') }}" method="POST" class="mt-4">
                @csrf
                <div class="input-group shadow-sm">
                    <input type="email" name="email" class="form-control p-3 border" placeholder="Your Email Address" required>
                    <button class="btn btn-subscribe px-4" type="submit" style="background: #8e44ad; color: #fff; border: none;">Subscribe</button>
                </div>
            </form>
        </div>
        <div class="col-md-6 text-center mt-4 mt-md-0">
            <img src="{{ asset('images/covor.png') }}" alt="" class="img-fluid" style="max-height: 250px;">
        </div>
    </div>
</div>

<footer class="footer mt-5 pt-5" style="background-color: #1a1e36; color: white;">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-4 col-md-6">
                <h4 class="text-white mb-4">Quick Link</h4>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white-50 mb-2 text-decoration-none" href="{{ route('home') }}"><i class="fas fa-angle-right me-2"></i>Home</a>
                    <a class="text-white-50 mb-2 text-decoration-none" href="{{ route('about') }}"><i class="fas fa-angle-right me-2"></i>About</a>
                    <a class="text-white-50 mb-2 text-decoration-none" href="{{ route('shop') }}"><i class="fas fa-angle-right me-2"></i>Shop</a>
                    <a class="text-white-50 text-decoration-none" href="{{ route('contact') }}"><i class="fas fa-angle-right me-2"></i>Contact Us</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <h4 class="text-white mb-4">Extra Link</h4>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white-50 mb-2 text-decoration-none" href="{{ route('login') }}"><i class="fas fa-angle-right me-2"></i>Login</a>
                    <a class="text-white-50 mb-2 text-decoration-none" href="{{ route('signup') }}"><i class="fas fa-angle-right me-2"></i>Register</a>
                    <a class="text-white-50 mb-2 text-decoration-none" href="{{ route('cart.index') }}"><i class="fas fa-angle-right me-2"></i>Cart</a>
                    <a class="text-white-50 text-decoration-none" href="#"><i class="fas fa-angle-right me-2"></i>Orders</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <h4 class="text-white mb-4">Contact</h4>
                <p class="mb-2 text-white-50"><i class="fa fa-map-marker-alt me-3"></i>76 Central Road, Khulna, Bangladesh</p>
                <p class="mb-2 text-white-50"><i class="fa fa-phone-alt me-3"></i>01902384960</p>
                <p class="mb-2 text-white-50"><i class="fa fa-envelope me-3"></i>bookpoint@gmail.com</p>
                <div class="d-flex pt-2">
                    <a class="btn-social" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn-social mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn-social mx-1" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright border-top border-secondary py-4">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p class="mb-0 text-white-50">© <a class="text-white border-bottom text-decoration-none" href="#">Book Point</a>, All Right Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    .text-purple {
        color: #8e44ad;
    }

    .banner-section {
        background: url('{{ asset("images/banner-1.jpg") }}');
        background-position: top center;
        background-size: cover;
        background-repeat: no-repeat;
        min-height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btn-shop-now {
        background-color: #8e44ad;
        color: white;
        border: none;
        font-weight: bold;
        transition: 0.3s;
    }

    .btn-shop-now:hover {
        background-color: #732d91;
        color: white;
    }

    .cat-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background: #fff;
        padding: 40px 20px;
        border-radius: 12px;
        text-decoration: none;
        transition: all 0.3s ease;
        height: 250px;
        border: 1px solid #f1f1f1;
    }

    .cat-card:hover {
        background: #8e44ad;
        transform: translateY(-8px);
        box-shadow: 0 10px 20px rgba(142, 68, 173, 0.2) !important;
    }

    .cat-icon-box {
        font-size: 50px;
        color: #8e44ad;
        margin-bottom: 15px;
        transition: 0.3s;
    }

    .cat-title {
        color: #333;
        font-weight: bold;
        transition: 0.3s;
    }

    .cat-card:hover .cat-icon-box,
    .cat-card:hover .cat-title {
        color: #fff;
    }

    .btn-primary {
        background: #8e44ad !important;
        border: none !important;
    }

    .product-carousel .btn-primary {
        width: auto !important;
        padding: 5px 15px !important;
        font-size: 14px !important;
        border-radius: 5px !important;
        margin: 0 auto;
        display: block;
    }

    .footer {
        background: #1a1e36 !important;
    }

    .text-white-50 {
        color: rgba(255, 255, 255, 0.7) !important;
    }

    .text-white-50:hover {
        color: #fff !important;
        padding-left: 10px;
        transition: 0.3s;
    }

    .btn-social {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        background: #8e44ad;
        border-radius: 50%;
        text-decoration: none;
        transition: 0.3s;
    }

    .btn-social:hover {
        background: white;
        color: #8e44ad;
    }

    .copyright {
        margin-top: 2rem;
    }
</style>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $(".header-carousel").owlCarousel({
            autoplay: true,
            smartSpeed: 1000,
            items: 1,
            loop: true,
            dots: true,
            nav: false
        });
        $(".category-slider").owlCarousel({
            loop: true,
            margin: 20,
            autoplay: true,
            dots: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
        $(".product-carousel").owlCarousel({
            loop: true,
            margin: 20,
            autoplay: true,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        });
    });
</script>
@endsection