<x-layout title="Home - Mallah Makhana" meta_description="Buy makhana online - Mallah Makhana"
    meta_keywords="makhana, healthy snacks">
    {{-- Banner --}}
    <x-banner />

    {{-- Popular Products --}}
    <x-popular-products :products="$products" />

    {{-- Daily Best Sells --}}
    <x-dailysell-product :featuredProducts="$featuredProducts" />

    {{-- Cta Section --}}
    <x-cta />

    {{-- Feature Section --}}
    <x-feature />
</x-layout>