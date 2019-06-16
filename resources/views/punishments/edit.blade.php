@extends('layouts.app')

@section('title', '| Edit User')

@section('content')

    <div class="row justify-content-center">
        <div class='col-lg-5'>

            <h3><i class='fa fa-user-plus' style="font-size: large"></i> Edit Punishment Detail</h3>
            <hr>
            @include('armies.details')

            <div class="border p-2 mb-5">

                @if(request()->has('redirect'))
                    {{ Form::model($punishment, array('route' => array('punishments.update', $army->id, $punishment->id, 'redirect' => request()->get('redirect')), 'method' => 'PUT')) }}
                @else
                    {{ Form::model($punishment, array('route' => array('punishments.update', $army->id, $punishment->id), 'method' => 'PUT')) }}
                @endif

                <div class="form-group mb-2">
                    {{ Form::label('place') }}
                    {{ Form::text('place', null, array('class' => 'form-control '.($errors->has('place') ? 'is-invalid' : ''),)) }}
                    <div class="invalid-feedback">{{ $errors->first('place') }}</div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-5 mb-2">
                        {{ Form::label('offence_date') }}
                        {{ Form::date('offence_date', date('Y-m-d', strtotime($punishment->offence_date)), array('class' => 'form-control '.($errors->has('offence_date') ? 'is-invalid' : ''),)) }}
                        <div class="invalid-feedback">{{ $errors->first('offence_date') }}</div>
                    </div>

                    <div class="form-group col-md-7 mb-2">
                        {{ Form::label('rank') }}
                        {{ Form::text('rank', null, array('class' => 'form-control '.($errors->has('rank') ? 'is-invalid' : ''),)) }}
                        <div class="invalid-feedback">{{ $errors->first('rank') }}</div>
                    </div>
                </div>

                <div class="form-group mb-2">
                    {{ Form::label('witness') }}
                    {{ Form::text('witness', null, array('class' => 'form-control '.($errors->has('witness') ? 'is-invalid' : ''),)) }}
                    <div class="invalid-feedback">{{ $errors->first('witness') }}</div>
                </div>

                <div class="form-group mb-2">
                    {{ Form::label('punishment') }}
                    {{ Form::text('punishment', null, array('class' => 'form-control '.($errors->has('punishment') ? 'is-invalid' : ''),)) }}
                    <div class="invalid-feedback">{{ $errors->first('punishment') }}</div>
                </div>

               <div class="form-row">
                   <div class="form-group col-md-5 mb-2">
                       {{ Form::label('order_date') }}
                       {{ Form::date('order_date', date('Y-m-d', strtotime($punishment->order_date)), array('class' => 'form-control '.($errors->has('order_date') ? 'is-invalid' : ''),)) }}
                       <div class="invalid-feedback">{{ $errors->first('order_date') }}</div>
                   </div>

                   <div class="form-group col-md-7 mb-2">
                       {{ Form::label('by_whom') }}
                       {{ Form::text('by_whom', null, array('class' => 'form-control '.($errors->has('by_whom') ? 'is-invalid' : ''),)) }}
                       <div class="invalid-feedback">{{ $errors->first('by_whom') }}</div>
                   </div>
               </div>

                <div class="form-group mb-2">
                    {{ Form::label('offence') }}
                    {{ Form::textarea('offence', null, array('class' => 'form-control '.($errors->has('offence') ? 'is-invalid' : ''), 'rows' => '5')) }}
                    <div class="invalid-feedback">{{ $errors->first('offence') }}</div>
                </div>

                <div class="form-group mb-2">
                    {{ Form::label('remark') }}
                    {{ Form::textarea('remark', null, array('class' => 'form-control '.($errors->has('remark') ? 'is-invalid' : ''), 'rows' => '5')) }}
                    <div class="invalid-feedback">{{ $errors->first('remark') }}</div>
                </div>



                <div class="d-flex justify-content-between mt-4 mb-2">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                    {{ Form::submit('Update', array('class' => 'btn btn-primary px-4')) }}
                </div>

                {{ Form::close() }}
            </div>

        </div>
    </div>

@endsection
