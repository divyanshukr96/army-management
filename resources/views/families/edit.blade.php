@php
    $wife = old('relation') == \App\Enums\RelationType::Wife;
    $child = old('relation') == \App\Enums\RelationType::Children;
    $options = [
        'blood_group' => \App\Enums\BloodGroupType::toSelectArray(),
        'relation' => \App\Enums\RelationType::toSelectArray(),
    ];
@endphp
@extends('layouts.app')

@section('title', '| Users')

@section('content')

    <div class="col-lg-4 offset-lg-4">
        <h3><i class="fa fa-user" style="font-size: large"></i> {{ $army->name }}</h3>
        <hr>
        @include('armies.details')

        <div class="border p-3">

            @if(request()->has('redirect'))
                {{ Form::model($family, array('route' => array('families.update', $army->id,  $family->id, 'redirect' => request()->get('redirect')), 'method' => 'PUT')) }}
            @else
                {{ Form::model($family, array('route' => array('families.update', $army->id,  $family->id), 'method' => 'PUT')) }}
            @endif

            <div class="form-group mb-2 ">
                {{ Form::label('name') }}
                {{ Form::text('name', null, array('class' => 'form-control '.($errors->has('name') ? 'is-invalid' : ''))) }}
                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            </div>

            <div class="form-group mb-2 ">
                {{ Form::label('mobile') }}
                {{ Form::text('mobile', null, array('class' => 'form-control '.($errors->has('mobile') ? 'is-invalid' : ''))) }}
                <div class="invalid-feedback">{{ $errors->first('mobile') }}</div>
            </div>

            <div class="form-row">
                <div class="form-group mb-2  col-md-6">
                    {{ Form::label('dob') }}
                    {{ Form::date('dob', date('Y-m-d',strtotime($family->dob)), array('class' => 'form-control '.($errors->has('dob') ? 'is-invalid' : ''))) }}
                    <div class="invalid-feedback">{{ $errors->first('dob') }}</div>
                </div>

                <div class="form-group mb-2  col-md-6">
                    {{ Form::label('age') }}
                    {{ Form::text('age', null, array('class' => 'form-control '.($errors->has('age') ? 'is-invalid' : ''))) }}
                    <div class="invalid-feedback">{{ $errors->first('age') }}</div>
                </div>

                <div class="form-group mb-2  col-md-6">
                    {{ Form::label('blood_group') }}
                    {{ Form::select('blood_group', $options['blood_group'],$family->blood_group->value, array('class' => 'form-control '.($errors->has('blood_group') ? 'is-invalid' : ''))) }}
                    <div class="invalid-feedback">{{ $errors->first('blood_group') }}</div>
                </div>

                <div class="form-group mb-2  col-md-6">
                    {{ Form::label('relation') }}
                    {{ Form::select('relation', $options['relation'],$family->relation->value, array('class' => 'form-control '.($errors->has('relation') ? 'is-invalid' : ''))) }}
                    <div class="invalid-feedback">{{ $errors->first('relation') }}</div>
                </div>
            </div>

            <div class="form-group mb-2 ">
                {{ Form::label('education') }}
                {{ Form::text('education', null, array('class' => 'form-control '.($errors->has('education') ? 'is-invalid' : ''))) }}
                <div class="invalid-feedback">{{ $errors->first('education') }}</div>
            </div>

            <div class="form-group mb-2 ">
                {{ Form::label('occupation') }}
                {{ Form::text('occupation', null, array('class' => 'form-control '.($errors->has('occupation') ? 'is-invalid' : ''))) }}
                <div class="invalid-feedback">{{ $errors->first('occupation') }}</div>
            </div>

            @switch($family->relation->value)
                @case('Wife')
                <div class="form-group mb-2  col-md-4">
                    {{ Form::label('pan_card') }}
                    {{ Form::text('pan_card', null, array('class' => 'form-control '.($errors->has('pan_card') ? 'is-invalid' : ''))) }}
                    <div class="invalid-feedback">{{ $errors->first('pan_card') }}</div>
                </div>
                <div class="form-group mb-2  col-md-4">
                    {{ Form::label('dom','Date of Marriage') }}
                    {{ Form::text('dom', null, array('class' => 'form-control '.($errors->has('dom') ? 'is-invalid' : ''))) }}
                    <div class="invalid-feedback">{{ $errors->first('dom') }}</div>
                </div>
                @break
                @case('Children')

                @break
            @endswitch

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                {{ Form::submit('Update', array('class' => 'btn btn-primary px-4')) }}
            </div>

            {{ Form::close() }}

        </div>
    </div>

@endsection
