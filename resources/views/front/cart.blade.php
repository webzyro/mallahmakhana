<x-layout>
    <section class="modern-cart-page py-5">
        <div class="container">
            <!-- Cart Header -->
            <div class="cart-header mb-4">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1 class="cart-title mb-2">
                            <i class="fas fa-shopping-cart me-2"></i>
                            Shopping Cart
                        </h1>
                        <p class="cart-subtitle mb-0">
                            <i class="fas fa-box me-1"></i>
                            {{ count($cart) }} {{ count($cart) == 1 ? 'Item' : 'Items' }} in your cart
                        </p>
                    </div>
                    <div class="col-md-4 text-md-end">
                        @if (count($cart) > 0)
                            <a href="{{ route('products') }}" class="primary-btn">
                                <i class="fas fa-plus me-1"></i>
                                Continue Shopping
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            @if (count($cart))
                <div class="row">
                    <!-- Cart Items Section -->
                    <div class="col-lg-8 mb-4">
                        <div class="cart-items-card">
                            <div class="card-header">
                                <h4 class="mb-0">
                                    <i class="fas fa-list me-2"></i>
                                    Cart Items
                                </h4>
                            </div>
                            <div class="card-body p-0">
                                <div class="cart-items-list">
                                    @foreach ($cart as $item)
                                        <div class="modern-cart-item">
                                            <div class="item-image-container">
                                                <img src="{{ asset('uploads/' . $item['image']) }}"
                                                    alt="{{ is_array($item) ? $item['name'] : $item->product->name }}"
                                                    class="cart-product-img">
                                            </div>
                                            <div class="item-details-container">
                                                <div class="item-info">
                                                    <h5 class="product-title">
                                                        {{ is_array($item) ? $item['name'] : $item->product->name }}
                                                    </h5>
                                                    <div class="item-meta-info">
                                                        <div class="price-info">
                                                            <span class="price-label">Price:</span>
                                                            <span
                                                                class="price-value">₹{{ is_array($item) ? $item['price'] : $item->price }}</span>
                                                        </div>
                                                        <div class="quantity-info">
                                                            <span class="quantity-label">Quantity:</span>
                                                            <div class="quantity-controls">
                                                                <form action="#" method="POST">
                                                                    @csrf
                                                                    <button type="button"
                                                                        class="quantity-btn decrement-btn">
                                                                        <i class="fas fa-minus"></i>
                                                                    </button>
                                                                </form>
                                                                <span
                                                                    class="quantity-display">{{ is_array($item) ? $item['quantity'] : $item->quantity }}</span>

                                                                <form action="#" method="POST">
                                                                    @csrf
                                                                    <button type="button"
                                                                        class="quantity-btn increment-btn">
                                                                        <i class="fas fa-plus"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item-total-price">
                                                    <span class="total-label">Total</span>
                                                    <span
                                                        class="total-amount">₹{{ (is_array($item) ? $item['price'] : $item->price) * (is_array($item) ? $item['quantity'] : $item->quantity) }}</span>
                                                </div>
                                            </div>
                                            <div class="item-actions">
                                                <form action="{{ route('cart.remove', $item['product_id']) }}"
                                                    method="POST" class="remove-form">
                                                    @csrf
                                                    <button type="submit" class="remove-btn" title="Remove from cart">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary Section -->
                    <div class="col-lg-4">
                        <div class="order-summary-card sticky-top">
                            <div class="card-header">
                                <h4 class="mb-0">
                                    <i class="fas fa-receipt me-2"></i>
                                    Order Summary
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="summary-details">
                                    <div class="summary-row">
                                        <span class="summary-label">Subtotal</span>
                                        <span class="summary-value">₹{{ $total }}</span>
                                    </div>
                                    <div class="summary-row">
                                        <span class="summary-label">Discount</span>
                                        <span class="summary-value discount-value">-₹0</span>
                                    </div>
                                    <div class="summary-row">
                                        <span class="summary-label">Delivery Fee</span>
                                        <span class="summary-value">₹0</span>
                                    </div>
                                    {{-- <div class="summary-divider"></div> --}}
                                    <div class="summary-row total-row">
                                        <span class="summary-label"><strong>Total Amount</strong></span>
                                        <span
                                            class="summary-value total-value"><strong>₹{{ $total }}</strong></span>
                                    </div>
                                </div>

                                <div class="checkout-section">
                                    <a href="{{ route('checkout.view') }}" class="checkout-btn">
                                        <i class="fas fa-credit-card me-2"></i>
                                        Proceed to Checkout
                                    </a>
                                    <div class="security-info">
                                        <i class="fas fa-shield-alt me-1"></i>
                                        <small>Secure checkout with SSL encryption</small>
                                    </div>
                                </div>

                                <!-- Promo Code Section -->
                                <div class="promo-section">
                                    <h6 class="promo-title">
                                        <i class="fas fa-tag me-1"></i>
                                        Have a promo code?
                                    </h6>
                                    <div class="promo-input-group">
                                        <input type="text" class="promo-input" placeholder="Enter promo code">
                                        <button class="promo-apply-btn">Apply</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Trust Badges -->
                            <div class="trust-badges mt-4">
                                <div class="trust-item">
                                    <i class="fas fa-truck"></i>
                                    <span>Free Delivery on orders above ₹500</span>
                                </div>
                                <div class="trust-item">
                                    <i class="fas fa-undo"></i>
                                    <span>Easy 7-day returns</span>
                                </div>
                                <div class="trust-item">
                                    <i class="fas fa-shield-alt"></i>
                                    <span>100% Secure payments</span>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            @else
                <!-- Empty Cart State -->
                <div class="empty-cart-state">
                    <div class="empty-cart-content">
                        <div class="empty-cart-icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <h3 class="empty-cart-title">Your cart is empty</h3>
                        <p class="empty-cart-description">
                            Looks like you haven't added any items to your cart yet.
                            Start shopping to fill it up!
                        </p>
                        <a href="{{ route('products') }}" class="start-shopping-btn">
                            <i class="fas fa-shopping-bag me-2"></i>
                            Start Shopping
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <style>
        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 4px;
        }

        .quantity-btn {
            width: 32px;
            height: 32px;
            border: 1px solid #ddd;
            background: #fff;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
            font-size: 12px;
            color: #666;
        }

        .quantity-btn:hover {
            background: #f8f9fa;
            border-color: #007bff;
            color: #007bff;
        }

        .quantity-btn:active {
            transform: scale(0.95);
        }

        .quantity-display {
            min-width: 40px;
            text-align: center;
            font-weight: 600;
            font-size: 14px;
            color: #333;
            padding: 6px 12px;
            background: #f8f9fa;
            border-radius: 4px;
            border: 1px solid #e9ecef;
        }

        .decrement-btn:hover {
            background: #fff5f5;
            border-color: #dc3545;
            color: #dc3545;
        }

        .increment-btn:hover {
            background: #f0f9ff;
            border-color: #28a745;
            color: #28a745;
        }
    </style>

    <script>
        function updateQuantity(productId, action) {
            // Get current quantity
            const quantityDisplay = event.target.closest('.quantity-controls').querySelector('.quantity-display');
            let currentQuantity = parseInt(quantityDisplay.textContent);

            // Calculate new quantity
            let newQuantity = currentQuantity;
            if (action === 'increment') {
                newQuantity = currentQuantity + 1;
            } else if (action === 'decrement' && currentQuantity > 1) {
                newQuantity = currentQuantity - 1;
            }

            // Only proceed if quantity changed
            if (newQuantity !== currentQuantity) {
                // Update display immediately for better UX
                quantityDisplay.textContent = newQuantity;

                // Send AJAX request to update cart
                fetch(`/cart/update-quantity`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            product_id: productId,
                            quantity: newQuantity
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Update the total price for this item
                            const itemContainer = event.target.closest('.modern-cart-item');
                            const totalAmount = itemContainer.querySelector('.total-amount');
                            const price = parseFloat(data.price);
                            totalAmount.textContent = `₹${(price * newQuantity).toFixed(2)}`;

                            // Update cart totals
                            location.reload(); // Simple reload to update all totals
                        } else {
                            // Revert display if update failed
                            quantityDisplay.textContent = currentQuantity;
                            alert('Failed to update quantity. Please try again.');
                        }
                    })
                    .catch(error => {
                        // Revert display if request failed
                        quantityDisplay.textContent = currentQuantity;
                        console.error('Error:', error);
                        alert('Failed to update quantity. Please try again.');
                    });
            }
        }
    </script>
</x-layout>
