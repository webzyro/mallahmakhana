<section class="py-5 px-2 px-md-0" id="popular-products">
    <div class="container-fs">
        <h4 class="fw-bold fs-2 heading">Popular Products</h4>

        <div class="row g-4">
            @foreach ($products as $product)
                @php
                    $variant = $product->variants->firstWhere('is_default', true) ?? $product->variants->first();
                @endphp
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <x-product-card :product="$product" :variant="$variant" />
                </div>
            @endforeach
        </div>
    </div>
</section>
