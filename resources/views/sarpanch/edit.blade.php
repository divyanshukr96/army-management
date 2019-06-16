@extends('layouts.app')

@section('title', '| Edit User')

@section('content')

    <div class='col-lg-4 offset-lg-4'>

        <h3><i class='fa fa-user-plus' style="font-size: large"></i> Edit Sarpanch Details</h3>
        <hr>
        @include('armies.details')

        <div class="border p-2">

            @if(request()->has('redirect'))
                {{ Form::model($sarpanch, array('route' => array('sarpanch.update', $army->id, $sarpanch->id, 'redirect' => request()->get('redirect')), 'method' => 'PUT')) }}
            @else
                {{ Form::model($sarpanch, array('route' => array('sarpanch.update', $army->id, $sarpanch->id), 'method' => 'PUT')) }}
            @endif

            <div class="form-group mb-2">
                {{ Form::label('name') }}
                {{ Form::text('name', null, array('class' => 'form-control '.($errors->has('name') ? 'is-invalid' : ''),
                'placeholder' => 'Enter Sarpanch Name',
                )) }}
                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            </div>

            <div class="form-group mb-2">
                {{ Form::label('mobile') }}
                {{ Form::text('mobile', null, array('class' => 'form-control '.($errors->has('mobile') ? 'is-invalid' : ''),
                'placeholder' => 'Enter Sarpanch Mobile No.',
                )) }}
                <div class="invalid-feedback">{{ $errors->first('mobile') }}</div>
            </div>


            <div class="d-flex justify-content-between mt-4 mb-2">
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                {{ Form::submit('Update', array('class' => 'btn btn-primary px-4')) }}
            </div>

            {{ Form::close() }}
        </div>

    </div>

@endsection
