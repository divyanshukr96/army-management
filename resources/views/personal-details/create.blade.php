<?php $cards = ['Aadhaar Card', 'Driving Licence', 'Pan Card'] ?>
@extends('layouts.app')
@section('content')
    <div class="container">

        {{ Form::open(['route' => 'army.store', 'novalidate', 'files' => true]) }}

        <div class="card mb-2">
            <div class="card-header py-2">
                <h4 class="mb-0 font-weight-bold">Personal Details</h4>
            </div>
            <div class="card-body pb-0">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        {!! Form::label('name', null) !!}
                        {!! Form::text('name',null,[
                        'class' => 'form-control ' . ($errors->has('name') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter full name',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                    </div>

                    <div class="col-md-6 mb-3">
                        {!! Form::label('email', null) !!}
                        {!! Form::email('email',null,[
                        'class' => 'form-control ' . ($errors->has('email') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter email address',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                    </div>
                    <div class="col-md-6 mb-3">
                        {!! Form::label('mobile', null) !!}
                        {!! Form::text('mobile',null,[
                        'class' => 'form-control ' . ($errors->has('mobile') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter mobile number',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('mobile') }}</div>
                    </div>
                    <div class="col-md-6 mb-3 form-row px-0 mx-0">
                        <div class="col-md-6 ">
                            {!! Form::label('dob', 'Date of Birth') !!}
                            {!! Form::text('dob', null,[
                            'class' => 'form-control ' . ($errors->has('dob') ? 'is-invalid' : ''),
                            'placeholder' => 'DD/MM/YYYY',
                            'required',
                            ]) !!}
                            <div class="invalid-feedback">{{ $errors->first('dob') }}</div>
                        </div>
                        <div class="col-md-6">
                            {!! Form::label('blood_group') !!}
                            {!! Form::select('blood_group', $options['blood_group'],
                            null,[
                            'class' => 'form-control ' . ($errors->has('blood_group') ? 'is-invalid' : ''),
                            'placeholder' => 'Select Blood group',
                            'required'
                            ]) !!}
                            <div class="invalid-feedback">{{ $errors->first('blood_group') }}</div>
                        </div>
                    </div>


                    <div class="col-md-6 mb-3 form-row px-0 mx-0">
                        <div class="col-md-6">
                            {!! Form::label('religion') !!}
                            {!! Form::select('religion', $options['religion'],
                            null,[
                            'class' => 'form-control ' . ($errors->has('religion') ? 'is-invalid' : ''),
                            'placeholder' => 'Select religion',
                            'required'
                            ]) !!}
                            <div class="invalid-feedback">{{ $errors->first('religion') }}</div>
                        </div>
                        <div class="col-md-6">
                            {!! Form::label('caste') !!}
                            {!! Form::text('caste',null,[
                            'class' => 'form-control ' . ($errors->has('caste') ? 'is-invalid' : ''),
                            'placeholder' => 'Enter Caste',
                            'required'
                            ]) !!}
                            <div class="invalid-feedback">{{ $errors->first('caste') }}</div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3 form-row px-0 mx-0">
                        <div class="col-md-6">
                            {!! Form::label('marital_status') !!}
                            {!! Form::select('marital_status', $options['marital_status'],
                            null,[
                            'class' => 'form-control ' . ($errors->has('marital_status') ? 'is-invalid' : ''),
                            'placeholder' => 'Select marital status',
                            'required'
                            ]) !!}
                            <div class="invalid-feedback">{{ $errors->first('marital_status') }}</div>
                        </div>
                        <div class="col-md-6">
                            {!! Form::label('mother_tongue') !!}
                            {!! Form::text('mother_tongue',null,[
                            'class' => 'form-control ' . ($errors->has('mother_tongue') ? 'is-invalid' : ''),
                            'placeholder' => 'Enter Mother Tongue language',
                            'required'
                            ]) !!}
                            <div class="invalid-feedback">{{ $errors->first('mother_tongue') }}</div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3 form-row px-0 mx-0">
                        <div class="col-md-6">
                            {!! Form::label('medical', 'Medical category') !!}
                            {!! Form::text('medical',null,[
                            'class' => 'form-control ' . ($errors->has('medical') ? 'is-invalid' : ''),
                            'placeholder' => 'Enter Medical Category',
                            'required'
                            ]) !!}
                            <div class="invalid-feedback">{{ $errors->first('medical') }}</div>
                        </div>
                        <div class="col-md-6 ">
                            {!! Form::label('education', null) !!}
                            {!! Form::text('education',null,[
                            'class' => 'form-control ' . ($errors->has('education') ? 'is-invalid' : ''),
                            'placeholder' => 'Enter Civil Education',
                            'required'
                            ]) !!}
                            <div class="invalid-feedback">{{ $errors->first('education') }}</div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        {!! Form::label('nrs', 'Nearest Railway Station') !!}
                        {!! Form::text('nrs',null,[
                        'class' => 'form-control ' . ($errors->has('nrs') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter Nearest Railway Station',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('nrs') }}</div>
                    </div>

                    {{--                    <fieldset class="col-12 border border-secondary rounded">--}}
                    {{--                        <legend class="px-2" style="width: auto; font-size: 1.2rem">--}}
                    {{--                            <strong>Home Address</strong>--}}
                    {{--                        </legend>--}}
                    {{--                        <div class="col-md-6 mb-3">--}}
                    {{--                            {!! Form::label('address', 'Home Address') !!}--}}
                    {{--                            {!! Form::textarea('address',null,[--}}
                    {{--                            'class' => 'form-control ' . ($errors->has('address') ? 'is-invalid' : ''),--}}
                    {{--                            'placeholder' => 'Enter Home Address',--}}
                    {{--                            'rows' => '3', 'cols' => '',--}}
                    {{--                            'required'--}}
                    {{--                            ]) !!}--}}
                    {{--                            <div class="invalid-feedback">{{ $errors->first('address') }}</div>--}}
                    {{--                        </div>--}}
                    {{--                    </fieldset>--}}


                </div>
            </div>
        </div>

        <div class="card mb-2">
            {{--            <div class="card-header py-2">--}}
            {{--                <h4 class="mb-0 font-weight-bold">Personal Details</h4>--}}
            {{--            </div>--}}
            <div class="card-body pb-0 pt-3">
                <div class="form-row">

                    <div class="col-md-6 mb-3 form-row px-0 mx-0">
                        <div class="col-md-6">
                            {!! Form::label('regd_no', 'Registration No.') !!}
                            {!! Form::text('regd_no',null,[
                            'class' => 'form-control ' . ($errors->has('regd_no') ? 'is-invalid' : ''),
                            'placeholder' => 'Enter registration number',
                            'required'
                            ]) !!}
                            <div class="invalid-feedback">{{ $errors->first('regd_no') }}</div>
                        </div>

                        <div class="col-md-6">
                            {!! Form::label('id_card_no') !!}
                            {!! Form::text('id_card_no',null,[
                            'class' => 'form-control ' . ($errors->has('id_card_no') ? 'is-invalid' : ''),
                            'placeholder' => 'Enter Id Card No',
                            'required'
                            ]) !!}
                            <div class="invalid-feedback">{{ $errors->first('id_card_no') }}</div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3 form-row px-0 mx-0">
                        <div class="col-md-6">
                            {!! Form::label('rank', null) !!}
                            {!! Form::text('rank',null,[
                            'class' => 'form-control ' . ($errors->has('rank') ? 'is-invalid' : ''),
                            'placeholder' => 'Enter rank',
                            'required'
                            ]) !!}
                            <div class="invalid-feedback">{{ $errors->first('rank') }}</div>
                        </div>

                        <div class="col-md-6 ">
                            {!! Form::label('doe', 'Date of Enrolment') !!}
                            {!! Form::text('doe',null,[
                            'class' => 'form-control ' . ($errors->has('doe') ? 'is-invalid' : ''),
                            'placeholder' => 'DD/MM/YYYY',
                            'required'
                            ]) !!}
                            <div class="invalid-feedback">{{ $errors->first('doe') }}</div>
                        </div>
                    </div>


                </div>
            </div>
        </div>


        {{--        <div class="col-md-6 mb-3">--}}
        {{--            {!! Form::label('account_no') !!}--}}
        {{--            {!! Form::text('account_no',null,[--}}
        {{--            'class' => 'form-control ' . ($errors->has('account_no') ? 'is-invalid' : ''),--}}
        {{--            'placeholder' => 'Enter Account No',--}}
        {{--            'required'--}}
        {{--            ]) !!}--}}
        {{--            <div class="invalid-feedback">{{ $errors->first('account_no') }}</div>--}}
        {{--        </div>--}}


        {{--        {{ Form::text("username1",--}}
        {{--             old("username") ? old("username") : (!empty($user) ? $user->username : null),--}}
        {{--             [--}}
        {{--                "class" => "form-control user-email",--}}
        {{--                "placeholder" => "Username",--}}
        {{--             ])--}}
        {{--}}--}}

        {{--        {!! Form::label('branch[]', 'Branch') !!}--}}
        {{--        {!! Form::text('branch[]',null,array('class' => 'validate ' . ($errors->has('branch.'.$i) ? 'invalid' : ''))) !!}--}}
        {{--        <span class="red-text">{{ $errors->first('branch.'.$i) }}</span>--}}
        {{--    </div>--}}

        @foreach($cards as  $key => $card )
            <div class="col-md-6 mb-3 form-row px-0 mx-0 d-none">
                {!! Form::hidden('type[]', $card) !!}
                <div class="col-md-7 ">
                    {!! Form::label('document_no[]', $card.' No.') !!}
                    {!! Form::text('document_no[]',null,[
                    'class' => 'form-control ' . ($errors->has('document_no.'.$key) ? 'is-invalid' : ''),
                    'placeholder' => 'Enter '.$card.' No.',
                    'required'
                    ]) !!}
                    <div class="invalid-feedback">{{ $errors->first('document_no.'.$key) }}</div>
                </div>
                <div class="col-md-5 custom-file align-self-end">
                    {!! Form::file('image[]',[
                    'class' => 'custom-file-input' . ($errors->has('image.'.$key) ? 'is-invalid' : ''),
                    'required'
                    ]) !!}
                    {!! Form::label('image[]', 'Select', ['class' => 'custom-file-label mr-2']) !!}
                    <div class="invalid-feedback">{{ $errors->first('image.'.$key) }}</div>
                </div>
            </div>
        @endforeach

        <div class="mb-2 ml-4">
            {!! Form::label('image', 'Profile Images', ['class' => 'mr-2']) !!}
            {!! Form::file('image',[
            'class' => 'input-file input-file-secondary focus-none ' . ($errors->has('image') ? 'is-invalid' : ''),
            'required'
            ]) !!}
            <div class="invalid-feedback">{{ $errors->first('image') }}</div>
        </div>

        {{ Form::submit('Add User', ['class' => 'btn btn-success float-right']) }}
        {{ Form::close() }}
    </div>
@endsection
