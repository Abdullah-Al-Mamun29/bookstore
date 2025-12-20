<aside id="sidebar" class="js-sidebar">
    <div class="h-100">
        <div class="sidebar-logo">
            <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center">
                <p class="m-0 fw-bold text-white" style="font-size: 25px;">
                    Book<span style="color: #fb873f;">Point</span>
                </p>
            </a>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a href="{{ route('dashboard') }}" class="sidebar-link">
                    <i class="fa fa-dashboard pe-2"></i> Dashboard
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('user.orders') }}" class="sidebar-link">
                    <i class="fas fa-tags pe-2"></i> Your Orders
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('logout') }}" class="sidebar-link text-danger">
                    <i class="fa fa-sign-out pe-2"></i> Logout
                </a>
            </li>
        </ul>
    </div>
</aside>