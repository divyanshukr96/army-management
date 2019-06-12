@php
    $wife = old('relation') == \App\Enums\RelationType::Wife;
    $child = old('relation') == \App\Enums\RelationType::Children;
@endphp
@extends('layouts.app')
@section('content')
    <div class="container px-0">
        @include('add.include.details')

        @includeWhen(count($army->family) > 0,'add.include.family-details')

        <div class="d-flex justify-content-end">
            <a href="{{ route('add.family.create',[session('army'),'redirect'=> route('add.family',session('army'))]) }}"
               class="btn btn-success mb-2">Add Family
                Details</a>
        </div>

        <div class="card mb-2">
            <div class="card-header py-2">
                <h5 class="mb-0 font-weight-bold">Sarpanch Details</h5>
            </div>
            <div class="card-body pb-0 pt-1">
                @if($army->sarpanch)
                    <div class="row mb-2">
                        <div class="col-12 col-sm-4 pt-2">Name <span class="float-right">:</span></div>
                        <div class="col-12 col-sm-8 pt-2 font-weight-bold">{{ucwords($army->sarpanch->name)}}</div>
                        <div class="col-12 col-sm-4 pt-2">Mobile <span class="float-right">:</span></div>
                        <div class="col-12 col-sm-8 pt-2 font-weight-bold">{{$army->sarpanch->mobile}}</div>
                    </div>
                @else
                    {{ Form::open(['route' => 'sarpanch.store', 'novalidate']) }}
                    <div class="form-row">
                        <div class="col-md-5 mb-3">
                            {!! Form::label('name', 'Sarpanch Name') !!}
                            {!! Form::text('name',null,[
                            'class' => 'form-control ' . ($errors->has('name') ? 'is-invalid' : ''),
                            'placeholder' => 'Enter Sarpanch Name',
                            'required'
                            ]) !!}
                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                        </div>
                        <div class="col-md-5 mb-3">
                            {!! Form::label('mobile', 'Mobile No.') !!}
                            {!! Form::text('mobile',null,[
                            'class' => 'form-control ' . ($errors->has('mobile') ? 'is-invalid' : ''),
                            'placeholder' => 'Enter Sarpanch Mobile No.',
                            'required'
                            ]) !!}
                            <div class="invalid-feedback">{{ $errors->first('mobile') }}</div>
                        </div>

                        <div class="col mb-3 align-self-end">
                            {{ Form::submit('Save', ['class' => 'btn btn-primary ']) }}
                        </div>
                    </div>
                    {{ Form::close() }}
                @endif
            </div>
        </div>


        <div class="d-flex justify-content-between">
            <a href="{{ route('army.create') }}" class="btn btn-danger">Close</a>
            <a href="{{ route('add.document',session('army')) }}" class="btn btn-success">Proceed Next</a>
        </div>
    </div>
@endsection
