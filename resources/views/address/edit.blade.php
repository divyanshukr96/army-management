@extends('layouts.app')

@section('title', '| Edit User')

@section('content')

    <div class="row justify-content-center">
        <div class='col-lg-4'>

            <h3><i class='fa fa-user-plus' style="font-size: large"></i> Edit Address Detail</h3>
            <hr>
            @include('armies.details')

            <div class="border p-2 mb-5">

                @if(request()->has('redirect'))
                    {{ Form::model($army, array('route' => array('address.update', $army->id, $address->id, 'redirect' => request()->get('redirect')), 'method' => 'PUT')) }}
                @else
                    {{ Form::model($army, array('route' => array('address.update', $army->id, $address->id), 'method' => 'PUT')) }}
                @endif

                <div class="form-group mb-2">
                    {!! Form::label('state') !!}
                    {!! Form::text('state',$army->address->state,[
                    'class' => 'form-control ' . ($errors->has('state') ? 'is-invalid' : ''),
                    'placeholder' => 'Enter State',
                    ]) !!}
                    <div class="invalid-feedback">{{ $errors->first('state') }}</div>
                </div>
                <div class="form-group mb-2">
                    {!! Form::label('district') !!}
                    {!! Form::text('district',$army->address->district,[
                    'class' => 'form-control ' . ($errors->has('district') ? 'is-invalid' : ''),
                    'placeholder' => 'Enter District',
                    ]) !!}
                    <span class="invalid-feedback">{{ $errors->first('district') }}</span>
                </div>
                <div class="form-group mb-2">
                    {!! Form::label('pin_code') !!}
                    {!! Form::text('pin_code',$army->address->pin_code,[
                    'class' => 'form-control ' . ($errors->has('pin_code') ? 'is-invalid' : ''),
                    'placeholder' => 'Enter Pin Code',
                    ]) !!}
                    <span class="invalid-feedback">{{ $errors->first('pin_code') }}</span>
                </div>
                <div class="form-group mb-2">
                    {!! Form::label('address') !!}
                    {!! Form::textarea('address',$army->address->address,[
                    'class' => 'form-control ' . ($errors->has('address') ? 'is-invalid' : ''),
                    'placeholder' => 'Enter Address',
                    'rows' => 3,
                    ]) !!}
                    <span class="invalid-feedback">{{ $errors->first('address') }}</span>
                </div>

                <div class="d-flex justify-content-between mt-4 mb-2">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                    {{ Form::submit('Update', array('class' => 'btn btn-primary px-4')) }}
                </div>

                {{ Form::close() }}
            </div>

        </div>
    </div>

@endsection
