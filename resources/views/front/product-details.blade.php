<x-layout title="Product Details" meta_description="Product Details" meta_keywords="Product Details">
    <section class="py-5" id="product-details">
        <div class="container">
            <div class="row g-5 align-items-center">
                <!-- Product Image Section -->
                <div class="col-lg-5 col-md-6">
                    <div class="product-details-img-wrapper">
                        <div class="product-details-img">
                            <img src="{{ asset('uploads/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid rounded-3 shadow-sm w-100">
                        </div>
                    </div>
                </div>

                <!-- Product Info Section -->
                <div class="col-lg-7 col-md-6">
                    <div class="product-details-content ps-lg-4">
                        <h2 class="product-title display-6 fw-bold mb-3" style="color: var(--Primary);">{{ $product->name }}</h2>

                        <!-- Rating -->
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="rating-stars">
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star-half text-warning"></i>
                            </div>
                            <span class="text-muted fw-medium">(4.5 Reviews)</span>
                            <span class="badge bg-success bg-opacity-10 text-success px-3 py-1 rounded-pill">In Stock</span>
                        </div>

                        <!-- Price -->
                        <div class="product-price d-flex align-items-end gap-3 mb-4">
                            <h3 class="fw-bold mb-0" style="color: var(--Primary);">₹{{ $product->variants->first()->discounted_price ?? $product->variants->first()->original_price }}</h3>
                            @if($product->variants->first()->discounted_price < $product->variants->first()->original_price)
                                <h5 class="text-decoration-line-through text-muted mb-0">₹{{ $product->variants->first()->original_price }}</h5>
                                <span class="badge bg-danger ms-2">{{ round((($product->variants->first()->original_price - $product->variants->first()->discounted_price) / $product->variants->first()->original_price) * 100) }}% OFF</span>
                            @endif
                        </div>

                        <!-- Short Description (Optional - using truncated description if available or static placeholder logic if needed, but keeping it simple as per request) -->
                        <div class="product-short-desc mb-4 text-muted">
                            <p>{!! Str::limit(strip_tags($product->description), 150) !!}</p>
                        </div>

                        <!-- Variant Selector -->
                        <div class="variant-selection mb-4">
                            <label for="variant-select" class="form-label fw-bold text-dark">Select Options</label>
                            <select id="variant-select" class="form-select styled-select py-2" style="border-color: var(--Border-11); color: var(--Text);">
                                <option value="" disabled selected>Choose Flavor - Weight</option>
                                @foreach ($product->variants as $variant)
                                    <option value="{{ $variant->id }}"
                                        data-price="{{ $variant->discounted_price ?? $variant->original_price }}"
                                        data-original-price="{{ $variant->original_price }}"
                                        data-stock="{{ $variant->stock }}">
                                        {{ $variant->flavor }} - {{ $variant->weight }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex align-items-center gap-3 mb-5">
                            <form action="{{ route('cart.add', $product->id) }}" method="POST" class="flex-grow-1">
                                @csrf
                                <button type="submit" class="btn w-100 py-3 fw-bold d-flex align-items-center justify-content-center gap-2" 
                                    style="background-color: var(--Primary); color: var(--White); border-radius: 12px; transition: all 0.3s;">
                                    <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                                </button>
                            </form>
                            
                            <form action="{{ route('wishlist.add', $product->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn p-3 d-flex align-items-center justify-content-center" 
                                    style="background-color: var(--Bg-3); color: var(--Primary); border-radius: 12px; border: 1px solid var(--Primary); width: 54px; height: 54px;">
                                    <i class="fa-regular fa-heart fa-lg"></i>
                                </button>
                            </form>
                        </div>

                        <!-- Service Icons Row (New Feature) -->
                        <div class="service-features border-top pt-4">
                            <div class="row g-3">
                                <div class="col-4 d-flex align-items-center gap-2">
                                    <div class="icon-box d-flex align-items-center justify-content-center rounded-circle" 
                                         style="width: 45px; height: 45px; background-color: var(--Bg-8); color: var(--Primary);">
                                        <i class="fa-solid fa-truck-fast"></i>
                                    </div>
                                    <div class="text">
                                        <h6 class="mb-0 fw-bold" style="font-size: 0.9rem;">Free Delivery</h6>
                                        <small class="text-muted" style="font-size: 0.75rem;">Orders over ₹500</small>
                                    </div>
                                </div>
                                <div class="col-4 d-flex align-items-center gap-2">
                                    <div class="icon-box d-flex align-items-center justify-content-center rounded-circle" 
                                         style="width: 45px; height: 45px; background-color: var(--Bg-8); color: var(--Primary);">
                                        <i class="fa-solid fa-shield-halved"></i>
                                    </div>
                                    <div class="text">
                                        <h6 class="mb-0 fw-bold" style="font-size: 0.9rem;">Secure Payment</h6>
                                        <small class="text-muted" style="font-size: 0.75rem;">100% Protected</small>
                                    </div>
                                </div>
                                <div class="col-4 d-flex align-items-center gap-2">
                                    <div class="icon-box d-flex align-items-center justify-content-center rounded-circle" 
                                         style="width: 45px; height: 45px; background-color: var(--Bg-8); color: var(--Primary);">
                                        <i class="fa-solid fa-award"></i>
                                    </div>
                                    <div class="text">
                                        <h6 class="mb-0 fw-bold" style="font-size: 0.9rem;">Best Quality</h6>
                                        <small class="text-muted" style="font-size: 0.75rem;">Certified Organic</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <span id="stock" class="d-block mt-3 text-danger fw-bold"></span>
                    </div>
                </div>
            </div>

            <!-- Full Description Section -->
            <div class="row mt-5 pt-5 border-top">
                <div class="col-12">
                    <h3 class="mb-4 fw-bold" style="color: var(--Primary);">Product Description</h3>
                    <div class="product-details-desc text-muted" style="line-height: 1.8;">
                        {!! $product->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Custom Script for dynamic price update -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const variantSelect = document.getElementById('variant-select');
            const priceElement = document.querySelector('.product-price h3');
            const oldPriceElement = document.querySelector('.product-price h5');
            const stockElement = document.getElementById('stock');
            const badgeElement = document.querySelector('.product-price .badge');

            if(variantSelect) {
                variantSelect.addEventListener('change', function() {
                    const selectedOption = this.options[this.selectedIndex];
                    const price = selectedOption.getAttribute('data-price');
                    const originalPrice = selectedOption.getAttribute('data-original-price'); // Need to ensure loop output this
                    const stock = selectedOption.getAttribute('data-stock');

                    priceElement.innerText = '₹' + price;
                    
                    if (originalPrice && parseFloat(originalPrice) > parseFloat(price)) {
                        if(oldPriceElement) oldPriceElement.innerText = '₹' + originalPrice;
                        
                        // Recalculate badge if needed or just hide it
                        // For simplicity in this static script, assuming basic update
                        if(badgeElement) {
                             const discount = Math.round(((originalPrice - price) / originalPrice) * 100);
                             badgeElement.innerText = discount + '% OFF';
                        }
                    }

                    if (stock <= 0) {
                        stockElement.innerText = 'Out of Stock';
                        document.querySelector('.cart-btn').disabled = true;
                    } else {
                        stockElement.innerText = '';
                        document.querySelector('.cart-btn').disabled = false;
                    }
                });
            }
        });
    </script>
</x-layout>