<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        @section('style')@show
        <script src="https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.1/dist/index.umd.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <!-- Scripts -->
        @vite([
                'resources/css/open-iconic-bootstrap.min.css',
                'resources/css/animate.css',
                'resources/css/owl.carousel.min.css',
                'resources/css/owl.theme.default.min.css',
                'resources/css/magnific-popup.css',
                'resources/css/aos.css',
                'resources/css/ionicons.min.css',
                'resources/css/flaticon.css',
                'resources/css/icomoon.css',
                'resources/css/style.css',
                'resources/css/app.css',
                'resources/js/jquery.min.js',
                'resources/js/jquery-migrate-3.0.1.min.js',
                'resources/js/popper.min.js',
                'resources/js/bootstrap.js',
                'resources/js/jquery.easing.1.3.js',
                'resources/js/jquery.waypoints.min.js',
                'resources/js/jquery.stellar.min.js',
                'resources/js/owl.carousel.min.js',
                'resources/js/jquery.magnific-popup.min.js',
                'resources/js/aos.js',
                'resources/js/jquery.animateNumber.min.js',
                'resources/js/scrollax.min.js',
                'resources/js/main.js',
                'resources/js/app.js'
                ])

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                @if (isset($slot))
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $slot }}
                        </div>
                    </header>
                @endif

                @yield('content')
            </main>
        </div>
        @section('script')@show
    </body>
</html>
