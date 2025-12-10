<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WishlistItemController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

// Sitemap.xml Route
Route::get('/sitemap.xml', function () {
    $products = Product::all();
    $baseUrl = config('app.url');

    $staticPages = [
        '/',
        '/about-us',
        '/contact-us',
        '/login',
        '/register',
        '/wishlist',
        '/cart',
        '/checkout',
        '/terms',
        '/privacy-policy',
    ];

    return response()->view('sitemap', [
        'products' => $products,
        'staticPages' => $staticPages,
        'baseUrl' => $baseUrl,
    ])->header('Content-Type', 'application/xml');
});


Route::get('/', [HomeController::class, 'index'])->name('Home');

// Contact Page
Route::get('/contact-us', function () {
    return view('front.contact');
})->name('contact');
Route::get('/about-us', function () {
    return view('front.about');
})->name('about');

// Auth Route
Route::get('/register', [AuthController::class, 'showSignup'])->name('register');
Route::post('/register/user', [AuthController::class, 'register'])->name('register.user');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login/user', [AuthController::class, 'login'])->name('login.user');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Cart Route
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/increase/{id}', [CartController::class, 'increaseQuantity'])->name('cart.increase');
Route::post('/cart/decrease/{id}', [CartController::class, 'decreaseQuantity'])->name('cart.decrease');

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');


// Wishlist Route
Route::get('/wishlist', [WishlistItemController::class, 'index'])->middleware('auth')->name('wishlist');
Route::post('/wishlist/add/{id}', [WishlistItemController::class, 'add'])->middleware('auth')->name('wishlist.add');
Route::post('/wishlist/remove/{id}', [WishlistItemController::class, 'remove'])->middleware('auth')->name('wishlist.remove');

// Order Route
Route::get('/checkout', [OrderController::class, 'index'])->middleware('auth')->name('checkout.view');
Route::post('/checkout', [OrderController::class, 'placeOrder'])->middleware('auth')->name('checkout.place');
Route::get('/order/{id}', [OrderController::class, 'show'])->middleware('auth')->name('order.show');

// Blog Route
Route::apiResource('blog', BlogController::class);