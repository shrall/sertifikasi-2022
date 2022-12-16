<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    @yield('head')
</head>

<body>
    <div id="app" class="font-poppins">
        @include('inc.navbar')
        @yield('content')
    </div>
    <script>
        var navbarMenuBool = false;

        function toggleNavbarMenu() {
            if (navbarMenuBool) {
                $('#navbar-menu').addClass('hidden').removeClass('block');
            } else {
                $('#navbar-menu').addClass('block').removeClass('hidden');
            }
            navbarMenuBool = !navbarMenuBool;
        }

        var mobileMenuBool = false

        function toggleMobileMenu() {
            if (mobileMenuBool) {
                $('#mobile-menu').addClass('hidden').removeClass('block');
            } else {
                $('#mobile-menu').addClass('block').removeClass('hidden');
            }
            mobileMenuBool = !mobileMenuBool;
        }
    </script>
    @yield('scripts')
</body>

</html>
