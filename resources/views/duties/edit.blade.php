@php
    $dutiesType = \App\Enums\OtherLeaveType::toSelectArray();
@endphp

@extends('layouts.app')

@section('title', '| Edit Leave')

@section('content')

    <div class='col-lg-4 offset-lg-4'>

        <h3><i class='fa fa-user-plus' style="font-size: large"></i> Edit Leave Detail</h3>
        <hr>
        @include('armies.details', ['army' => $duty->army])

        <div class="border p-2">

            @if(request()->has('redirect'))
                {{ Form::model($duty, array('route' => array('duties.update', $duty->id, 'redirect' => request()->get('redirect')), 'method' => 'PUT')) }}
            @else
                {{ Form::model($duty, array('route' => array('duties.update', $duty->id), 'method' => 'PUT')) }}
            @endif

            <div class="form-group mb-2">
                {{ Form::label('from', 'Date From') }}
                {{ Form::date('from', null, array('class' => 'form-control '.($errors->has('from') ? 'is-invalid' : ''),)) }}
                <div class="invalid-feedback">{{ $errors->first('from') }}</div>
            </div>

            <div class="form-group mb-2">
                {{ Form::label('to', 'Date to') }}
                {{ Form::date('to', null, array('class' => 'form-control '.($errors->has('to') ? 'is-invalid' : ''))) }}
                <div class="invalid-feedback">{{ $errors->first('to') }}</div>
            </div>

            <div class="form-group mb-2">
                {!! Form::label('type', 'Select Duties Type') !!}
                {!! Form::select('type', $dutiesType, $duty->type->value,[
               'class' => 'form-control ' . ($errors->has('type') ? 'is-invalid' : ''),
               'placeholder' => 'Select Leave Type'
               ]) !!}
                <div class="invalid-feedback">{{ $errors->first('type') }}</div>
            </div>

            <div class="form-group mb-2">
                {!! Form::label('loc', 'Location') !!}
                {!! Form::text('loc',null,['class' => 'form-control ' . ($errors->has('loc') ? 'is-invalid' : '')]) !!}
                <div class="invalid-feedback">{{ $errors->first('loc') }}</div>
            </div>

            <div class="form-group mb-2" id="descriptionSection">
                {!! Form::label('description') !!}
                {!! Form::textarea('description',null,['class' => 'form-control ' . ($errors->has('description') ? 'is-invalid' : '')]) !!}
                <div class="invalid-feedback">{{ $errors->first('description') }}</div>
            </div>

            <div class="d-flex justify-content-between mt-4 mb-2">
                <a href="{{ request()->get('redirect')?: url()->previous() }}" class="btn btn-secondary">Back</a>
                {{ Form::submit('Update', array('class' => 'btn btn-primary px-4')) }}
            </div>

            {{ Form::close() }}
        </div>

    </div>

@endsection

@section('script')
    <script>
        $('#descriptionSection').on('change keyup keydown paste cut', 'textarea', function () {
            $(this).height(0).height(this.scrollHeight);
        }).find('textarea').change();
    </script>
@endsection
