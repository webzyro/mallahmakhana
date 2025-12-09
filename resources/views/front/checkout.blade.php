<x-layout>
    <section class="modern-checkout-page py-5">
        <div class="container-fs">
            <!-- Header -->
            <div class="checkout-header mb-5">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1 class="checkout-title">Secure Checkout</h1>
                        <p class="checkout-subtitle">Complete your order in just a few steps</p>
                    </div>
                    <div class="col-md-4 text-end">
                        <div class="checkout-progress">
                            <div class="progress-step active">
                                <i class="fas fa-shopping-cart"></i>
                                <span>Cart</span>
                            </div>
                            <div class="progress-step active">
                                <i class="fas fa-shipping-fast"></i>
                                <span>Shipping</span>
                            </div>
                            <div class="progress-step">
                                <i class="fas fa-credit-card"></i>
                                <span>Payment</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <!-- Left Column: Checkout Form -->
                <div class="col-lg-8">
                    <form action="{{ route('checkout.place') }}" method="POST" id="checkout-form"
                        class="modern-checkout-form">
                        @csrf

                        <!-- Shipping Information -->
                        <div class="checkout-section">
                            <div class="section-header">
                                <h3><i class="fas fa-shipping-fast me-2"></i>Shipping Information</h3>
                                <p>Where should we send your order?</p>
                            </div>

                            <div class="form-grid">
                                <div class="form-group">
                                    <x-input-field label="Full Name" icon="fa-regular fa-user" id="name"
                                        type="text" placeholder="Enter your full name" />
                                </div>

                                <div class="form-group">
                                    <x-input-field label="Phone Number" icon="fa-solid fa-phone" id="phone"
                                        type="tel" placeholder="Enter your phone number" />
                                </div>

                                <div class="form-group full-width">
                                    <x-input-field label="Street Address" icon="fa-solid fa-location-dot" id="address"
                                        type="text" placeholder="Enter your complete address" />
                                </div>

                                <div class="form-group">
                                    <x-input-field label="City" icon="fa-solid fa-house-chimney" id="city"
                                        type="text" placeholder="Enter your city" />
                                </div>

                                <div class="form-group">
                                    <x-input-field label="State" icon="fa-solid fa-location-arrow" id="state"
                                        type="text" placeholder="Enter your state" />
                                </div>

                                <div class="form-group">
                                    <x-input-field label="Pincode" icon="fa-solid fa-map-pin" id="pincode"
                                        type="text" placeholder="Enter pincode" />
                                </div>
                            </div>
                        </div>

                        <!-- Payment Method -->
                        <div class="checkout-section">
                            <div class="section-header">
                                <h3><i class="fas fa-credit-card me-2"></i>Payment Method</h3>
                                <p>Choose your preferred payment option</p>
                            </div>

                            <div class="payment-methods">
                                <!-- Cash on Delivery -->
                                <div class="payment-option">
                                    <input type="radio" id="cod" name="payment_method" value="cod" checked>
                                    <label for="cod" class="payment-label">
                                        <div class="payment-icon cod-icon">
                                            <i class="fas fa-money-bill-wave"></i>
                                        </div>
                                        <div class="payment-details">
                                            <h4>Cash on Delivery</h4>
                                            <p>Pay when your order arrives at your doorstep</p>
                                            <div class="payment-features">
                                                <span class="feature-tag">
                                                    <i class="fas fa-check"></i> No advance payment
                                                </span>
                                                <span class="feature-tag">
                                                    <i class="fas fa-check"></i> Secure & convenient
                                                </span>
                                            </div>
                                        </div>
                                        <div class="payment-badge">
                                            <span class="badge-text">Popular</span>
                                        </div>
                                    </label>
                                </div>

                                <!-- Online Payment -->
                                <div class="payment-option">
                                    <input type="radio" id="online" name="payment_method" value="online">
                                    <label for="online" class="payment-label">
                                        <div class="payment-icon online-icon">
                                            <i class="fas fa-credit-card"></i>
                                        </div>
                                        <div class="payment-details">
                                            <h4>Online Payment</h4>
                                            <p>Pay securely using UPI, Cards, Net Banking & Wallets</p>
                                            <div class="payment-features">
                                                <span class="feature-tag">
                                                    <i class="fas fa-shield-alt"></i> 100% Secure
                                                </span>
                                                <span class="feature-tag">
                                                    <i class="fas fa-bolt"></i> Instant confirmation
                                                </span>
                                            </div>
                                            <div class="payment-logos">
                                                <img src="https://cdn.iconscout.com/icon/free/png-256/visa-226-675225.png"
                                                    alt="Visa" class="payment-logo">
                                                <img src="https://cdn.iconscout.com/icon/free/png-256/mastercard-226-675230.png"
                                                    alt="Mastercard" class="payment-logo">
                                                <img src="https://cdn.iconscout.com/icon/free/png-256/upi-2085056-1747946.png"
                                                    alt="UPI" class="payment-logo">
                                                <img src="https://cdn.iconscout.com/icon/free/png-256/paytm-226-675218.png"
                                                    alt="Paytm" class="payment-logo">
                                            </div>
                                        </div>
                                        <div class="payment-badge online-badge">
                                            <span class="badge-text">Recommended</span>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="checkout-submit">
                            <button type="submit" class="btn-place-order">
                                <i class="fas fa-lock me-2"></i>
                                <span class="btn-text">Place Order Securely</span>
                                <i class="fas fa-arrow-right ms-2"></i>
                            </button>
                            <p class="security-note">
                                <i class="fas fa-shield-alt me-1"></i>
                                Your information is encrypted and secure
                            </p>
                        </div>
                    </form>
                </div>

                <!-- Right Column: Order Summary -->
                <div class="col-lg-4">
                    <div class="order-summary-card">
                        <div class="card-header">
                            <h4><i class="fas fa-receipt me-2"></i>Order Summary</h4>
                        </div>

                        <div class="card-body">
                            <!-- Order Items -->
                            <div class="order-items">
                                @foreach ($cartItems as $item)
                                    <div class="order-item">
                                        <div class="item-image">
                                            <img src="{{ asset('uploads/' . $item->product->image) }}"
                                                alt="{{ $item->product->name }}" class="product-img">
                                        </div>
                                        <div class="item-details">
                                            <h5 class="product-name">{{ $item->product->name }}</h5>
                                            <div class="item-meta">
                                                <span class="price">₹{{ number_format($item->price, 2) }}</span>
                                                <span class="quantity">Qty: {{ $item->quantity }}</span>
                                            </div>
                                        </div>
                                        <div class="item-total">
                                            <span
                                                class="subtotal">₹{{ number_format($item->price * $item->quantity, 2) }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Order Totals -->
                            <div class="order-totals">
                                @php
                                    $subtotal = $cartItems->sum(function ($item) {
                                        return $item->price * $item->quantity;
                                    });
                                    $shipping = 0; // Free shipping
                                    $tax = $subtotal * 0.18; // 18% GST
                                    $total = $subtotal + $shipping + $tax;
                                @endphp

                                <div class="summary-row">
                                    <span>Subtotal</span>
                                    <span>₹{{ number_format($subtotal, 2) }}</span>
                                </div>
                                <div class="summary-row">
                                    <span>Shipping</span>
                                    <span class="free-shipping">Free</span>
                                </div>
                                <div class="summary-row">
                                    <span>GST (18%)</span>
                                    <span>₹{{ number_format($tax, 2) }}</span>
                                </div>
                                <div class="summary-divider"></div>
                                <div class="summary-row total-row">
                                    <span class="total-label">Total Amount</span>
                                    <span class="total-amount">₹{{ number_format($total, 2) }}</span>
                                </div>
                            </div>

                            <!-- Trust Badges -->
                            <div class="trust-section">
                                <div class="trust-item">
                                    <i class="fas fa-shield-alt"></i>
                                    <span>SSL Encrypted Checkout</span>
                                </div>
                                <div class="trust-item">
                                    <i class="fas fa-undo"></i>
                                    <span>Easy Returns & Exchanges</span>
                                </div>
                                <div class="trust-item">
                                    <i class="fas fa-headset"></i>
                                    <span>24/7 Customer Support</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delivery Info -->
                    <div class="delivery-info-card mt-4">
                        <div class="card-header">
                            <h4><i class="fas fa-truck me-2"></i>Delivery Information</h4>
                        </div>
                        <div class="card-body">
                            <div class="delivery-option">
                                <div class="delivery-icon">
                                    <i class="fas fa-shipping-fast"></i>
                                </div>
                                <div class="delivery-details">
                                    <h5>Standard Delivery</h5>
                                    <p>Free delivery in 3-5 business days</p>
                                    <span class="delivery-date">
                                        <i class="fas fa-calendar-alt me-1"></i>
                                        Expected: {{ date('M d, Y', strtotime('+5 days')) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Custom Styles -->
    <style>
        .modern-checkout-page {
            background: linear-gradient(135deg, var(--Bg-8) 0%, var(--White) 100%);
            min-height: 100vh;
        }

        .checkout-header {
            background: linear-gradient(135deg, var(--Primary) 0%, var(--Bg-5) 100%);
            padding: 2rem;
            border-radius: 15px;
            color: white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .checkout-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .checkout-subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
            margin: 0;
        }

        .checkout-progress {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
        }

        .progress-step {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.8rem;
            transition: all 0.3s ease;
        }

        .progress-step.active {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            transform: scale(1.05);
        }

        .progress-step i {
            font-size: 1.2rem;
        }

        .modern-checkout-form {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            border: 1px solid var(--Border-4);
        }

        .checkout-section {
            margin-bottom: 2.5rem;
            padding-bottom: 2rem;
            border-bottom: 1px solid var(--Border-4);
        }

        .checkout-section:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }

        .section-header {
            margin-bottom: 1.5rem;
        }

        .section-header h3 {
            font-size: 1.4rem;
            font-weight: 600;
            color: var(--Primary);
            margin-bottom: 0.5rem;
        }

        .section-header p {
            color: var(--Text);
            margin: 0;
            font-size: 0.95rem;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1rem;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        /* Payment Methods */
        .payment-methods {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .payment-option {
            position: relative;
        }

        .payment-option input[type="radio"] {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .payment-label {
            display: flex;
            align-items: center;
            padding: 1.5rem;
            border: 2px solid var(--Border-4);
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: var(--Bg-3);
            position: relative;
            overflow: hidden;
        }

        .payment-label:hover {
            border-color: var(--Primary);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .payment-option input[type="radio"]:checked+.payment-label {
            border-color: var(--Primary);
            background: white;
            box-shadow: 0 8px 25px rgba(13, 64, 28, 0.15);
        }

        .payment-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            font-size: 1.5rem;
            color: white;
        }

        .cod-icon {
            background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
        }

        .online-icon {
            background: linear-gradient(135deg, var(--Primary) 0%, var(--Text-4) 100%);
        }

        .payment-details {
            flex: 1;
        }

        .payment-details h4 {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--Text-5);
            margin-bottom: 0.5rem;
        }

        .payment-details p {
            color: var(--Text);
            margin-bottom: 0.75rem;
            font-size: 0.9rem;
        }

        .payment-features {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .feature-tag {
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            padding: 0.25rem 0.5rem;
            background: var(--Bg-1);
            color: var(--Primary);
            border-radius: 15px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .payment-logos {
            display: flex;
            gap: 0.5rem;
            margin-top: 0.5rem;
        }

        .payment-logo {
            width: 30px;
            height: 20px;
            object-fit: contain;
            border-radius: 4px;
            border: 1px solid var(--Border-4);
        }

        .payment-badge {
            position: absolute;
            top: 0;
            right: 0;
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 0 12px 0 12px;
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .online-badge {
            background: linear-gradient(135deg, var(--Text-4) 0%, #27ae60 100%);
        }

        /* Submit Button */
        .checkout-submit {
            text-align: center;
            margin-top: 2rem;
        }

        .btn-place-order {
            background: linear-gradient(135deg, var(--Primary) 0%, var(--Text-4) 100%);
            color: white;
            border: none;
            padding: 1rem 2.5rem;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            min-width: 250px;
            justify-content: center;
        }

        .btn-place-order:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(13, 64, 28, 0.3);
        }

        .security-note {
            margin-top: 1rem;
            color: var(--Text);
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        /* Order Summary Card */
        .order-summary-card,
        .delivery-info-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            border: 1px solid var(--Border-4);
            overflow: hidden;
        }

        .card-header {
            background: var(--Bg-3);
            padding: 1.5rem;
            border-bottom: 1px solid var(--Border-4);
        }

        .card-header h4 {
            color: var(--Primary);
            font-weight: 600;
            margin: 0;
            font-size: 1.2rem;
        }

        .card-body {
            padding: 1.5rem;
        }

        /* Order Items */
        .order-items {
            margin-bottom: 1.5rem;
        }

        .order-item {
            display: flex;
            align-items: center;
            padding: 1rem 0;
            border-bottom: 1px solid var(--Border-6);
        }

        .order-item:last-child {
            border-bottom: none;
        }

        .item-image {
            flex-shrink: 0;
            margin-right: 1rem;
        }

        .product-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid var(--Border-4);
        }

        .item-details {
            flex: 1;
        }

        .product-name {
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--Text-5);
            margin-bottom: 0.5rem;
        }

        .item-meta {
            display: flex;
            gap: 1rem;
        }

        .price,
        .quantity {
            font-size: 0.8rem;
            padding: 0.2rem 0.5rem;
            border-radius: 10px;
            font-weight: 500;
        }

        .price {
            background: var(--Bg-1);
            color: var(--Primary);
        }

        .quantity {
            background: var(--Bg-16);
            color: var(--Text);
        }

        .item-total {
            text-align: right;
        }

        .subtotal {
            font-size: 1rem;
            font-weight: 600;
            color: var(--Primary);
        }

        /* Order Totals */
        .order-totals {
            border-top: 1px solid var(--Border-4);
            padding-top: 1rem;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 0;
            font-size: 0.95rem;
        }

        .free-shipping {
            color: var(--Text-4);
            font-weight: 600;
        }

        .summary-divider {
            height: 1px;
            background: var(--Border-4);
            margin: 0.75rem 0;
        }

        .total-row {
            background: var(--Bg-3);
            margin: 0 -1.5rem;
            padding: 1rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
        }

        .total-amount {
            font-size: 1.2rem;
            color: var(--Primary);
        }

        /* Trust Section */
        .trust-section {
            margin-top: 1.5rem;
            padding-top: 1rem;
            border-top: 1px solid var(--Border-4);
        }

        .trust-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.5rem;
            font-size: 0.85rem;
            color: var(--Text);
        }

        .trust-item i {
            color: var(--Text-4);
            width: 16px;
        }

        /* Delivery Info */
        .delivery-option {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .delivery-icon {
            width: 50px;
            height: 50px;
            background: var(--Bg-1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--Primary);
            font-size: 1.2rem;
        }

        .delivery-details h5 {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--Text-5);
            margin-bottom: 0.25rem;
        }

        .delivery-details p {
            color: var(--Text);
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .delivery-date {
            display: inline-flex;
            align-items: center;
            background: var(--Bg-1);
            color: var(--Primary);
            padding: 0.25rem 0.5rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .checkout-header {
                text-align: center;
                padding: 1.5rem;
            }

            .checkout-title {
                font-size: 2rem;
            }

            .checkout-progress {
                justify-content: center;
                margin-top: 1rem;
            }

            .progress-step {
                font-size: 0.7rem;
                padding: 0.5rem;
            }

            .modern-checkout-form {
                padding: 1.5rem;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .payment-label {
                flex-direction: column;
                text-align: center;
                padding: 1rem;
            }

            .payment-icon {
                margin-right: 0;
                margin-bottom: 1rem;
            }

            .payment-features {
                justify-content: center;
            }

            .btn-place-order {
                width: 100%;
                min-width: auto;
            }

            .order-item {
                flex-direction: column;
                text-align: center;
                padding: 1rem;
            }

            .item-image {
                margin-right: 0;
                margin-bottom: 0.5rem;
            }

            .item-meta {
                justify-content: center;
            }
        }
    </style>

    <script>
        // Form validation and enhancement
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('checkout-form');
            const paymentMethods = document.querySelectorAll('input[name="payment_method"]');
            const submitBtn = document.querySelector('.btn-place-order');
            const btnText = submitBtn.querySelector('.btn-text');

            // Update button text based on payment method
            paymentMethods.forEach(method => {
                method.addEventListener('change', function() {
                    if (this.value === 'cod') {
                        btnText.textContent = 'Place Order (COD)';
                    } else {
                        btnText.textContent = 'Proceed to Payment';
                    }
                });
            });

            // Form submission handling
            form.addEventListener('submit', function(e) {
                const selectedPayment = document.querySelector('input[name="payment_method"]:checked');

                if (selectedPayment.value === 'online') {
                    e.preventDefault();
                    // Here you would integrate with your payment gateway
                    alert('Redirecting to payment gateway...');
                    // For demo purposes, we'll submit the form after a delay
                    setTimeout(() => {
                        form.submit();
                    }, 1000);
                }
            });

            // Add loading state to submit button
            form.addEventListener('submit', function() {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Processing...';
            });
        });
    </script>
</x-layout>
