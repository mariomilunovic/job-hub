<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- App title -->
    <title>{{ config('app.name', 'job-hub') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->

    @toastScripts
    <script defer src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.5.1/dist/cdn.min.js"></script>

    <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>

    <script src="https://kit.fontawesome.com/028d9002c0.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

    @livewireStyles

</head>

<body class="bg-gray-400 antialiased z-0">

    {{-- <livewire:toasts/> --}}

    <section id="container" class="bg-gray-400">

        <header class="flex-row items-center mt-3 bg-gray-500 card place-content-between">@include('sections.header')</header>

        <nav class="flex-col bg-blue-600 card">@include('sections.navbar')</nav>

        <main class="relative flex place-content-center bg-gray-300 card overflow-y-scroll h-screen p-3">
            <div class="absolute right-0 top-0"><livewire:toasts/></div>
            <div class="py-4 w-11/12 max-w-3xl">@yield('content')</div>

        </main>

        <footer class="flex-row items-center mb-3 bg-gray-500 card place-content-center">@include('sections.footer')</footer>

    </section>

    @livewireScripts

</body>

</html>
