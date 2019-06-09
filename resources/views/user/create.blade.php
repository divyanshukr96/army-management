@extends('layouts.app')
@section('content')
    <div class="container" style="width: 800px">

        {{ Form::open(['route' => 'users.store', 'novalidate']) }}

        <div class="form-group row">
            {!! Form::label('name', null, ['class' => 'col-sm-2 col-form-label']) !!}
            <div class="col-sm-10">
                {!! Form::text('name',null,[
                'class' => 'form-control ' . ($errors->has('name') ? 'is-invalid' : ''),
                'placeholder' => 'Enter full name',
                'required'
                ]) !!}
                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('email', null, ['class' => 'col-sm-2 col-form-label']) !!}
            <div class="col-sm-10">
                {!! Form::email('email',null, [
                'class' => 'form-control ' . ($errors->has('email') ? 'is-invalid' : ''),
                'placeholder' => 'Enter email-id',
                'required'
                ]) !!}
                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('username', null, ['class' => 'col-sm-2 col-form-label']) !!}
            <div class="col-sm-10">
                {!! Form::text('username',null, [
                'class' => 'form-control ' . ($errors->has('username') ? 'is-invalid' : ''),
                'placeholder' => 'Enter username',
                'required'
                ]) !!}
                <div class="invalid-feedback">{{ $errors->first('username') }}</div>
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('password', null, ['class' => 'col-sm-2 col-form-label']) !!}
            <div class="col-sm-10">
                {!! Form::password('password',[
                'class' => 'form-control ' . ($errors->has('password') ? 'is-invalid' : ''),
                'placeholder' => 'Enter password',
                'required'
                ]) !!}
                <div class="invalid-feedback">{{ $errors->first('password') }}</div>
            </div>
        </div>

        {{--        {{ Form::text("username1",--}}
        {{--             old("username") ? old("username") : (!empty($user) ? $user->username : null),--}}
        {{--             [--}}
        {{--                "class" => "form-control user-email",--}}
        {{--                "placeholder" => "Username",--}}
        {{--             ])--}}
        {{--}}--}}

        {{--        {!! Form::label('branch[]', 'Branch') !!}--}}
        {{--        {!! Form::text('branch[]',null,array('class' => 'validate ' . ($errors->has('branch.'.$i) ? 'invalid' : ''))) !!}--}}
        {{--        <span class="red-text">{{ $errors->first('branch.'.$i) }}</span>--}}
        {{--    </div>--}}

        {{ Form::submit('Add User', ['class' => 'btn btn-success float-right']) }}
        {{ Form::close() }}
    </div>
@endsection
