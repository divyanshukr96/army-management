{{ Form::open(['route' => ['sarpanch.store', $army->id], 'novalidate']) }}
<div class="form-row">
    <div class="col-md-4 mb-2">
        {!! Form::label('name', 'Sarpanch Name') !!}
        {!! Form::text('name',null,[
        'class' => 'form-control ' . ($errors->has('name') ? 'is-invalid' : ''),
        'placeholder' => 'Enter Sarpanch Name',
        'required'
        ]) !!}
        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
    </div>
    <div class="col-md-4 mb-2">
        {!! Form::label('mobile', 'Mobile No.') !!}
        {!! Form::text('mobile',null,[
        'class' => 'form-control ' . ($errors->has('mobile') ? 'is-invalid' : ''),
        'placeholder' => 'Enter Sarpanch Mobile No.',
        'required'
        ]) !!}
        <div class="invalid-feedback">{{ $errors->first('mobile') }}</div>
    </div>

    <div class="col mb-2 mt-md-4 pt-md-1">
        {{ Form::submit('Save', ['class' => 'btn btn-primary px-3']) }}
    </div>
</div>
{{ Form::close() }}
