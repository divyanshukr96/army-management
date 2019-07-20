@extends('layouts.app')

@section('title', '| Add Army')

@section('content')
    <div class="col-lg-10 offset-lg-1">

        <h3><i class='fa fa-user' style="font-size: large"></i> Add Army</h3>
        <hr>

        {{ Form::open(['route' => 'armies.store', 'novalidate', 'files' => true]) }}

        <div class="card mb-2">
            <div class="card-body pb-0 pt-3">
                <div class="form-row">
                    <div class="col-md-3 mb-2">
                        {!! Form::label('regd_no', 'Army No.') !!}
                        {!! Form::text('regd_no',null,[
                        'class' => 'form-control ' . ($errors->has('regd_no') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter registration number',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('regd_no') }}</div>
                    </div>

                    <div class="col-md-3 mb-2">
                        {!! Form::label('id_card_no') !!}
                        {!! Form::text('id_card_no',null,[
                        'class' => 'form-control ' . ($errors->has('id_card_no') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter Id Card No',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('id_card_no') }}</div>
                    </div>

                    <div class="col-md-3 mb-2">
                        {!! Form::label('rank', null) !!}
                        {!! Form::text('rank',null,[
                        'class' => 'form-control ' . ($errors->has('rank') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter rank',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('rank') }}</div>
                    </div>
                    <div class="col-md-3 mb-2 ">
                        {!! Form::label('doe', 'Date of Enrolment') !!}
                        {!! Form::date('doe',null,[
                        'class' => 'form-control ' . ($errors->has('doe') ? 'is-invalid' : ''),
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('doe') }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-header py-2">
                <h4 class="mb-0 font-weight-bold">Personal Details</h4>
            </div>
            <div class="card-body pb-0 pt-2">
                <div class="form-row">
                    <div class="col-md-4 mb-2">
                        {!! Form::label('name', null) !!}
                        {!! Form::text('name',null,[
                        'class' => 'form-control ' . ($errors->has('name') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter full name',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                    </div>

                    <div class="col-md-4 mb-2">
                        {!! Form::label('email', null) !!}
                        {!! Form::email('email',null,[
                        'class' => 'form-control ' . ($errors->has('email') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter email address',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                    </div>

                    <div class="col-md-4 mb-2">
                        {!! Form::label('mobile', null) !!}
                        {!! Form::text('mobile',null,[
                        'class' => 'form-control ' . ($errors->has('mobile') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter mobile number',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('mobile') }}</div>
                    </div>

                    <div class="col-md-3 mb-2 ">
                        {!! Form::label('dob', 'Date of Birth') !!}
                        {!! Form::date('dob', null,[
                        'class' => 'form-control ' . ($errors->has('dob') ? 'is-invalid' : ''),
                        'required',
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('dob') }}</div>
                    </div>

                    <div class="col-md-3 mb-2">
                        {!! Form::label('blood_group') !!}
                        {!! Form::select('blood_group', $options['blood_group'],
                        null,[
                        'class' => 'form-control ' . ($errors->has('blood_group') ? 'is-invalid' : ''),
                        'placeholder' => 'Select Blood group',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('blood_group') }}</div>
                    </div>

                    <div class="col-md-3 mb-2">
                        {!! Form::label('religion') !!}
                        {!! Form::select('religion', $options['religion'],
                        null,[
                        'class' => 'form-control ' . ($errors->has('religion') ? 'is-invalid' : ''),
                        'placeholder' => 'Select religion',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('religion') }}</div>
                    </div>
                    <div class="col-md-3 mb-2">
                        {!! Form::label('caste') !!}
                        {!! Form::text('caste',null,[
                        'class' => 'form-control ' . ($errors->has('caste') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter Caste',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('caste') }}</div>
                    </div>

                    <div class="col-md-3 mb-2">
                        {!! Form::label('marital_status') !!}
                        {!! Form::select('marital_status', $options['marital_status'],
                        null,[
                        'class' => 'form-control ' . ($errors->has('marital_status') ? 'is-invalid' : ''),
                        'placeholder' => 'Select marital status',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('marital_status') }}</div>
                    </div>
                    <div class="col-md-3 mb-2">
                        {!! Form::label('mother_tongue') !!}
                        {!! Form::text('mother_tongue',null,[
                        'class' => 'form-control ' . ($errors->has('mother_tongue') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter Mother Tongue language',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('mother_tongue') }}</div>
                    </div>

                    <div class="col-md-3 mb-2">
                        {!! Form::label('medical', 'Medical category') !!}
                        {!! Form::text('medical',null,[
                        'class' => 'form-control ' . ($errors->has('medical') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter Medical Category',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('medical') }}</div>
                    </div>
                    <div class="col-md-3 mb-2 ">
                        {!! Form::label('education', null) !!}
                        {!! Form::text('education',null,[
                        'class' => 'form-control ' . ($errors->has('education') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter Civil Education',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('education') }}</div>
                    </div>

                    <div class="col-md-3 mb-2">
                        {!! Form::label('nrs', 'Nearest Railway Station') !!}
                        {!! Form::text('nrs',null,[
                        'class' => 'form-control ' . ($errors->has('nrs') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter Nearest Railway Station',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('nrs') }}</div>
                    </div>

                    {{--                     Address field here --}}

                    <div class="col-md-3 mb-2">
                        {!! Form::label('state') !!}
                        {!! Form::text('state',null,[
                        'class' => 'form-control ' . ($errors->has('state') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter State',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('state') }}</div>
                    </div>
                    <div class="col-md-3 mb-2">
                        {!! Form::label('district') !!}
                        {!! Form::text('district',null,[
                        'class' => 'form-control ' . ($errors->has('district') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter District',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('district') }}</div>
                    </div>
                    <div class="col-md-3 mb-2">
                        {!! Form::label('pin_code') !!}
                        {!! Form::text('pin_code',null,[
                        'class' => 'form-control ' . ($errors->has('pin_code') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter Pin Code',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('pin_code') }}</div>
                    </div>
                    <div class="col-md-6 mb-2">
                        {!! Form::label('address') !!}
                        {!! Form::textarea('address',null,[
                        'class' => 'form-control ' . ($errors->has('address') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter Address',
                        'rows' => 3,
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('address') }}</div>
                    </div>

                </div>
            </div>
        </div>



        <div class="card mb-2">
            <div class="card-body pb-0 pt-2">
                <h6 class="font-weight-bold border-bottom pb-2">NOK Details</h6>
                <div class="form-row">
                    <div class="col-md-4 mb-2">
                        {!! Form::label('nok_name', 'NOK Name') !!}
                        {!! Form::text('nok_name',null,[
                        'class' => 'form-control ' . ($errors->has('nok_name') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter NOK Name',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('nok_name') }}</div>
                    </div>

                    <div class="col-md-4 mb-2">
                        {!! Form::label('nok_relation','NOK Relation') !!}
                        {!! Form::text('nok_relation',null,[
                        'class' => 'form-control ' . ($errors->has('nok_relation') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter NOK Relation',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('nok_relation') }}</div>
                    </div>

                    <div class="col-md-4 mb-2">
                        {!! Form::label('nok_mobile', 'NOK Mobile') !!}
                        {!! Form::text('nok_mobile',null,[
                        'class' => 'form-control ' . ($errors->has('nok_mobile') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter NOK Mobile',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('nok_mobile') }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-2 ml-md-4">
            {!! Form::label('image', 'Profile Images', ['class' => 'mr-2']) !!}
            {!! Form::file('image',[
            'class' => 'input-file input-file-secondary focus-none ' . ($errors->has('image') ? 'is-invalid' : ''),
            'required'
            ]) !!}
            <div class="invalid-feedback">{{ $errors->first('image') }}</div>
        </div>

        {{ Form::submit('Add & Proceed', ['class' => 'btn btn-success float-right mt-2']) }}
        {{ Form::close() }}
    </div>

@endsection
