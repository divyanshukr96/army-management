@extends('layouts.app')

@section('title', '| Add Course')

@section('content')

    <div class='col-lg-4 offset-lg-4'>

        <h3><i class='fa fa-user-plus' style="font-size: large"></i> Person Course Attended</h3>
        <hr>
        @include('armies.details')

        @if(request()->has('redirect'))
            {{ Form::open(['route' => ['courses.store',$army->id,'redirect='.request()->redirect], 'novalidate']) }}
        @else
            {{ Form::open(['route' => 'courses.store', 'novalidate']) }}
        @endif

        <div class="card mb-2">
            <div class="card-header py-2">
                <h5 class="mb-0 font-weight-bold">Add Course Attended Details</h5>
            </div>
            <div class="card-body pb-0 pt-2">
                <div class="form-group mb-2">
                    {!! Form::label('name', 'Course Name') !!}
                    {!! Form::text('name',null,[
                    'class' => 'form-control ' . ($errors->has('name') ? 'is-invalid' : ''),
                    'placeholder' => 'Enter Course name',
                    'required'
                    ]) !!}
                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                </div>

                <div class="form-group mb-2">
                    {!! Form::label('from', 'Start Date') !!}
                    {!! Form::date('from', null,[
                    'class' => 'form-control ' . ($errors->has('from') ? 'is-invalid' : ''),
                    'required',
                    ]) !!}
                    <div class="invalid-feedback">{{ $errors->first('from') }}</div>
                </div>

                <div class="form-group mb-2">
                    {!! Form::label('to', 'End Date') !!}
                    {!! Form::date('to', null,[
                    'class' => 'form-control ' . ($errors->has('to') ? 'is-invalid' : ''),
                    'required',
                    ]) !!}
                    <div class="invalid-feedback">{{ $errors->first('to') }}</div>
                </div>

                <div class="form-group mb-2">
                    {!! Form::label('grade', 'Grading Obtained') !!}
                    {!! Form::text('grade',null,[
                    'class' => 'form-control ' . ($errors->has('grade') ? 'is-invalid' : ''),
                    'placeholder' => 'Enter grading obtained',
                    'required'
                    ]) !!}
                    <div class="invalid-feedback">{{ $errors->first('grade') }}</div>
                </div>
                <div class="form-group mb-2">
                    {!! Form::label('loc', null) !!}
                    {!! Form::text('loc',null,[
                    'class' => 'form-control ' . ($errors->has('loc') ? 'is-invalid' : ''),
                    'placeholder' => 'loc',
                    'required'
                    ]) !!}
                    <div class="invalid-feedback">{{ $errors->first('loc') }}</div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
            {{ Form::submit('Add', ['class' => 'btn btn-success px-4']) }}
        </div>
        {{ Form::close() }}

    </div>

@endsection
