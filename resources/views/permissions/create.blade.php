@extends('layouts.app')

@section('title', '| Create Permission')

@section('content')

    <div class='col-lg-4 offset-lg-4'>

        <h3><i class='fa fa-key' style="font-size: large"></i> Add Permission</h3>
        <br>

        {{ Form::open(array('url' => 'permissions')) }}

        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', '', array('class' => 'form-control '. ($errors->has('name') ? 'is-invalid' : ''))) }}
            <span class="invalid-feedback">{{ $errors->first('name') }}</span>
        </div>
        <br>
        @if(!$roles->isEmpty())
        <h4>Assign Permission to Roles</h4>

        @foreach ($roles as $role)
            {{ Form::checkbox('roles[]',  $role->id ) }}
            {{ Form::label($role->name, ucfirst($role->name)) }}<br>
        @endforeach
        @endif
        <br>
        {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>

@endsection
