<x-layout>
    <div class="container py-3">
        <div class="row g-4">
            <div class="d-block col-md-3">
                <div class="product-filter-container">
                    <form method="GET" id="filterForm">
                        <div class="filter-sort">
                            <span>Sort by:</span>
                            <select name="sort" onchange="document.getElementById('filterForm').submit()">
                                <option value="">-- Select --</option>
                                <option value="price_low_high"
                                    {{ request('sort') == 'price_low_high' ? 'selected' : '' }}>Price Low to High
                                </option>
                                <option value="price_high_low"
                                    {{ request('sort') == 'price_high_low' ? 'selected' : '' }}>Price High to Low
                                </option>
                                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest First
                                </option>
                                <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest First
                                </option>
                                <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Popular
                                    Products</option>
                            </select>
                        </div>

                        {{-- Categories --}}
                        <div class="mt-2">
                            <span class="fw-bold text-secondary">Categories:</span>

                            @foreach ($categories as $category)
                                <div class="d-flex align-items-center gap-2 ms-2">
                                    <input type="radio" id="cat_{{ $category->id }}" name="category"
                                        value="{{ $category->id }}"
                                        onchange="document.getElementById('filterForm').submit()"
                                        {{ request('category') == $category->id ? 'checked' : '' }}>

                                    <label for="cat_{{ $category->id }}"
                                        class="fw-semibold text-dark fw-semibold">{{ $category->name }}</label>
                                </div>
                            @endforeach
                        </div>

                        @if (request('sort') || request('category'))
                            <div class="mt-3">
                                <a href="{{ route('products') }}" class="btn btn-sm btn-outline-secondary w-100">
                                    Clear All Filters
                                </a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row g-2">
                    @foreach ($products as $product)
                        @php
                            $variant =
                                $product->variants->firstWhere('is_default', true) ?? $product->variants->first();
                        @endphp
                        <div class="col-sm-6 col-md-4">
                            <x-product-card :product="$product" :variant="$variant" />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-layout>
