<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name', 'Makhana Home Page') }}</title>

    {{-- Meta tags --}}
    <meta name="description" content="{{ $meta_description ?? 'Buy makhana online - Makhana Mafiya' }}">
    <meta name="keywords" content="{{ $meta_keywords ?? 'makhana, healthy snacks, ecommerce' }}">

    {{-- CSS (Vite, Tailwind, Bootstrap, etc.) --}}
    @vite(['resources/js/app.js'])

    {{-- Fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    {{-- Owl Carousel --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

</head>

<body class="">

    {{-- Navbar --}}
    <x-navbar />

    <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999; width: fit-content;">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
    </div>

    {{--  Content --}}
    <main class="">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <x-footer />


    <!-- Owl Carousel -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


    {{-- index.js file --}}
    <script src="{{ asset('assets/js/index.js') }}"></script>
</body>

</html>
