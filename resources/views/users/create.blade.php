@extends('layouts.app')

@section('title', '| Add User')

@section('content')

    <div class='col-lg-4 offset-lg-4'>

        <h3><i class='fa fa-user-plus' style="font-size: large"></i> Add User</h3>
        <hr>

        {{ Form::open(array('url' => 'users', 'novalidate')) }}

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
        <div class="form-group row">
            {!! Form::label('password_confirmation', null, ['class' => 'col-sm-2 col-form-label']) !!}
            <div class="col-sm-10">
                {!! Form::password('password_confirmation',[
                'class' => 'form-control ' . ($errors->has('password_confirmation') ? 'is-invalid' : ''),
                'placeholder' => 'Password confirmation',
                'required'
                ]) !!}
                <div class="invalid-feedback">{{ $errors->first('password_confirmation') }}</div>
            </div>
        </div>


        <div class="form-group row">
            {!! Form::label('roles', null, ['class' => 'col-sm-2 col-form-label']) !!}
            <div class="col-sm-10">
                @foreach ($roles as $role)
                    {{ Form::checkbox('roles[]',  $role->id ) }}
                    {{ Form::label($role->name, ucfirst($role->name)) }}<br>

                @endforeach
                <div class="invalid-feedback">{{ $errors->first('password_confirmation') }}</div>
            </div>
        </div>


        {{ Form::submit('Add User', array('class' => 'btn btn-primary float-right px-5')) }}

        {{ Form::close() }}

    </div>

@endsection
