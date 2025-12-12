<x-layout title="Product Details" meta_description="Product Details" meta_keywords="Product Details">
    <section class="py-5" id="product-details">
        <div class="container-fluid">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="product-details-img">
                        <img src="{{ asset('uploads/' . $product->image) }}" alt="{{ $product->name }}">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="product-details-container">
                        <h4>{{ $product->name }}</h4>
                        <div class="d-flex align-items-center gap-2">
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-star star-icon text-warning"></i>
                                <i class="fa-solid fa-star star-icon text-warning"></i>
                                <i class="fa-solid fa-star star-icon text-warning"></i>
                                <i class="fa-solid fa-star star-icon text-warning"></i>
                                <i class="fa-solid fa-star-half star-icon text-warning"></i>
                            </div>
                            <span class="fw-semibold">(4.0)</span>
                        </div>


                        <div class="variant-wrapper">
                            <label for="variant-select" class="variant-label">Choose Variant</label>

                            <select id="variant-select" class="styled-select">
                                <!-- Placeholder -->
                                <option value="" disabled selected>Flavor - Weight(gm)</option>

                                <!-- Variant Options -->
                                @foreach ($product->variants as $variant)
                                    <option value="{{ $variant->id }}"
                                        data-price="{{ $variant->discounted_price ?? $variant->original_price }}"
                                        data-stock="{{ $variant->stock }}">
                                        {{ $variant->flavor }} - {{ $variant->weight }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex align-items-center gap-2">
                            <h6 class="original-price p-0 m-0">₹{{ $variant->discounted_price }}</h6>
                            <h6 class="old-price p-0 m-0">₹{{ $variant->original_price }}</h6>
                        </div>

                        <span id="stock"></span>

                        <div class="d-flex align-items-center gap-2">
                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="d-flex align-items-center gap-2 cart-btn">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                    <span>Add</span>
                                </button>
                            </form>
                            <form action="{{ route('wishlist.add', $product->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="d-flex align-items-center justify-content-center cart-btn">
                                    <i class="fa-regular fa-heart"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-12">
                    <div class="product-details-desc">
                        {!! $product->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>