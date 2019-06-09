{{--<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">--}}
{{--    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>--}}
{{--    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">--}}
{{--    <ul class="navbar-nav px-3">--}}
{{--        <li class="nav-item text-nowrap">--}}
{{--            <a class="nav-link" href="#">Sign out</a>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</nav>--}}

{{--<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">--}}
<nav class="navbar navbar-light fixed-top bg-white navbar-expand-md shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-primary" href="{{ route('army.create') }}">{{ __('Add New Army') }}</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
