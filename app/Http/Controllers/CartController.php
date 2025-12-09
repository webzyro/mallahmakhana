<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * CART PAGE
     */
    public function index(Request $request)
    {
        if (Auth::check()) {
            $cart = CartItem::with('product', 'variant')->where('user_id', Auth::id())->get();
            $total = $cart->sum('subtotal');
        } else {
            $cart = $request->session()->get('cart', []);
            $total = collect($cart)->sum('subtotal');
        }

        return view('front.cart', compact('cart', 'total'));
    }

    /**
     * ADD TO CART
     */
    public function add(Request $request, $id)
    {
        $product = Product::with('variants')->findOrFail($id);

        // Always pick default or first variant
        $variant = $product->variants->firstWhere('is_default', true)
                 ?? $product->variants->first();

        if (!$variant) {
            return back()->with('error', 'No variants available for this product.');
        }

        $price = $variant->discounted_price ?? $variant->original_price;

        /**
         * LOGGED IN USER CART
         */
        if (Auth::check()) {
            $userId = Auth::id();

            $existing = CartItem::where('user_id', $userId)
                ->where('product_id', $product->id)
                ->where('variant_id', $variant->id)
                ->first();

            if ($existing) {
                $existing->quantity += 1;
                $existing->subtotal = $existing->quantity * $existing->price;
                $existing->save();
            } else {
                CartItem::create([
                    'user_id'    => $userId,
                    'product_id' => $product->id,
                    'variant_id' => $variant->id,
                    'flavor'     => $variant->flavor,
                    'weight'     => $variant->weight,
                    'price'      => $price,
                    'quantity'   => 1,
                    'subtotal'   => $price,
                    'image'      => $product->image,
                ]);
            }

            return back()->with('success', "{$product->name} added to cart!");
        }

        /**
         * SESSION CART FOR GUEST
         */
        $cart = $request->session()->get('cart', []);

        $cartKey = $product->id . '-' . $variant->id;

        if (isset($cart[$cartKey])) {
            $cart[$cartKey]['quantity'] += 1;
            $cart[$cartKey]['subtotal'] =
                $cart[$cartKey]['quantity'] * $cart[$cartKey]['price'];
        } else {
            $cart[$cartKey] = [
                'product_id' => $product->id,
                'variant_id' => $variant->id,
                'name'       => $product->name,
                'price'      => $price,
                'flavor'     => $variant->flavor,
                'weight'     => $variant->weight,
                'quantity'   => 1,
                'image'      => $product->image,
                'subtotal'   => $price,
            ];
        }

        $request->session()->put('cart', $cart);

        return back()->with('success', "{$product->name} added to cart!");
    }

    /**
     * REMOVE FROM CART
     */
    public function remove(Request $request, $id)
    {
        if (Auth::check()) {
            $item = CartItem::where('user_id', Auth::id())
                ->where('id', $id)
                ->first();

            if (!$item) {
                return back()->with('error', 'Cart item not found.');
            }

            $item->delete();
            return back()->with('success', 'Item removed from cart.');
        }

        $cart = $request->session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            $request->session()->put('cart', $cart);
        }

        return back()->with('success', 'Item removed from cart.');
    }

    /**
     * QUANTITY: INCREASE
     */
    public function increaseQuantity($id)
    {
        $item = CartItem::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

            dd($item);

        $item->quantity += 1;
        $item->subtotal = $item->quantity * $item->price;
        $item->save();

        return back()->with('success', 'quantity updated');
    }

    /**
     * QUANTITY: DECREASE
     */
    public function decreaseQuantity($id)
    {
        $item = CartItem::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

            dd($item);

        if ($item->quantity > 1) {
            $item->quantity -= 1;
            $item->subtotal = $item->quantity * $item->price;
            $item->save();
        }

        return back()->with('success', 'quantity updated');
    }
}
