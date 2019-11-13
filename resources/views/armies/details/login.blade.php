@extends('layouts.details')
@section('details')

    <div class="row justify-content-center">
        <div class='col-lg-5 mt-5'>

            <h4><i class='fa fa-user-plus' style="font-size: medium"></i>Login Credential</h4>
            <hr>

            @if($army->user)
                {{ Form::open(array('route' => array('user.update', $army->id, $army->user->id), 'novalidate', 'method' => 'patch')) }}
            @else
                {{ Form::open(array('route' => array('user.store', $army->id), 'novalidate', 'method' => 'post')) }}
            @endif

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif


            <div class="form-group row">
                {!! Form::label('email', null, ['class' => 'col-sm-2 col-form-label']) !!}
                <div class="col-sm-10">
                    {!! Form::text('email', $army->email, [
                    'class' => 'form-control ' . ($errors->has('email') ? 'is-invalid' : ''),
                    'placeholder' => 'Enter email',
                    'required', 'readonly'
                    ]) !!}
                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('username', null, ['class' => 'col-sm-2 col-form-label']) !!}
                <div class="col-sm-10">
                    {!! Form::text('username', $army->regd_no, [
                    'class' => 'form-control ' . ($errors->has('username') ? 'is-invalid' : ''),
                    'placeholder' => 'Enter username',
                    'required', 'readonly'
                    ]) !!}
                    <div class="invalid-feedback">{{ $errors->first('username') }}</div>
                </div>
            </div>

            @if($army->user)
                <div class="form-group row">
                    {!! Form::label('password', null, ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::password('password',[
                        'class' => 'form-control ' . ($errors->has('password') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter new password',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                    </div>
                </div>

                {{ Form::submit('Change Password', array('class' => 'btn btn-primary float-right px-3')) }}
            @else
                <div class="form-group row">
                    {!! Form::label('password', null, ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('password',$army->id_card_no,[
                        'class' => 'form-control ' . ($errors->has('password') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter password',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                    </div>
                </div>

                {{ Form::submit('Create User', array('class' => 'btn btn-primary float-right px-3')) }}
            @endif

            {{ Form::close() }}

        </div>
    </div>

@endsection
