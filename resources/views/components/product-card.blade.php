@php
    $variant = $variant ?? $product->variants->first();
@endphp

<div class="product-card">
    <div class="highlights-tag">
        <span>Hot</span>
    </div>
    <a href="{{ route('product.show', $product->slug) }}" class="text-decoration-none">
        <div class="product-img">
            <img src="{{ asset('uploads/' . $product->image) }}" alt="{{ $product->name }}">
        </div>
    </a>
    <div class="product-body">
        <a href="{{ route('product.show', $product->slug) }}" class="text-decoration-none">
            <h5 class="product-title m-0 p-0">{{ $product->name }}</h5>
        </a>
        <div class="d-flex align-items-center gap-2">
            <div class="d-flex align-items-center">
                <i class="fa-solid fa-star star-icon"></i>
                <i class="fa-solid fa-star star-icon"></i>
                <i class="fa-solid fa-star star-icon"></i>
                <i class="fa-solid fa-star star-icon"></i>
                <i class="fa-solid fa-star-half star-icon"></i>
            </div>
            <span class="fw-semibold">(4.0)</span>
        </div>
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-2">
                <h6 class="current-price p-0 m-0">₹{{ $variant->discounted_price ?? 'N/A' }}</h6>
                <h6 class="old-price p-0 m-0"> ₹{{ $variant->original_price ?? '' }}</h6>
            </div>
            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <button type="submit" class="d-flex align-items-center gap-2 cart-btn">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span>Add</span>
                </button>
            </form>
        </div>
    </div>
</div>
