@extends('layouts.app')
@section('content')
    <div class="container px-0 pb-5">
        @include('armies.details.navigator')
       @yield('details')
    </div>
@endsection
