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

</head>

<body class="">

    {{--  Content --}}
    <main class="">
        {{ $slot }}
    </main>

    {{-- index.js file --}}
    <script src="{{ asset('assets/js/index.js') }}"></script>
</body>

</html>
