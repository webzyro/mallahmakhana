<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sort = $request->sort;

        $products = Product::with(['variants' => function ($q) {
            $q->where('is_default', true);
        }]);

         // Apply Category Filter
        if ($request->category) {
            $products = $products->where('category_id', $request->category);
        }

        // Sorting Logic
        switch ($sort) {
            case 'price_low_high':
                $products = $products
                    ->join('product_variants as variants', 'products.id', '=', 'variants.product_id')
                    ->where('variants.is_default', true)
                    ->orderBy('variants.discounted_price', 'asc')
                    ->select('products.*');
                break;

            case 'price_high_low':
                $products = $products
                    ->join('product_variants as variants', 'products.id', '=', 'variants.product_id')
                    ->where('variants.is_default', true)
                    ->orderBy('variants.discounted_price', 'desc')
                    ->select('products.*');
                break;

            case 'newest':
                $products = $products->orderBy('products.created_at', 'desc');
                break;

            case 'oldest':
                $products = $products->orderBy('products.created_at', 'asc');
                break;

            case 'popular':
                $products = $products->orderBy('products.views', 'desc');
                break;

            default:
                $products = $products->latest(); // default sorting
                break;
        }

        $products = $products->get();

        $categories = Category::get();

        return view('front.products', ['products' => $products, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $product = Product::with('variants')->where('slug', $slug)->firstOrFail();

        if (!$product) {
            return back()->with('error', 'Something went wrong!');
        }

        $variant = $product->variants->firstWhere('is_default', true)
             ?? $product->variants->first();

        return view('front.product-details', ['product' => $product, 'variant' => $variant]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
