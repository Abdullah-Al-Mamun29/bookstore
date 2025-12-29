<style>
    .footer {
        background-color: #1e1e2f;
        color: #ffffff;
        padding: 60px 0 20px;
        font-family: 'Poppins', sans-serif;
    }

    .footer h3 {
        font-size: 22px;
        font-weight: 600;
        margin-bottom: 25px;
        color: #ffffff;
    }

    .footer-links {
        list-style: none;
        padding: 0;
    }

    .footer-links li {
        margin-bottom: 12px;
    }

    .footer-links li a {
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
        transition: 0.3s;
        display: flex;
        align-items: center;
    }

    .footer-links li a i {
        margin-right: 10px;
        font-size: 14px;
        color: #ffffff;
    }

    .footer-links li a:hover {
        color: #8e44ad;
        padding-left: 5px;
    }

    .contact-info li {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
        color: rgba(255, 255, 255, 0.8);
    }

    .contact-info i {
        margin-right: 15px;
        font-size: 18px;
    }

    .social-icons {
        margin-top: 20px;
        display: flex;
        gap: 15px;
    }

    .social-icons a {
        width: 35px;
        height: 35px;
        background: #8e44ad;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        text-decoration: none;
        transition: 0.3s;
    }

    .social-icons a:hover {
        background: #ffffff;
        color: #8e44ad;
        transform: translateY(-3px);
    }

    .footer-bottom {
        margin-top: 50px;
        padding-top: 20px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        text-align: center;
        font-size: 14px;
        color: rgba(255, 255, 255, 0.6);
    }

    .footer-bottom a {
        color: #ffffff;
        text-decoration: none;
        font-weight: 600;
    }
</style>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h3>Quick Link</h3>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}"><i class="fas fa-chevron-right"></i> Home</a></li>
                    <li><a href="{{ route('about') }}"><i class="fas fa-chevron-right"></i> About</a></li>
                    <li><a href="{{ route('shop') }}"><i class="fas fa-chevron-right"></i> Shop</a></li>
                    <li><a href="{{ route('contact') }}"><i class="fas fa-chevron-right"></i> Contact Us</a></li>
                </ul>
            </div>

            <div class="col-md-3">
                <h3>Extra Link</h3>
                <ul class="footer-links">
                    <li><a href="{{ route('login') }}"><i class="fas fa-chevron-right"></i> Login</a></li>
                    <li><a href="{{ route('register') }}"><i class="fas fa-chevron-right"></i> Register</a></li>
                    <li><a href="{{ route('cart.index') }}"><i class="fas fa-chevron-right"></i> Cart</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Orders</a></li>
                </ul>
            </div>

            <div class="col-md-6">
                <h3>Contact</h3>
                <ul class="contact-info list-unstyled">
                    <li><i class="fas fa-map-marker-alt"></i> 76 Central Road, Khulna, Bangladesh</li>
                    <li><i class="fas fa-phone"></i> 01902384960</li>
                    <li><i class="fas fa-envelope"></i> bookpoint@gmail.com</li>
                </ul>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; <a href="#">Book Point</a>, All Right Reserved.</p>
        </div>
    </div>
</footer>