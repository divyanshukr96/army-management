@extends('layouts.app')

@section('title', '| Edit User')

@section('content')

    <div class='col-lg-4 offset-lg-4'>

        <h3><i class='fa fa-user-plus' style="font-size: large"></i> Leave Detail Add</h3>
        <hr>
        @include('armies.details')

        <div class="border p-2">

            @include('forms.new.leave')

            {{ Form::close() }}
        </div>

    </div>

@endsection
