@php
    $wife = old('relation') == \App\Enums\RelationType::Wife;
    $child = old('relation') == \App\Enums\RelationType::Children;
@endphp

@extends('layouts.app')

@section('title', '| Army Families')

@section('content')
    <div class="col-lg-10 offset-lg-1">
        <h3><i class="fa fa-user" style="font-size: large"></i> Army Family</h3>
        <hr>
        @include('armies.details')

        @if(request()->has('redirect'))
            {{ Form::open(['route' => ['families.store',$army->id,'redirect' => request()->get('redirect')], 'novalidate', 'files' => true]) }}
        @else
            {{ Form::open(['route' => ['families.store',$army->id], 'novalidate', 'files' => true]) }}
        @endif
        <div class="card mb-2">
            <div class="card-header py-2">
                <h5 class="mb-0 font-weight-bold">Family Details</h5>
            </div>
            <div class="card-body pb-0 pt-2">
                <div class="form-row">
                    <div class="col-md-6 mb-2">
                        {!! Form::label('name', null) !!}
                        {!! Form::text('name',null,[
                        'class' => 'form-control ' . ($errors->has('name') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter full name',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                    </div>

                    <div class="col-md-6 mb-2">
                        {!! Form::label('mobile', null) !!}
                        {!! Form::text('mobile',null,[
                        'class' => 'form-control ' . ($errors->has('mobile') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter mobile number',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('mobile') }}</div>
                    </div>

                    <div class="col-md-3 mb-2 ">
                        {!! Form::label('dob', 'Date of Birth') !!}
                        {!! Form::date('dob', null,[
                        'class' => 'form-control ' . ($errors->has('dob') ? 'is-invalid' : ''),
                        'required',
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('dob') }}</div>
                    </div>

                    <div class="col-md-3 mb-2 ">
                        {!! Form::label('age', null) !!}
                        {!! Form::text('age', null,[
                        'class' => 'form-control ' . ($errors->has('age') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter age in year',
                        'required',
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('age') }}</div>
                    </div>

                    <div class="col-md-3 mb-2">
                        {!! Form::label('blood_group') !!}
                        {!! Form::select('blood_group', $options['blood_group'],
                        null,[
                        'class' => 'form-control ' . ($errors->has('blood_group') ? 'is-invalid' : ''),
                        'placeholder' => 'Select Blood group',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('blood_group') }}</div>
                    </div>

                    <div class="col-md-3 mb-2">
                        {!! Form::label('relation', 'Family Relation') !!}
                        {!! Form::select('relation', $options['relation'],null,[
                        'class' => 'form-control ' . ($errors->has('relation') ? 'is-invalid' : ''),
                        'placeholder' => 'Select family relation',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('relation') }}</div>
                    </div>

                    <div class="col-md-6 mb-2 ">
                        {!! Form::label('education', null) !!}
                        {!! Form::text('education',null,[
                        'class' => 'form-control ' . ($errors->has('education') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter Civil Education',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('education') }}</div>
                    </div>

                    <div class="col-md-6 mb-2">
                        {!! Form::label('occupation', 'Profession / Occupation') !!}
                        {!! Form::text('occupation',null,[
                        'class' => 'form-control ' . ($errors->has('occupation') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter profession / occupation',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('occupation') }}</div>
                    </div>


                </div>
            </div>
        </div>

        @if($wife || $child)
            <div class="card mb-2">
                <div class="card-body pb-0 pt-3">
                    <div class="form-row pb-3">
                        @if($wife)
                            <div class="col-md-3">
                                {!! Form::label('pan_card') !!}
                                {!! Form::text('pan_card',null,[
                                'class' => 'form-control ' . ($errors->has('pan_card') ? 'is-invalid' : ''),
                                'placeholder' => 'Enter Pan Card No',
                                'required'
                                ]) !!}
                                <div class="invalid-feedback">{{ $errors->first('pan_card') }}</div>
                            </div>

                            <div class="col-md-3 ">
                                {!! Form::label('dom', 'Date of Marriage') !!}
                                {!! Form::date('dom',null,[
                                'class' => 'form-control ' . ($errors->has('dom') ? 'is-invalid' : ''),
                                'required'
                                ]) !!}
                                <div class="invalid-feedback">{{ $errors->first('dom') }}</div>
                            </div>
                        @endif

                        <div class="col-md-3">
                            <div
                                class="custom-file ml-2 {{$wife ? 'mt-3' : null}}">
                                {!! Form::file('certificate',[
                                'class' => 'custom-file-input' . ($errors->has('certificate') ? ' is-invalid' : ''),
                                'required'
                                ]) !!}
                                {!! Form::label('certificate',
                                ($wife ? 'Marriage' : 'Birth'). ' Certificate', ['class' => 'custom-file-label mr-2']) !!}
                                <div class="invalid-feedback ">{{ $errors->first('certificate') }}</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endif
        <div class="d-flex justify-content-end ">
            {{--            <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>--}}
            {{ Form::submit('Add', ['class' => 'btn btn-info px-5']) }}
        </div>
        {{ Form::close() }}


        @if(count($army->families) > 0)
            <div class="table-responsive mt-3">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Relation</th>
                        <th>Operations</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($army->families as $family)
                        <tr>
                            <td>{{ $family->name }}</td>
                            <td>{{ $family->relation->value }}</td>
                            <td>
                                <a href="{{ route('families.show',[$army->id, $family->id]) }}"
                                   class="btn btn-outline-primary btn-sm float-left mr-1">View</a>
                                <a href="{{ route('families.edit',[$army->id, $family->id]) }}"
                                   class="btn btn-info btn-sm float-left mr-1">Edit</a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['families.destroy', $army->id, $family->id] ]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif


        <div class="d-flex justify-content-between mt-4">
            <a href="{{ request()->get('redirect') ?? url()->previous() }}" class="btn btn-secondary">Back</a>
            {{--            <a href="{{ request()->get('redirect')?? url()->previous() }}" class="btn btn-success px-5">Next</a>--}}
        </div>

    </div>

@endsection
