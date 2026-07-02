<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name'))</title>
    <meta name="description"
        content="@yield('meta_description', 'Authentic travel guides, destination insights, and unforgettable adventures from Nepal and beyond.')">

    @stack('meta')

    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    @if(isset($schemas))
        @foreach($schemas as $schema)
            <script
                type="application/ld+json">{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
        @endforeach
    @endif

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-2CQP208W0L"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-2CQP208W0L');
    </script>
</head>

<body>
    @include('partials.header')

    <main>
        @if(isset($breadcrumbs))
            @include('partials.breadcrumbs', ['items' => $breadcrumbs])
        @endif

        @if(session('success'))
            <div class="container" style="padding-top: 1rem;">
                <div class="alert alert--success">{{ session('success') }}</div>
            </div>
        @endif

        @yield('content')
    </main>

    @include('partials.newsletter')
    @include('partials.footer')

    @stack('scripts')
</body>

</html>