@extends('layouts.app')

@section('title', '| Edit User')

@section('content')

    <div class="row justify-content-center">
        <div class='col-lg-10'>

            <h3><i class='fa fa-user-plus' style="font-size: large"></i> Edit Personal Detail</h3>
            <hr>
            @include('armies.details')

            <div class="border p-2 mb-5">

                @if(request()->has('redirect'))
                    {{ Form::model($army, array('route' => array('armies.update', $army->id, 'redirect' => request()->get('redirect')), 'method' => 'PUT')) }}
                @else
                    {{ Form::model($army, array('route' => array('armies.update', $army->id), 'method' => 'PUT')) }}
                @endif


                    <div class="form-row">
                        <div class="col-md-4 mb-2">
                            {!! Form::label('name', null) !!}
                            {!! Form::text('name',null,[
                            'class' => 'form-control ' . ($errors->has('name') ? 'is-invalid' : ''),
                            'placeholder' => 'Enter full name',
                            ]) !!}
                            <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                        </div>

                        <div class="col-md-4 mb-2">
                            {!! Form::label('email', null) !!}
                            {!! Form::email('email',null,[
                            'class' => 'form-control ' . ($errors->has('email') ? 'is-invalid' : ''),
                            'placeholder' => 'Enter email address',
                            ]) !!}
                            <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                        </div>

                        <div class="col-md-4 mb-2">
                            {!! Form::label('mobile', null) !!}
                            {!! Form::text('mobile',null,[
                            'class' => 'form-control ' . ($errors->has('mobile') ? 'is-invalid' : ''),
                            'placeholder' => 'Enter mobile number',
                            ]) !!}
                            <span class="invalid-feedback">{{ $errors->first('mobile') }}</span>
                        </div>

                        <div class="col-md-3 mb-2 ">
                            {!! Form::label('dob', 'Date of Birth') !!}
                            {!! Form::date('dob', date('Y-m-d', strtotime($army->dob)),[
                            'class' => 'form-control ' . ($errors->has('dob') ? 'is-invalid' : ''),
                            ]) !!}
                            <span class="invalid-feedback">{{ $errors->first('dob') }}</span>
                        </div>

                        <div class="col-md-3 mb-2">
                            {!! Form::label('blood_group') !!}
                            {!! Form::select('blood_group', $options['blood_group'],
                            $army->blood_group->value,[
                            'class' => 'form-control ' . ($errors->has('blood_group') ? 'is-invalid' : ''),
                            'placeholder' => 'Select Blood group',
                            ]) !!}
                            <span class="invalid-feedback">{{ $errors->first('blood_group') }}</span>
                        </div>

                        <div class="col-md-3 mb-2">
                            {!! Form::label('religion') !!}
                            {!! Form::select('religion', $options['religion'],
                            $army->religion->value,[
                            'class' => 'form-control ' . ($errors->has('religion') ? 'is-invalid' : ''),
                            'placeholder' => 'Select religion',
                            ]) !!}
                            <span class="invalid-feedback">{{ $errors->first('religion') }}</span>
                        </div>
                        <div class="col-md-3 mb-2">
                            {!! Form::label('caste') !!}
                            {!! Form::text('caste',null,[
                            'class' => 'form-control ' . ($errors->has('caste') ? 'is-invalid' : ''),
                            'placeholder' => 'Enter Caste',
                            ]) !!}
                            <span class="invalid-feedback">{{ $errors->first('caste') }}</span>
                        </div>

                        <div class="col-md-3 mb-2">
                            {!! Form::label('marital_status') !!}
                            {!! Form::select('marital_status', $options['marital_status'],
                            $army->marital_status->value,[
                            'class' => 'form-control ' . ($errors->has('marital_status') ? 'is-invalid' : ''),
                            'placeholder' => 'Select marital status',
                            ]) !!}
                            <span class="invalid-feedback">{{ $errors->first('marital_status') }}</span>
                        </div>
                        <div class="col-md-3 mb-2">
                            {!! Form::label('mother_tongue') !!}
                            {!! Form::text('mother_tongue',null,[
                            'class' => 'form-control ' . ($errors->has('mother_tongue') ? 'is-invalid' : ''),
                            'placeholder' => 'Enter Mother Tongue language',
                            ]) !!}
                            <span class="invalid-feedback">{{ $errors->first('mother_tongue') }}</span>
                        </div>

                        <div class="col-md-3 mb-2">
                            {!! Form::label('medical', 'Medical category') !!}
                            {!! Form::text('medical',null,[
                            'class' => 'form-control ' . ($errors->has('medical') ? 'is-invalid' : ''),
                            'placeholder' => 'Enter Medical Category',
                            ]) !!}
                            <span class="invalid-feedback">{{ $errors->first('medical') }}</span>
                        </div>
                        <div class="col-md-3 mb-2 ">
                            {!! Form::label('education', null) !!}
                            {!! Form::text('education',null,[
                            'class' => 'form-control ' . ($errors->has('education') ? 'is-invalid' : ''),
                            'placeholder' => 'Enter Civil Education',
                            ]) !!}
                            <span class="invalid-feedback">{{ $errors->first('education') }}</span>
                        </div>

                        <div class="col-md-3 mb-2">
                            {!! Form::label('nrs', 'Nearest Railway Station') !!}
                            {!! Form::text('nrs',null,[
                            'class' => 'form-control ' . ($errors->has('nrs') ? 'is-invalid' : ''),
                            'placeholder' => 'Enter Nearest Railway Station',
                            ]) !!}
                            <span class="invalid-feedback">{{ $errors->first('nrs') }}</span>
                        </div>

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
