<section class="py-3 px-2 px-md-0">
    <div class="container-fs">
        <h4 class="fw-semibold fs-3 heading">Daily Best Sells</h4>

        <div class="row g-4 align-items-center">
            <div class="col-md-3">
                <div class="daily-side-banner" style="background-image: url('{{ asset('assets/images/banner-4.png') }}">
                    <div class="banner-text">
                        <h4 class="fs-3 text-dark fw-bold">Bring nature into your home</h4>
                    </div>

                    <button class="d-flex align-items-center gap-2 primary-btn">
                        <span>Show Now</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-9">
                <div class="owl-carousel sell-carousel owl-theme">
                    @foreach ($featuredProducts as $product)
                        @php
                            $variant =
                                $product->variants->firstWhere('is_default', true) ?? $product->variants->first();
                        @endphp

                        <x-product-card :product="$product" :variant="$variant" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
