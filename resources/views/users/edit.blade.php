@extends('layouts.app')

@section('title', '| Edit User')

@section('content')

    <div class='col-lg-4 offset-lg-4'>

        <h3><i class='fa fa-user-plus' style="font-size: large"></i> Edit {{$user->name}}</h3>
        <hr>

        {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with user data --}}

        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', null, array('class' => 'form-control '.($errors->has('name') ? 'is-invalid' : ''))) }}
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
        </div>

        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::email('email', null, array('class' => 'form-control '.($errors->has('email') ? 'is-invalid' : ''))) }}
            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
        </div>
        <div class="form-group">
            {{ Form::label('username') }}
            {{ Form::text('username', null, array('class' => 'form-control '.($errors->has('username') ? 'is-invalid' : ''))) }}
            <div class="invalid-feedback">{{ $errors->first('username') }}</div>
        </div>

        <h5><b>Give Role</b></h5>

        <div class='form-group'>
            @foreach ($roles as $role)
                {{ Form::checkbox('roles[]',  $role->id, $user->roles ) }}
                {{ Form::label($role->name, ucfirst($role->name)) }}<br>
            @endforeach
                <div class="text-danger">{{ $errors->first('role') }}</div>
        </div>

        <div class="form-group">
            {{ Form::label('password') }}<br>
            {{ Form::password('password', array('class' => 'form-control '.($errors->has('password') ? 'is-invalid' : ''))) }}
            <div class="invalid-feedback">{{ $errors->first('password') }}</div>
        </div>

        <div class="form-group">
            {{ Form::label('password', 'Confirm Password') }}<br>
            {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
        </div>

        {{ Form::submit('Update', array('class' => 'btn btn-primary float-right px-5')) }}

        {{ Form::close() }}

    </div>

@endsection
