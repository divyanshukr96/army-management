@php
    $leavesType = \App\Enums\LeaveType::toSelectArray();
@endphp

@extends('layouts.app')

@section('title', '| Edit Leave')

@section('content')

    <div class='col-lg-4 offset-lg-4'>

        <h3><i class='fa fa-user-plus' style="font-size: large"></i> Edit Leave Detail</h3>
        <hr>
        @include('armies.details')

        <div class="border p-2">

            @if(request()->has('redirect'))
                {{ Form::model($leaf, array('route' => array('leaves.update', $army->id, $leaf->id, 'redirect' => request()->get('redirect')), 'method' => 'PUT')) }}
            @else
                {{ Form::model($leaf, array('route' => array('leaves.update', $army->id, $leaf->id), 'method' => 'PUT')) }}
            @endif

            <div class="form-group mb-2">
                {{ Form::label('from', 'Leave From') }}
                {{ Form::date('from', $leaf->from, array('class' => 'form-control '.($errors->has('from') ? 'is-invalid' : ''),)) }}
                <div class="invalid-feedback">{{ $errors->first('from') }}</div>
            </div>

            <div class="form-group mb-2">
                {{ Form::label('to') }}
                {{ Form::date('to', $leaf->to, array('class' => 'form-control '.($errors->has('to') ? 'is-invalid' : ''),)) }}
                <div class="invalid-feedback">{{ $errors->first('to') }}</div>
            </div>

            <div class="form-group mb-2">
                {!! Form::label('type', 'Leave Type') !!}
                {!! Form::select('type', $leavesType,
               $leaf->type->value,[
               'class' => 'form-control ' . ($errors->has('type') ? 'is-invalid' : ''),
               'placeholder' => 'Select Leave Type', 'required'
               ]) !!}
                <div class="invalid-feedback">{{ $errors->first('type') }}</div>
            </div>


            <div class="d-flex justify-content-between mt-4 mb-2">
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                {{ Form::submit('Update', array('class' => 'btn btn-primary px-4')) }}
            </div>

            {{ Form::close() }}
        </div>

    </div>

@endsection
