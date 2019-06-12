@extends('layouts.app')
@section('content')
    <div class="container px-0">

        @if(request()->has('redirect'))
            {{ Form::open(['route' => ['course.store','redirect='.request()->redirect], 'novalidate']) }}
        @else
            {{ Form::open(['route' => 'course.store', 'novalidate']) }}
        @endif

        <div class="card mb-2">
            <div class="card-header py-2">
                <h5 class="mb-0 font-weight-bold">Add Course Attended Details</h5>
            </div>
            <div class="card-body pb-0 pt-2">
                <div class="form-row">
                    <div class="col-md-4 mb-2">
                        {!! Form::label('name', 'Course Name') !!}
                        {!! Form::text('name',null,[
                        'class' => 'form-control ' . ($errors->has('name') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter Course name',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                    </div>

                    <div class="col-md-4 mb-2">
                        {!! Form::label('date', 'Date') !!}
                        {!! Form::date('date', null,[
                        'class' => 'form-control ' . ($errors->has('date') ? 'is-invalid' : ''),
                        'required',
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('date') }}</div>
                    </div>

                    <div class="col-md-4 mb-2">
                        {!! Form::label('grade', 'Grading Obtained') !!}
                        {!! Form::text('grade',null,[
                        'class' => 'form-control ' . ($errors->has('grade') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter grading obtained',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('grade') }}</div>
                    </div>
                    <div class="col-md-4 mb-2">
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
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('add.professional',session('army')) }}" class="btn btn-secondary">Back</a>
            {{ Form::submit('Save', ['class' => 'btn btn-success']) }}
        </div>
        {{ Form::close() }}
    </div>
@endsection
