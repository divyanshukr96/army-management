<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} @yield('title')</title>

    <!-- Scripts -->
    {{--    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"--}}
    {{--            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"--}}
    {{--            crossorigin="anonymous"></script>--}}
    <script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>

    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"--}}
    {{--            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"--}}
    {{--            crossorigin="anonymous"></script>--}}
    <script src="{{ asset('js/popper.min.js') }}"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    {{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}

<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}

    {{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css"--}}
    {{--          integrity="sha256-39jKbsb/ty7s7+4WzbtELS4vq9udJ+MDjGTD5mtxHZ0=" crossorigin="anonymous"/>--}}

    <link href="{{ asset('css/family-Nunito-css.css') }}" rel="stylesheet">

    <link href="{{ asset('css/font-awesome-all.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{--    <script src="{{ asset('js/app.js') }}"></script>--}}

    <style>
        body {
            /*font-size: .875rem;*/
        }

        .feather {
            width: 16px;
            height: 16px;
            vertical-align: text-bottom;
        }

        /*
         * Sidebar
         */

        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100; /* Behind the navbar */
            padding: 48px 0 0; /* Height of navbar */
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
        }

        .sidebar-sticky {
            position: relative;
            top: 0;
            height: calc(100vh - 48px);
            padding-top: .5rem;
            overflow-x: hidden;
            overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
        }

        @supports ((position: -webkit-sticky) or (position: sticky)) {
            .sidebar-sticky {
                position: -webkit-sticky;
                position: sticky;
            }
        }

        .sidebar .nav-link {
            font-weight: 500;
            color: #333;
        }

        .sidebar .nav-link .feather {
            margin-right: 4px;
            color: #999;
        }

        .sidebar .nav-link.active {
            color: #007bff;
        }

        .sidebar .nav-link:hover .feather,
        .sidebar .nav-link.active .feather {
            color: inherit;
        }

        .sidebar-heading {
            font-size: .75rem;
            text-transform: uppercase;
        }

        /*
         * Content
         */

        [role="main"] {
            padding-top: 55px; /* Space for fixed navbar */
        }

        @media (min-width: 768px) {
            [role="main"] {
                padding-top: 50px; /* Space for fixed navbar */
            }
        }

        /*
         * Navbar
         */

        /*.navbar-brand {*/
        /*    padding-top: .75rem;*/
        /*    padding-bottom: .75rem;*/
        /*    font-size: 1rem;*/
        /*    background-color: rgba(0, 0, 0, .25);*/
        /*    box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);*/
        /*}*/


    </style>
</head>
<body>
@include('layouts.navbar')

@if(auth()->user()->army)
    <div role="main" class="container-fluid mt-4">
        <main class="col-md-9 mx-sm-auto col-lg-10 px-0 px-sm-4">
            @yield('content')
        </main>
    </div>
@else
    <div class="container-fluid mt-3">
        @include('layouts.sidebar')
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-0 px-sm-4">
            @yield('content')
        </main>
    </div>
@endif

@yield('script')
</body>
</html>
