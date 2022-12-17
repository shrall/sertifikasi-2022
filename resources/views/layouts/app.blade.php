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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
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
        @if (Route::current()->getName() != 'login' && Route::current()->getName() != 'register')
            @include('inc.navbar')
        @endif
        @yield('content')
        @auth
            <div onclick="toggleProfileMenu()" id="profile-menu" class="hidden fixed z-10 inset-0 overflow-y-auto"
                aria-labelledby="modal-title" role="dialog" aria-modal="true">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div onclick="toggleProfileModal();" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                        aria-hidden="true"></div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <div
                        class="relative inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                        <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
                            <button type="button" onclick="toggleProfileModal()"
                                class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <span class="sr-only">Close</span>
                                <!-- Heroicon name: outline/x -->
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div class="sm:flex sm:items-start">
                            <div
                                class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-indigo-100 sm:mx-0 sm:h-10 sm:w-10">
                                <!-- Heroicon name: outline/exclamation -->
                                <img class="h-8 w-8 rounded-full"
                                    src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460__480.png"
                                    alt="">
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                    {{ Auth::user()->name }}
                                </h3>
                                @if (Auth::user()->info_type == 'App\Models\Customer')
                                    <div class="mt-2">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900">Address</h3>
                                        <p class="text-sm text-gray-500">{{ Auth::user()->info->address }}</p>
                                    </div>
                                @else
                                    <div class="mt-2">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900">Position</h3>
                                        <p class="text-sm text-gray-500">{{ Auth::user()->info->position->name }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endauth
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

        var profileMenuBool = false

        function toggleProfileModal() {
            if (profileMenuBool) {
                $('#profile-menu').addClass('hidden').removeClass('block');
            } else {
                $('#profile-menu').addClass('block').removeClass('hidden');
            }
            profileMenuBool = !profileMenuBool;
        }
    </script>
    @yield('scripts')
</body>

</html>
