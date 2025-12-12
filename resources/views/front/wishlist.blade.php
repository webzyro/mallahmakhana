<x-layout title="Wishlist" meta_description="Wishlist" meta_keywords="Wishlist">
    <section class="wishlist-container">
        <div class="wishlist-wrapper">
            <div class="wishlist-top">
                <h4 class="m-0 p-0">You Wishlist have ( {{ count($wishlists) }} Items )</h4>
            </div>

            <div class="wishlist-bottom">
                <table class="wishlist-table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Stock Status</th>
                            <th>Action</th>
                            <th>Remove</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($wishlists as $wishlist)
                            <tr>
                                <td data-label="Product">
                                    <div class="product-info">
                                        <img src="{{ asset('uploads/' . $wishlist->product->image) }}" alt="product">
                                        <div>
                                            <h4>{{ $wishlist->product->name }}</h4>
                                            <div class="rating">★★★★★ <span>(4.0)</span></div>
                                        </div>
                                    </div>
                                </td>

                                <td class="fw-semibold" data-label="Price">{{ $wishlist->variant->original_price }}</td>

                                <td data-label="Stock Status">
                                    <span
                                        class="stock-badge in-stock">{{ $wishlist->variant->stock ? 'In Stock' : 'Our of Stock' }}</span>
                                </td>

                                <td data-label="Action">
                                    <form action="{{ route('cart.add', $wishlist->product->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="add-cart-btn">Add to cart</button>
                                    </form>
                                </td>

                                <td data-label="Remove">
                                    <form action="{{ route('wishlist.remove', $wishlist->product->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="remove-btn">
                                            <i class="fa-solid fa-trash text-danger text-white"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</x-layout>