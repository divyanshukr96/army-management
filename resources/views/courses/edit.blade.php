@extends('layouts.app')

@section('title', '| Edit User')

@section('content')

    <div class='col-lg-4 offset-lg-4'>

        <h3><i class='fa fa-user-plus' style="font-size: large"></i> Edit Course Detail</h3>
        <hr>
        @include('armies.details')

        <div class="border p-2">

            @if(request()->has('redirect'))
                {{ Form::model($course, array('route' => array('courses.update', $army->id, $course->id, 'redirect' => request()->get('redirect')), 'method' => 'PUT')) }}
            @else
                {{ Form::model($course, array('route' => array('courses.update', $army->id, $course->id), 'method' => 'PUT')) }}
            @endif

            <div class="form-group mb-2">
                {{ Form::label('name', 'Course Name') }}
                {{ Form::text('name', null, array('class' => 'form-control '.($errors->has('name') ? 'is-invalid' : ''),)) }}
                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            </div>

            <div class="form-group mb-2">
                {{ Form::label('from', 'Start Date') }}
                {{ Form::date('from', $course->from, array('class' => 'form-control '.($errors->has('from') ? 'is-invalid' : ''),)) }}
                <div class="invalid-feedback">{{ $errors->first('from') }}</div>
            </div>

            <div class="form-group mb-2">
                {{ Form::label('to') }}
                {{ Form::date('to', $course->to, array('class' => 'form-control '.($errors->has('to') ? 'is-invalid' : ''),)) }}
                <div class="invalid-feedback">{{ $errors->first('to') }}</div>
            </div>

            <div class="form-group mb-2">
                {{ Form::label('grade') }}
                {{ Form::text('grade', null, array('class' => 'form-control '.($errors->has('grade') ? 'is-invalid' : ''),)) }}
                <div class="invalid-feedback">{{ $errors->first('grade') }}</div>
            </div>

            <div class="form-group mb-2">
                {{ Form::label('loc') }}
                {{ Form::text('loc', null, array('class' => 'form-control '.($errors->has('loc') ? 'is-invalid' : ''),)) }}
                <div class="invalid-feedback">{{ $errors->first('loc') }}</div>
            </div>

            <div class="d-flex justify-content-between mt-4 mb-2">
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                {{ Form::submit('Update', array('class' => 'btn btn-primary px-4')) }}
            </div>

            {{ Form::close() }}
        </div>

    </div>

@endsection
