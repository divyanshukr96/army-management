@extends('layouts.app')

@section('title', '| Add Role')

@section('content')

    <div class='col-lg-4 offset-lg-4'>

        <h3><i class='fa fa-key' style="font-size: large"></i> Add Role</h3>
        <hr>
        {{ Form::open(array('url' => 'roles')) }}

        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', null, array('class' => "form-control ". ($errors->has('name') ? 'is-invalid' : ''))) }}
            <span class="invalid-feedback">{{ $errors->first('name') }}</span>
        </div>

        <h5><b>Assign Permissions</b></h5>

        <div class='form-group'>
            @foreach ($permissions as $permission)
                {{ Form::checkbox('permissions[]',  $permission->id ) }}
                {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>

            @endforeach
        </div>

        {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>

@endsection
