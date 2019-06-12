@extends('layouts.app')
@section('content')
    <div class="container px-0">
        @include('add.include.details')

        {{ Form::open(['route' => 'document.store', 'novalidate', 'files' => true]) }}
        <div class="card mb-2">
            <div class="card-header py-2">
                <h4 class="mb-0 font-weight-bold">Document Details</h4>
            </div>
            <div class="card-body pb-0 pt-2">
                <div class="mb-2">
                    @foreach($army->document as $doc)
                        <div class="font-weight-bold border-bottom pb-1">{{$doc->type->value}}</div>
                        <div class="row mb-2">
                            <div class="col-12 col-sm-8 pt-2">
                                <span class="pr-3">Card No. </span>: {{$doc->document_no}}</div>
                            <div class="col-12 col-sm-4 pt-1 text-truncate"><a href="#">{{$doc->image}}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr style="margin: 1.1rem -1.2rem .5rem; border-top-width: 2px">
                <div class="form-row ">
                    <div class="col-md-3 mb-2">
                        {!! Form::label('type', 'Document Type') !!}
                        {!! Form::select('type', $options['document'],
                        null,[
                        'class' => 'form-control ' . ($errors->has('type') ? 'is-invalid' : ''),
                        'placeholder' => 'Select Document Type',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('type') }}</div>
                    </div>
                    <div class="col-md-4 mb-2">
                        {!! Form::label('document_no', null) !!}
                        {!! Form::text('document_no',null,[
                        'class' => 'form-control ' . ($errors->has('document_no') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter document no',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('document_no') }}</div>
                    </div>
                    <div class="col-md-3 mb-2 pb-2">
                        <div class="custom-file mt-md-3">
                            {!! Form::file('image',[
                            'class' => 'custom-file-input' . ($errors->has('image') ? ' is-invalid' : ''),
                            'required'
                            ]) !!}
                            {!! Form::label('image', 'Document Image', ['class' => 'custom-file-label']) !!}
                            <div class="invalid-feedback ">{{ $errors->first('image') }}</div>
                        </div>
                    </div>
                    <div class="col-md-2 mb-2 text-right align-self-end">
                        {{ Form::submit('Upload', ['class' => 'btn btn-primary ']) }}
                    </div>
                </div>
            </div>
        </div>
        {{ Form::close() }}


        <div class="card mb-2">
            <div class="card-header py-2">
                <h4 class="mb-0 font-weight-bold">Account Details</h4>
            </div>
            <div class="card-body pb-0 pt-1">
                @if($army->account)
                    <div class="row mb-2">
                        <div class="col-12 col-sm-4 pt-2">Account Number <span class="float-right">:</span></div>
                        <div class="col-12 col-sm-8 pt-2 font-weight-bold">{{$army->account->account_no}}</div>
                        <div class="col-12 col-sm-4 pt-2">Branch Name <span class="float-right">:</span></div>
                        <div class="col-12 col-sm-8 pt-2 font-weight-bold">{{$army->account->branch_name}}</div>
                        <div class="col-12 col-sm-4 pt-2">IFSC Code <span class="float-right">:</span></div>
                        <div class="col-12 col-sm-8 pt-2 font-weight-bold">{{$army->account->ifsc}}</div>
                    </div>
                @else
                    {{ Form::open(['route' => 'account.store', 'novalidate']) }}
                    <div class="form-row">
                        <div class="col-md-4 mb-2">
                            {!! Form::label('account_no', 'Bank Account No.') !!}
                            {!! Form::text('account_no',null,[
                            'class' => 'form-control ' . ($errors->has('account_no') ? 'is-invalid' : ''),
                            'placeholder' => 'Enter account no',
                            'required'
                            ]) !!}
                            <div class="invalid-feedback">{{ $errors->first('account_no') }}</div>
                        </div>
                        <div class="col-md-4 mb-2">
                            {!! Form::label('branch_name', 'Bank Branch Name') !!}
                            {!! Form::text('branch_name',null,[
                            'class' => 'form-control ' . ($errors->has('branch_name') ? 'is-invalid' : ''),
                            'placeholder' => 'Enter bank branch name',
                            'required'
                            ]) !!}
                            <div class="invalid-feedback">{{ $errors->first('branch_name') }}</div>
                        </div>
                        <div class="col-md-4 mb-2">
                            {!! Form::label('ifsc', 'Bank IFSC Code') !!}
                            {!! Form::text('ifsc',null,[
                            'class' => 'form-control ' . ($errors->has('ifsc') ? 'is-invalid' : ''),
                            'placeholder' => 'Enter Bank IFSC Code',
                            'required'
                            ]) !!}
                            <div class="invalid-feedback">{{ $errors->first('ifsc') }}</div>
                        </div>
                        <div class="col mb-2 align-self-end text-right">
                            {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                        </div>
                    </div>
                    {{ Form::close() }}
                @endif

            </div>
        </div>


        <div class="card mb-2">
            <div class="card-header py-2">
                <h5 class="mb-0 font-weight-bold">CSD Card Details</h5>
            </div>
            <div class="card-body pb-0 pt-2">
                @if($army->csdCard)
                    <div class="row mb-2">
                        <div class="col-12 col-sm-4 pt-2">Grocery Card No. <span class="float-right">:</span></div>
                        <div class="col-12 col-sm-8 pt-2 font-weight-bold">{{$army->csdCard->grocery}}</div>
                        <div class="col-12 col-sm-4 pt-2">Liquor Card No. <span class="float-right">:</span></div>
                        <div class="col-12 col-sm-8 pt-2 font-weight-bold">{{$army->csdCard->liquor}}</div>
                    </div>
                @else
                    {{ Form::open(['route' => 'card.store', 'novalidate']) }}
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
                @endif
            </div>
        </div>


        <div class="card mb-2">
            <div class="card-header py-2">
                <h5 class="mb-0 font-weight-bold">Insurance / Policy Details</h5>
            </div>
            <div class="card-body pb-0 pt-2">
                @if(count($army->insurance) > 0)
                    @foreach($army->insurance as $insurance)
                        <div class="row mb-2">
                            <div class="col-5 col-sm-4 col-md-2 pt-2">Policy Number</div>
                            <div class="col-7 col-sm-8 col-md-4 pt-2 font-weight-bold">{{$insurance->policy_no}}</div>
                            @if($insurance->policy_name)
                                <div class="col-12 col-md-6 pt-2 ">({{$insurance->policy_name}})</div>
                            @endif
                        </div>
                    @endforeach
                    <hr style="margin: 1.1rem -1.2rem .5rem; border-top-width: 2px">
                @endif
                {{ Form::open(['route' => 'insurance.store', 'novalidate']) }}
                <div class="form-row">
                    <div class="col-md-5 mb-2">
                        {!! Form::label('policy_no', 'Insurance Policy No.') !!}
                        {!! Form::text('policy_no',null,[
                        'class' => 'form-control ' . ($errors->has('policy_no') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter Insurance Policy no',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('policy_no') }}</div>
                    </div>
                    <div class="col-md-5 mb-2">
                        {!! Form::label('policy_name', 'Insurance Policy Name') !!}
                        {!! Form::text('policy_name',null,[
                        'class' => 'form-control ' . ($errors->has('policy_name') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter Insurance Policy Name',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('policy_name') }}</div>
                    </div>
                    <div class="col-md-2 mb-2 text-right align-self-end">
                        {{ Form::submit('Add', ['class' => 'btn btn-primary ']) }}
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>


        <div class="d-flex justify-content-between">
            <a href="{{ route('add.family',session('army')) }}" class="btn btn-secondary">Back</a>
            <a href="{{ route('add.professional',session('army')) }}" class="btn btn-success">Proceed Next</a>
        </div>


    </div>
@endsection
