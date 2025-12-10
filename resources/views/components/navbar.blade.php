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
        <a class="navbar-brand w-75 overflow-hidden" href="/">
            <img src="https://www.webzyro.com/images/logo/webzyro-logo.png" alt="Logo" class="img-fluid w-75" />
        </a>
        <div class="d-flex align-items-center gap-3">
            @auth
                <div class="dropdown d-lg-none mobile-user-dropdown">
                    <button class="mobile-avatar-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('order.show', Auth::id()) }}">View Orders</a></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @endauth

            <!-- Replace navbar-toggler with offcanvas button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <!-- Add offcanvas -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <a class="navbar-brand offcanvas-title" id="offcanvasNavbarLabel" href="/">
                    <img src="https://www.webzyro.com/images/logo/webzyro-logo.png" alt="Logo" class="img-fluid w-75" />
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
                        <div class="user-dropdown">
                            <button class="user-btn">
                                <span>{{ Auth::user()->name }}</span>
                            </button>

                            <div class="dropdown-content" id="dropdownBox">
                                <a href="{{ route('order.show', Auth::id()) }}">View Orders</a>

                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="logout-btn">Logout</button>
                                </form>
                            </div>
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
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const userBtn = document.querySelector(".user-btn");
        const dropdownBox = document.getElementById("dropdownBox");

        if (userBtn && dropdownBox) {
            userBtn.addEventListener("click", function (e) {
                e.preventDefault();
                e.stopPropagation();
                dropdownBox.classList.toggle("show");
            });

            // Close dropdown when clicking outside
            document.addEventListener("click", function (e) {
                if (!dropdownBox.contains(e.target) && !userBtn.contains(e.target)) {
                    dropdownBox.classList.remove("show");
                }
            });
        }
    });
</script>