<x-layout title="Home - Makhana Mafiya" meta_description="Buy makhana online - Makhana Mafiya"
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
