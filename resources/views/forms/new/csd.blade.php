{{ Form::open(['route' => ['card.store',$army->id], 'novalidate']) }}
<div class="form-row">
    <div class="col-md-5 mb-2">
        {!! Form::text('grocery',null,[
        'class' => 'form-control ' . ($errors->has('grocery') ? 'is-invalid' : ''),
        'placeholder' => 'Enter Grocery Card no',
        'required'
        ]) !!}
        <div class="invalid-feedback">{{ $errors->first('grocery') }}</div>
    </div>
    <div class="col-md-5 mb-2">
        {!! Form::text('liquor',null,[
        'class' => 'form-control ' . ($errors->has('liquor') ? 'is-invalid' : ''),
        'placeholder' => 'Enter Liquor Card no',
        'required'
        ]) !!}
        <div class="invalid-feedback">{{ $errors->first('liquor') }}</div>
    </div>

    <div class="col-md-2 mb-2 text-right">
        {{ Form::submit('Save', ['class' => 'btn btn-primary ']) }}
    </div>
</div>
{{ Form::close() }}
