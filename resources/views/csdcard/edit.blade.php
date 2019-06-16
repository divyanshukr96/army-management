@extends('layouts.app')

@section('title', '| Edit User')

@section('content')

    <div class='col-lg-4 offset-lg-4'>

        <h3><i class='fa fa-user-plus' style="font-size: large"></i> Edit CSD Card</h3>
        <hr>
        @include('armies.details')

        <div class="border p-2">

            @if(request()->has('redirect'))
                {{ Form::model($card, array('route' => array('card.update', $army->id, $card->id, 'redirect' => request()->get('redirect')), 'method' => 'PUT')) }}
            @else
                {{ Form::model($card, array('route' => array('card.update', $army->id, $card->id), 'method' => 'PUT')) }}
            @endif

            <div class="form-group mb-2">
                {{ Form::label('grocery') }}
                {{ Form::text('grocery', null, array('class' => 'form-control '.($errors->has('grocery') ? 'is-invalid' : ''),
                'placeholder' => 'Enter Grocery Card no',
                )) }}
                <div class="invalid-feedback">{{ $errors->first('grocery') }}</div>
            </div>

            <div class="form-group mb-2">
                {{ Form::label('liquor') }}
                {{ Form::text('liquor', null, array('class' => 'form-control '.($errors->has('liquor') ? 'is-invalid' : ''),
                'placeholder' => 'Enter Liquor Card no',
                )) }}
                <div class="invalid-feedback">{{ $errors->first('liquor') }}</div>
            </div>


            <div class="d-flex justify-content-between mt-4 mb-2">
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                {{ Form::submit('Update', array('class' => 'btn btn-primary px-4')) }}
            </div>

            {{ Form::close() }}
        </div>

    </div>

@endsection
