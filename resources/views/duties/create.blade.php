@php
    $dutiesType = \App\Enums\OtherLeaveType::toSelectArray();
@endphp

@extends('layouts.app')

@section('content')

    <div class='col-lg-4 offset-lg-4'>
        <h3><i class='fa fa-user-plus' style="font-size: large"></i> Add Person's <span
                title="Military Hospital">MH</span>/<span title="Temporary Duty">Temporary Duty</span></h3>
        <hr>
        @include('armies.details')

        @if(request()->has('redirect'))
            {{ Form::open(['route' => ['duties.store',$army->id,'redirect='.request()->redirect], 'novalidate']) }}
        @else
            {{ Form::open(['route' => ['duties.store', $army->id], 'novalidate']) }}
        @endif

        <div class="card mb-2">
            <div class="card-body pb-0 pt-2">

                <div class="form-group mb-2">
                    {!! Form::label('from', 'Date from') !!}
                    {!! Form::date('from', null,[
                    'class' => 'form-control ' . ($errors->has('from') ? 'is-invalid' : ''),
                    'required',
                    ]) !!}
                    <div class="invalid-feedback">{{ $errors->first('from') }}</div>
                </div>

                <div class="form-group mb-2">
                    {!! Form::label('to', 'Date to') !!}
                    {!! Form::date('to', null,[
                    'class' => 'form-control ' . ($errors->has('to') ? 'is-invalid' : ''),
                    'required',
                    ]) !!}
                    <div class="invalid-feedback">{{ $errors->first('to') }}</div>
                </div>

                <div class="form-group mb-2">
                    {!! Form::label('type', 'Select Duties Type') !!}
                    {!! Form::select('type', $dutiesType,
                    null,[
                    'class' => 'form-control ' . ($errors->has('type') ? 'is-invalid' : ''),
                    'placeholder' => 'Select Leave Type',
                    'required'
                    ]) !!}
                    <div class="invalid-feedback">{{ $errors->first('type') }}</div>
                </div>

                <div class="form-group mb-2">
                    {!! Form::label('loc', 'Location') !!}
                    {!! Form::text('loc',null,[
                    'class' => 'form-control ' . ($errors->has('loc') ? 'is-invalid' : ''),
                    'placeholder' => 'location',
                    'required'
                    ]) !!}
                    <div class="invalid-feedback">{{ $errors->first('loc') }}</div>
                </div>

                <div class="form-group mb-2" id="descriptionSection">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::textarea('description',null,[
                    'class' => 'form-control ' . ($errors->has('description') ? 'is-invalid' : ''),
                    'placeholder' => 'Enter descriptions here',
                    ]) !!}
                    <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                </div>

            </div>
        </div>

        <div class="d-flex justify-content-between">
            @if(request()->get('redirect'))
                <a href="{{ request()->get('redirect') }}" class="btn btn-secondary">Back</a>
            @else
                <a href="{{ route('home') }}" class="btn btn-secondary">Home</a>
            @endif
            {{ Form::submit('Add', ['class' => 'btn btn-success px-4']) }}
        </div>
        {{ Form::close() }}

    </div>

@endsection
@section('script')
    <script>
        $('#descriptionSection').on('change keyup keydown paste cut', 'textarea', function () {
            $(this).height(0).height(this.scrollHeight);
        }).find('textarea').change();
    </script>
@endsection
