<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\WishlistItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistItemController extends Controller
{
    public function index() 
    {
        $wishlists = WishlistItem::with(['product', 'variant'])
            ->where('user_id', Auth::id())
            ->get();

        // dd($wishlists);

        return view('front.wishlist', ['wishlists' => $wishlists]);
    }

    // Add to Wishlist
    public function add(Request $request, $id)
    {
        $product = Product::with('variants')->findOrFail($id);

        if(!$product) {
            return back()->with('error', 'No Product found, Please re-try');
        }

        $variant = $product->variants->firstWhere('is_default', true) ?? $product->variants->first();

        if (!$variant) {
            return back()->with('error', 'No variants available for this product');
        }

        $userId = Auth::id();

        $existing = WishlistItem::where('user_id', $userId)
            ->where('product_id', $product->id)
            ->where('variant_id', $variant->id)
            ->first();
        
        if($existing) {
            return back()->with('error', 'This product is already in your wishlist!');
        }else {
            WishlistItem::create([
                'user_id' => $userId,
                'product_id' => $product->id,
                'variant_id' => $variant->id,
                'flavor' => $variant->flavor,
                'weight' => $variant->weight,
            ]);
        }

        return back()->with('success', "{$product->name} added to wishlist!");
    }

    public function remove($id) {
        $wishlist = WishlistItem::where('user_id', Auth::id())
            ->where('product_id', $id)
            ->first();

        if(!$wishlist) {
            return back()->with('error', 'Wishlist item not found!');
        }

        $wishlist->delete();
        
        return back()->with('success', 'Item successfully removed from wishlist!');
    }
}
