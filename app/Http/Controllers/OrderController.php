<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = CartItem::with('product')->where('user_id', Auth::id())->get();

        if (empty($cart)) {
            return back()->with('error', 'Your cart is empty!');
        }

        // dd($cart);

        return view('front.checkout', ['cartItems' => $cart]);
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
    public function placeOrder(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'phone' => 'required|string|min:10|max:10',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'pincode' => 'required|string',
            'payment_method' => 'required|in:cod,online',
        ]);

        $cart = CartItem::where('user_id', Auth::id())->get();

        if (empty($cart)) {
            return back()->with('error', 'Your cart is empty!');
        }

        // Calculate total
        $total = collect($cart)->sum('subtotal');

        $paymentStatus = $request->payment_method === 'cod' ? 'pending' : 'unpaid';

        // Create order
        $order = Order::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => Auth::user()->email ?? "",
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'pincode' => $request->pincode,
            'total_amount' => $total,
            'status' => 'pending',
            'payment_method' => $request->payment_method,
            'payment_status' => $paymentStatus,
        ]);

        // Create order_items
        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'variant_id' => $item->variant_id,
                'flavor' => $item->flavor,
                'weight' => $item->weight,
                'price' => $item->price,
                'quantity' => $item->quantity,
                'subtotal' => $item->subtotal,
                'image' => $item->image,
            ]);
        }

        // Clear cart after order created
        CartItem::where('user_id', Auth::id())->delete();

        if ($request->payment_method === 'prepaid') {
            // return redirect()->route('razorpay.pay', $order->id);
        }

        return redirect()->route('Home')->with('success', 'Order Placed Successful!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::with('items.product')->where('id', $id)->where('user_id', Auth::id())->first();

        if (!$order) {
            return redirect()
                ->back()
                ->with('error', 'Order not found or you do not have permission to view it.');
        }

        return view('front.order-details', ['order' => $order]);
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
