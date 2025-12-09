<x-layout>
    <section class="order-details-page py-5">
        <div class="container">
            <!-- Order Header -->
            <div class="order-header mb-4">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1 class="order-title mb-2">
                            <i class="fas fa-receipt me-2"></i>
                            Order {{ $order->order_number }}
                        </h1>
                        <p class="order-date text-secondary mb-0">
                            <i class="far fa-calendar-alt me-1"></i>
                            Placed on {{ $order->created_at->format('d M Y, h:i A') }}
                        </p>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <span class="order-status-badge status-{{ strtolower($order->status) }}">
                            <i class="fas fa-circle me-1"></i>
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Order Details Card -->
                <div class="col-lg-8 mb-4">
                    <div class="order-details-card">
                        <div class="card-header">
                            <h4 class="mb-0">
                                <i class="fas fa-box me-2"></i>
                                Order Items
                            </h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="order-items-list">
                                @foreach ($order->items as $item)
                                    <div class="order-item">
                                        <div class="item-image">
                                            <img src="{{ asset('uploads/' . $item->product->image) }}"
                                                alt="{{ $item->product->name }}" class="product-img">
                                        </div>
                                        <div class="item-details">
                                            <h5 class="product-name">{{ $item->product->name }}</h5>
                                            <div class="item-meta">
                                                <span class="price">₹{{ $item->price }}</span>
                                                <span class="quantity">Qty: {{ $item->quantity }}</span>
                                            </div>
                                        </div>
                                        <div class="item-total">
                                            <span class="subtotal">₹{{ $item->subtotal }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Summary Sidebar -->
                <div class="col-lg-4">
                    <!-- Order Summary -->
                    <div class="order-summary-card mb-4">
                        <div class="card-header">
                            <h4 class="mb-0">
                                <i class="fas fa-calculator me-2"></i>
                                Order Summary
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="summary-row">
                                <span>Subtotal</span>
                                <span>₹{{ $order->total_amount }}</span>
                            </div>
                            <div class="summary-row">
                                <span>Shipping</span>
                                <span class="text-success">Free</span>
                            </div>
                            <div class="summary-row total-row">
                                <span><strong>Total</strong></span>
                                <span><strong>₹{{ $order->total_amount }}</strong></span>
                            </div>
                            <div class="summary-row">
                                <span>Payment Status</span>
                                <span class="text-success">{{ $order->payment_status }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Delivery Information -->
                    <div class="delivery-info-card">
                        <div class="card-header">
                            <h4 class="mb-0">
                                <i class="fas fa-truck me-2"></i>
                                Delivery Information
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="delivery-detail">
                                <i class="fas fa-user"></i>
                                <div>
                                    <strong>{{ $order->name }}</strong>
                                </div>
                            </div>
                            <div class="delivery-detail">
                                <i class="fas fa-phone"></i>
                                <div>{{ $order->phone }}</div>
                            </div>
                            <div class="delivery-detail">
                                <i class="fas fa-map-marker-alt"></i>
                                <div>
                                    {{ $order->address }}<br>
                                    {{ $order->city }}, {{ $order->state }} - {{ $order->pincode }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Tracking -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="order-tracking-card">
                        <div class="card-header">
                            <h4 class="mb-0">
                                <i class="fas fa-route me-2"></i>
                                Order Tracking
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="tracking-timeline">
                                <div
                                    class="tracking-step {{ in_array($order->status, ['pending', 'processing', 'shipped', 'delivered']) ? 'completed' : '' }}">
                                    <div class="step-icon">
                                        <i class="fas fa-shopping-cart"></i>
                                    </div>
                                    <div class="step-content">
                                        <h6>Order Placed</h6>
                                        <p>{{ $order->created_at->format('d M Y, h:i A') }}</p>
                                    </div>
                                </div>
                                <div
                                    class="tracking-step {{ in_array($order->status, ['processing', 'shipped', 'delivered']) ? 'completed' : '' }}">
                                    <div class="step-icon">
                                        <i class="fas fa-cogs"></i>
                                    </div>
                                    <div class="step-content">
                                        <h6>Processing</h6>
                                        <p>Your order is being prepared</p>
                                    </div>
                                </div>
                                <div
                                    class="tracking-step {{ in_array($order->status, ['shipped', 'delivered']) ? 'completed' : '' }}">
                                    <div class="step-icon">
                                        <i class="fas fa-truck"></i>
                                    </div>
                                    <div class="step-content">
                                        <h6>Shipped</h6>
                                        <p>Your order is on the way</p>
                                    </div>
                                </div>
                                <div class="tracking-step {{ $order->status === 'delivered' ? 'completed' : '' }}">
                                    <div class="step-icon">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <div class="step-content">
                                        <h6>Delivered</h6>
                                        <p>Order delivered successfully</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
