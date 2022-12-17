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
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v6.0.0/css/pro.min.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    @yield('head')
</head>

<body>
    <div id="app" class="font-poppins">
        @if (Route::current()->getName() != 'login' && Route::current()->getName() != 'register')
            @include('inc.navbar')
        @endif
        @yield('content')
    </div>
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    </script>
    <script>
        var page = 1;
        var search = null;
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            page = $(this).attr('href').split('page=')[1];
            sort(page);
        });
    </script>
    <script>
        function searchData() {
            page = 1;
            search = $("#search").val();
            sort(page);
        }
    </script>
    <script>
        function sort(page) {
            var hostname = "{{ request()->getHost() }}"
            var url = ""
            if (hostname.includes('www')) {
                url = "https://" + hostname
            } else {
                url = "{{ config('app.url') }}"
            }
            $.post(url + "/search?page=" + page, {
                    _token: CSRF_TOKEN,
                    search: search
                })
                .done(function(data) {
                    $('#book-list').html(data);
                })
                .fail(function(error) {
                    console.log(error);
                });
        }
    </script>
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
