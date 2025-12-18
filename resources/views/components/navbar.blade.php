{{-- Header --}}
<header class="d-none d-md-block px-4 py-2" id="header">
    <div class="">
        <div class="d-flex align-items-center justify-content-between">
            <div class="topbar-left">
                <span class="fs-14 font-nunito text-nowrap text-white">
                    Wholesale prices for bulk buyers.
                    <a href="#" class="text-warning fw-900 text-decoration-none" title="Quick Quote">
                        <b>Quick Quote</b>
                    </a>
                </span>
            </div>
            <div class="d-flex align-items-center gap-5">
                <ul class="d-flex aling-items-center gap-4 m-0 p-0">
                    <li class="item">
                        <a href="tel: +91 9661 82 3537" class="icon text-decoration-none" title="+91 9661 82 3537">
                            <i class="fa-solid fa-phone"></i>
                        </a>
                        <a href="tel:+91-9661823537" title="+91-9661823537" class="text-decoration-none">+91-9661823537
                        </a>
                    </li>
                    <li class="item">
                        <a href="mailto:help@naturetohomeagro.com" class="icon text-decoration-none"
                            title="help@naturetohomeagro.com">
                            <i class="fa-solid fa-envelope"></i>
                        </a>
                        <a href="mailto:help@naturetohomeagro.com" title="help@naturetohomeagro.com"
                            class="text-decoration-none">help@makhananature.com</a>
                    </li>
                </ul>
                <ul class="d-flex aling-itmes-center gap-2 m-0 p-0">
                    <li class="item">
                        <a href="https://www.facebook.com/naturetohomeagro" title="Facebook" target="_blank">
                            <i class="fa-brands fa-facebook fa-lg"></i>
                        </a>
                    </li>
                    <li class="item">
                        <a href="https://www.instagram.com/naturetohomeagro" title="Instagram" target="_blank">
                            <i class="fa-brands fa-square-instagram fa-lg"></i>
                        </a>
                    </li>
                    <li class="item">
                        <a href="https://x.com/Naturetohome" title="Twitter" target="_blank">
                            <i class="fa-brands fa-square-x-twitter fa-lg"></i>
                        </a>
                    </li>
                    <li class="item">
                        <a href="https://www.linkedin.com/company/Naturetohome" title="Linkedin" target="_blank">
                            <i class="fa-brands fa-linkedin fa-lg"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>


{{-- Navbar --}}
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top px-md-4 py-2" id="navbar-container">
    <div class="container-fluid d-flex align-items-center justify-content-between" style="flex-wrap: nowrap;">
        <a class="navbar-brand" href="/" style="width: fit-content; overflow: hidden;">
            <img src="https://www.webzyro.com/images/logo/webzyro-logo.png" alt="Logo" class="img-fluid w-75" />
        </a>

        <!-- Desktop Navigation Menu (Center) -->
        <div class="d-none d-lg-block">
            <ul class="navbar-nav flex-row gap-4">
                <li class="nav-item">
                    <a class="nav-link text-dark text-uppercase fw-bold fs-14" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark text-uppercase fw-bold fs-14" href="{{ route('about') }}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark text-uppercase fw-bold fs-14"
                        href="{{ route('products') }}">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark text-uppercase fw-bold fs-14" href="{{ route('contact') }}">Contact
                        Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark text-uppercase fw-bold fs-14"
                        href="{{ route('blog.index') }}">Blogs</a>
                </li>
            </ul>
        </div>

        <div class="d-flex align-items-center gap-2 gap-md-3">
            @auth
                <div class="user-dropdown">
                    <button class="user-btn" title="{{ Auth::user()->name }}">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </button>

                    <div class="dropdown-content" id="dropdownBox">
                        <a href="{{ route('order.show', Auth::id()) }}">
                            <i class="fa-solid fa-box-open"></i>
                            View Orders
                        </a>

                        <form action="{{ route('logout') }}" method="POST" class="m-0">
                            @csrf
                            <button type="submit" class="logout-btn">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @endauth
            @guest
                <a href="{{ route('register') }}" class="text-decoration-none text-dark action-item">
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <i class="fa-regular fa-user"></i>
                        <small class="fw-bold d-none d-md-block">Sign Up</small>
                    </div>
                </a>
            @endguest

            <a href="{{ route('wishlist') }}" class="text-decoration-none text-dark action-item">
                <div class="d-flex flex-column align-items-center justify-content-center" id="wishlist">
                    <i class="fa-regular fa-heart"></i>
                    <small class="fw-bold d-none d-md-block">Wishlist</small>
                    <span>{{ $wishlistCount }}</span>
                </div>
            </a>

            <a href="{{ route('cart.index') }}" class="text-decoration-none text-dark action-item">
                <div class="d-flex flex-column align-items-center justify-content-center" id="cart">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <small class="fw-bold d-none d-md-block">Bag</small>
                    <span>{{ $cartCount }}</span>
                </div>
            </a>

            <!-- Offcanvas Toggle for Mobile -->
            <button class="navbar-toggler d-lg-none border-0 shadow-none" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div> <!-- End Action Buttons Group -->
    </div> <!-- End Container Fluid -->

    <!-- Offcanvas for Mobile View -->
    <div class="offcanvas offcanvas-end d-lg-none" tabindex="-1" id="offcanvasNavbar"
        aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
            <a class="navbar-brand offcanvas-title" id="offcanvasNavbarLabel" href="/">
                <img src="https://www.webzyro.com/images/logo/webzyro-logo.png" alt="Logo" class="img-fluid w-75" />
            </a>
            <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link text-dark text-uppercase fw-bold" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark text-uppercase fw-bold" href="{{ route('about') }}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark text-uppercase fw-bold" href="{{ route('products') }}">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark text-uppercase fw-bold" href="{{ route('contact') }}">Contact
                        Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark text-uppercase fw-bold" href="{{ route('blog.index') }}">Blogs</a>
                </li>
            </ul>
        </div>
    </div>
</nav>