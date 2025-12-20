<aside id="sidebar" class="js-sidebar fixed">
    <div class="h-100">
        <div class="sidebar-logo">
            <a href="{{ route('index') }}" class="navbar-brand d-flex align-items-center px-4">
                <p class="m-0 fw-bold text-white" style="font-size: 25px;">
                    <img src="{{ asset('images/icon.png') }}" alt="" height="50px">Book<span style="color: #fb873f;">Point</span>
                </p>
            </a>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link">
                    <i class="fa fa-dashboard pe-2"></i> Dashboard
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.categories') }}" class="sidebar-link">
                    <i class="fas fa-list pe-2"></i> Categories
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.products') }}" class="sidebar-link">
                    <i class="fas fa-shopping-bag pe-2"></i> Products
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.orders') }}" class="sidebar-link">
                    <i class="fas fa-tags pe-2"></i> Orders
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.users') }}" class="sidebar-link">
                    <i class="fa-solid fa-users pe-2"></i> Users
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.reviews') }}" class="sidebar-link">
                    <i class="fas fa-paper-plane pe-2"></i> Reviews
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.messages') }}" class="sidebar-link">
                    <i class="fas fa-comment-alt pe-2"></i> Messages
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('logout') }}" class="sidebar-link">
                    <i class="fa fa-sign-out pe-2"></i> Logout
                </a>
            </li>
        </ul>
    </div>
</aside>