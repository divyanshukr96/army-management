<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
            font-weight: 600;
        }

        .title {
            font-size: 45px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .btn {
            text-decoration: none;
            padding: 8px 16px;
            background: #1d68a7;
            color: white;
        }

    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            Welcome to {{ config('app.name') }}
        </div>
        <h2>
            We're Airborne, we don't fights. We finish them.
        </h2>
        <hr>

        <div class="" style="">
            <h3 style="font-weight: bold">Installation Process</h3>
            <hr>
            <div style="background: navajowhite; padding: 16px; font-size: 1.2rem; color: red">
                Firstly create a database in mysql. and then click on install
            </div>
            <div style="margin-top: 24px">
                <a href="{{ route('LaravelInstaller::welcome') }}" class="btn">Install Now</a>
            </div>
        </div>


    </div>
</div>
</body>
</html>
