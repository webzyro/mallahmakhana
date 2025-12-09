<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        $products = Product::with('variants')->latest()->take(8)->get();

        $featuredProducts = Product::with('variants')->where('is_featured', 1)->get();

        // dd($featuredProducts);

        return view('front.home', ['products' => $products, 'featuredProducts' => $featuredProducts]);
    }
}
