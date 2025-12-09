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
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top px-4 py-2" id="navbar-container">
    <div class="container-fluid d-flex align-items-center justify-content-between">
        <a class="navbar-brand" href="/">
            <img src="https://www.webzyro.com/images/logo/webzyro-logo.png" alt="Logo" class="img-fluid w-75" />
        </a>
        <!-- Replace navbar-toggler with offcanvas button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Add offcanvas -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <a class="navbar-brand offcanvas-title" id="offcanvasNavbarLabel" href="/">
                    <img src="https://www.webzyro.com/images/logo/webzyro-logo.png" alt="Logo"
                        class="img-fluid w-75" />
                </a>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
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
                </ul>
                <div class="ms-2 d-flex align-items-center gap-4">
                    @auth
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fa-solid fa-user"></i>
                                <small class="fw-semibold">{{ Auth::user()->name }}</small>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('order.show', Auth::id()) }}">Orders</a></li>
                            </ul>
                        </div>
                    @endauth
                    @guest
                        <a href="{{ route('register') }}" class="text-decoration-none text-dark">
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <i class="fa-regular fa-user"></i>
                                <small class="fw-bold">Sign Up</small>
                            </div>
                        </a>
                    @endguest
                    <a href="{{ route('wishlist') }}" class="text-decoration-none text-dark">
                        <div class="d-flex flex-column align-items-center justify-content-center" id="wishlist">
                            <i class="fa-regular fa-heart"></i>
                            <small class="fw-bold">Wishlist</small>
                            <span>{{ $wishlistCount }}</span>
                        </div>
                    </a>
                    <a href="{{ route('cart.index') }}" class="text-decoration-none text-dark">
                        <div class="d-flex flex-column align-items-center justify-content-center" id="cart">
                            <i class="fa-solid fa-cart-plus"></i>
                            <small class="fw-bold">Bag</small>
                            <span>{{ $cartCount }}</span>
                        </div>
                    </a>
                    @auth
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="primary-btn py-1">logout</button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>
