@php
    $leavesType = \App\Enums\LeaveType::toSelectArray();
@endphp


@if(request()->has('redirect'))
    {{ Form::open(array('route' => array('leaves.store', $army->id, 'redirect' => request()->get('redirect')), 'novalidate')) }}
@else
    {{ Form::open(array('route' => array('leaves.store', $army->id), 'novalidate')) }}
@endif

<div class="form-group mb-2">
    {!! Form::label('from', 'Leave From') !!}
    {!! Form::date('from',null,[
    'class' => 'form-control ' . ($errors->has('from') ? 'is-invalid' : ''),
    'required'
    ]) !!}
    <div class="invalid-feedback">{{ $errors->first('from') }}</div>
</div>
<div class="form-group  mb-2">
    {!! Form::label('to', 'Leave To') !!}
    {!! Form::date('to',null,[
    'class' => 'form-control ' . ($errors->has('to') ? 'is-invalid' : ''),
    'required'
    ]) !!}
    <div class="invalid-feedback">{{ $errors->first('to') }}</div>
</div>
<div class="form-group mb-2">
    {!! Form::label('type', 'Leave Type') !!}
    {!! Form::select('type', $leavesType,
    null,[
    'class' => 'form-control ' . ($errors->has('type') ? 'is-invalid' : ''),
    'placeholder' => 'Select Leave Type',
    'required'
    ]) !!}
    <div class="invalid-feedback">{{ $errors->first('type') }}</div>
</div>

<div class="d-flex justify-content-between mt-4 mb-2">
    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
    {{ Form::submit('Add', array('class' => 'btn btn-primary px-4')) }}
</div>

{{ Form::close() }}
