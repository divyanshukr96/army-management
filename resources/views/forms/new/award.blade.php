{{ Form::open(['route' => ['awards.store', $army->id], 'novalidate']) }}
<div class="form-row">
    <div class="col-md-6 mb-2">
        {!! Form::label('title', 'Award & Honour Title') !!}
        {!! Form::text('title',null,[
        'class' => 'form-control ' . ($errors->has('title') ? 'is-invalid' : ''),
        'placeholder' => 'Enter Award & Honour Title',
        'required'
        ]) !!}
        <div class="invalid-feedback">{{ $errors->first('title') }}</div>
    </div>
    <div class="col-md-2 mb-2 text-right align-self-en pt-md-4">
        {{ Form::submit('Add', ['class' => 'btn btn-primary mt-md-1']) }}
    </div>
</div>
{{ Form::close() }}
