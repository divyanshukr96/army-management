@extends('layouts.app')
@section('content')
    <div class="container px-0">

        @if(request()->has('redirect'))
            {{ Form::open(['route' => ['punishment.store','redirect='.request()->redirect], 'novalidate']) }}
        @else
            {{ Form::open(['route' => 'punishment.store', 'novalidate']) }}
        @endif

        <div class="card mb-2">
            <div class="card-header py-2">
                <h5 class="mb-0 font-weight-bold">Add Punishment Award Details</h5>
            </div>
            <div class="card-body py-2">
                <div class="form-row">
                    <div class="col-sm-6 col-lg-4 mb-2">
                        {!! Form::label('place', null) !!}
                        {!! Form::text('place',null,[
                        'class' => 'form-control ' . ($errors->has('place') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter Place',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('place') }}</div>
                    </div>

                    <div class="col-sm-6 col-lg-4 mb-2">
                        {!! Form::label('offence_date', 'Date of Offence') !!}
                        {!! Form::date('offence_date', null,[
                        'class' => 'form-control ' . ($errors->has('offence_date') ? 'is-invalid' : ''),
                        'required',
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('offence_date') }}</div>
                    </div>

                    <div class="col-sm-6 col-lg-4 mb-2">
                        {!! Form::label('rank', null) !!}
                        {!! Form::text('rank',null,[
                        'class' => 'form-control ' . ($errors->has('rank') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter Rank',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('rank') }}</div>
                    </div>

                    <div class="col-sm-6 col-lg-4 mb-2">
                        {!! Form::label('witness', 'Name of Witness') !!}
                        {!! Form::text('witness',null,[
                        'class' => 'form-control ' . ($errors->has('witness') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter Name of Witness',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('witness') }}</div>
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-2">
                        {!! Form::label('punishment', 'Punishment Awarded') !!}
                        {!! Form::text('punishment',null,[
                        'class' => 'form-control ' . ($errors->has('punishment') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter Punishment Awarded',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('punishment') }}</div>
                    </div>

                    <div class="col-sm-6 col-lg-4 mb-2">
                        {!! Form::label('order_date', 'Date of Award/Order') !!}
                        {!! Form::date('order_date', null,[
                        'class' => 'form-control ' . ($errors->has('order_date') ? 'is-invalid' : ''),
                        'required',
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('order_date') }}</div>
                    </div>

                    <div class="col-sm-6 col-lg-4 mb-2">
                        {!! Form::label('by_whom', 'By Whom Awarded') !!}
                        {!! Form::text('by_whom',null,[
                        'class' => 'form-control ' . ($errors->has('by_whom') ? 'is-invalid' : ''),
                        'placeholder' => 'By Whom Awarded',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('by_whom') }}</div>
                    </div>

                    <div class="col-sm-6 col-lg-4 mb-2">
                        {!! Form::label('offence', null) !!}
                        {!! Form::textarea('offence',null,[
                        'class' => 'form-control ' . ($errors->has('offence') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter Offence',
                        'required',
                        'rows' => 5
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('offence') }}</div>
                    </div>

                    <div class="col-sm-6 col-lg-4 mb-2">
                        {!! Form::label('remark', 'Remarks') !!}
                        {!! Form::textarea('remark',null,[
                        'class' => 'form-control ' . ($errors->has('remark') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter Remarks',
                        'required',
                        'rows' => 5
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('remark') }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('add.professional',session('army')) }}" class="btn btn-secondary">Back</a>
            {{ Form::submit('Save', ['class' => 'btn btn-success']) }}
        </div>
        {{ Form::close() }}
    </div>
@endsection
