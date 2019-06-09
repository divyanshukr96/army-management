<?php $cards = ['Aadhaar Card', 'Driving Licence', 'Pan Card'] ?>
<?php $wife = old('relation') == \App\Enums\RelationType::Wife ?>
<?php $child = old('relation') == \App\Enums\RelationType::Children ?>
@extends('layouts.app')
@section('content')
    <div class="container px-0">
        <div class="accordion mt-3" id="army-detail">
            <div class="card mb-2 border-bottom">
                <div class="card-header py-2" id="personalHeading">
                    <button class="btn btn-link float-right p-0 more " style="line-height: unset" type="button"
                            data-toggle="collapse" data-target="#personal-details" aria-expanded="true"
                            aria-controls="personal-details">
                        <span style="opacity: 0">More</span>
                    </button>
                    <h4 class="mb-0 font-weight-bold">Personal Details</h4>
                </div>
                <div class="collapse show" id="personal-details" aria-labelledby="personalHeading"
                     data-parent="#army-detail">
                    <div class="card-body py-2 form-group-mb-0">
                        @includeWhen(true, 'family-details.detail', ['army' => $army])
                    </div>
                </div>
            </div>

            <div class="card mb-2 border-bottom">
                <div class="card-header py-2" id="familyHeading">
                    <button class="btn btn-link float-right toggle" style="line-height: unset" type="button"
                            data-toggle="collapse" data-target="#family-details" aria-expanded="true"
                            aria-controls="family-details" title="Hide/Show">
                    </button>
                    <h4 class="mb-0 font-weight-bold">Family Details</h4>
                </div>
                <div class="collapse " id="family-details" aria-labelledby="familyHeading"
                     data-parent="#army-detail">
                    <div class="card-body pb-2 pt-3 form-group-mb-0">
                        @includeWhen(count($family->father) > 0,'family-details.family-details',['data' => $family->father, 'relation' => 'Father'])
                        @includeWhen(count($family->mother) > 0,'family-details.family-details',['data' => $family->mother, 'relation' => 'Mother'])
                        @includeWhen(count($family->wife) > 0,'family-details.family-details',['data' => $family->wife, 'relation' => 'Wife'])
                        @includeWhen(count($family->children) > 0,'family-details.family-details',['data' => $family->children, 'relation' => 'Children'])
                        <div class="text-right pt-3">
                            <a class="btn btn-primary btn-sm" href="#" role="button">Add family details</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-2 border-bottom">
                <div class="card-header py-2" id="documentHeading">
                    <button class="btn btn-link float-right toggle" style="line-height: unset" type="button"
                            data-toggle="collapse" data-target="#document-details" aria-expanded="true"
                            aria-controls="document-details" title="Hide/Show">
                    </button>
                    <h4 class="mb-0 font-weight-bold">Documents</h4>
                </div>
                <div class="collapse " id="document-details" aria-labelledby="documentHeading"
                     data-parent="#army-detail">
                    <div class="card-body pb-2 pt-3 ">
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
                        <div class="text-right pt-1">
                            <a class="btn btn-primary btn-sm" href="#" role="button">Add Document</a>
                        </div>
                    </div>
                </div>
            </div>

            @if($army->account)
                <div class="px-2 px-sm-3 mt-3">
                    <h5 class="font-weight-bold border-bottom pb-1">Account Details</h5>
                    <div class="row mb-2">
                        <div class="col-12 col-sm-4 pt-2">Account Number <span class="float-right">:</span></div>
                        <div class="col-12 col-sm-8 pt-2 font-weight-bold">{{$army->account->account_no}}</div>
                        <div class="col-12 col-sm-4 pt-2">Branch Name <span class="float-right">:</span></div>
                        <div class="col-12 col-sm-8 pt-2 font-weight-bold">{{$army->account->branch_name}}</div>
                        <div class="col-12 col-sm-4 pt-2">IFSC Code <span class="float-right">:</span></div>
                        <div class="col-12 col-sm-8 pt-2 font-weight-bold">{{$army->account->ifsc}}</div>
                    </div>
                </div>
            @endif

            @if($army->csdCard)
                <div class="px-2 px-sm-3 mt-3">
                    <h5 class="font-weight-bold border-bottom pb-1">CSD Card Details</h5>
                    <div class="row mb-2">
                        <div class="col-12 col-sm-4 pt-2">Grocery Card No. <span class="float-right">:</span></div>
                        <div class="col-12 col-sm-8 pt-2 font-weight-bold">{{$army->csdCard->grocery}}</div>
                        <div class="col-12 col-sm-4 pt-2">Liquor Card No. <span class="float-right">:</span></div>
                        <div class="col-12 col-sm-8 pt-2 font-weight-bold">{{$army->csdCard->liquor}}</div>
                    </div>
                </div>
            @endif

            @if(count($army->insurance) > 0)
                <div class="px-2 px-sm-3 mt-3">
                    <h5 class="font-weight-bold border-bottom pb-1">Insurance Policy Details</h5>
                    @foreach($army->insurance as $insurance)
                        <div class="row mb-2">
                            <div class="col-5 col-sm-4 col-md-2 pt-2">Policy Number</div>
                            <div class="col-7 col-sm-8 col-md-4 pt-2 font-weight-bold">{{$insurance->policy_no}}</div>
                            @if($insurance->policy_name)
                                <div class="col-12 col-md-6 pt-2 ">({{$insurance->policy_name}})</div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif

            @if(count($army->course) > 0)
                <div class="card mb-2 border-bottom">
                    <div class="card-header py-2" id="courseHeading">
                        <button class="btn btn-link float-right toggle" style="line-height: unset" type="button"
                                data-toggle="collapse" data-target="#course-details" aria-expanded="true"
                                aria-controls="course-details" title="Hide/Show">
                        </button>
                        <h4 class="mb-0 font-weight-bold">Course details</h4>
                    </div>
                    <div class="collapse " id="course-details" aria-labelledby="courseHeading"
                         data-parent="#army-detail">
                        <div class="card-body pb-2 pt-3 ">
                            <div class="mb-2">
                                @foreach($army->course as $doc)
                                    <div class="font-weight-bold border-bottom pb-1">{{$doc->name}}</div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-sm-4 pt-2">
                                            <span class="pr-3">Date :</span> {{$doc->date}}</div>
                                        <div class="col-12 col-sm-3 pt-2 text-truncate">
                                            <span class="pr-3">Grade :</span> {{$doc->grade}}
                                        </div>
                                        <div class="col pt-2">{{$doc->loc}}</div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="text-right pt-1">
                                <a class="btn btn-primary btn-sm" href="#" role="button">Add Course Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>



    </div>
@endsection


<div class="d-none">
    {{ Form::open(['route' => 'document.store', 'novalidate', 'files' => true]) }}
    <div class="form-row">
        <div class="col-md-3 mb-3">
            {!! Form::label('type', 'Document Type') !!}
            {!! Form::select('type', $options['document'],
            null,[
            'class' => 'form-control ' . ($errors->has('type') ? 'is-invalid' : ''),
            'placeholder' => 'Select Document Type',
            'required'
            ]) !!}
            <div class="invalid-feedback">{{ $errors->first('type') }}</div>
        </div>
        <div class="col-md-4 mb-3">
            {!! Form::label('document_no', null) !!}
            {!! Form::text('document_no',null,[
            'class' => 'form-control ' . ($errors->has('document_no') ? 'is-invalid' : ''),
            'placeholder' => 'Enter document no',
            'required'
            ]) !!}
            <div class="invalid-feedback">{{ $errors->first('document_no') }}</div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="custom-file mt-md-3">
                {!! Form::file('image',[
                'class' => 'custom-file-input' . ($errors->has('image') ? ' is-invalid' : ''),
                'required'
                ]) !!}
                {!! Form::label('image', 'Document Image', ['class' => 'custom-file-label']) !!}
                <div class="invalid-feedback ">{{ $errors->first('image') }}</div>
            </div>
        </div>
        <div class="col-md-2 mb-3 text-right align-self-end">
            {{ Form::submit('Upload', ['class' => 'btn btn-primary ']) }}
        </div>
    </div>
    {{ Form::close() }}
</div>

<div class="d-none">
    {{ Form::open(['route' => 'card.store', 'novalidate']) }}
    <div class="form-row">
        <div class="col-md-5 mb-3">
            {!! Form::label('grocery', 'Grocery Card No.') !!}
            {!! Form::text('grocery',null,[
            'class' => 'form-control ' . ($errors->has('grocery') ? 'is-invalid' : ''),
            'placeholder' => 'Enter Grocery Card no',
            'required'
            ]) !!}
            <div class="invalid-feedback">{{ $errors->first('grocery') }}</div>
        </div>
        <div class="col-md-5 mb-3">
            {!! Form::label('liquor', 'Liquor Card No.') !!}
            {!! Form::text('liquor',null,[
            'class' => 'form-control ' . ($errors->has('liquor') ? 'is-invalid' : ''),
            'placeholder' => 'Enter Liquor Card no',
            'required'
            ]) !!}
            <div class="invalid-feedback">{{ $errors->first('liquor') }}</div>
        </div>

        <div class="col-md-2 mb-3 align-self-end">
            {{ Form::submit('Save', ['class' => 'btn btn-primary ']) }}
        </div>
    </div>
    {{ Form::close() }}
</div>

<div class="d-none">
    {{ Form::open(['route' => 'insurance.store', 'novalidate']) }}
    <div class="form-row">
        <div class="col-md-5 mb-3">
            {!! Form::label('policy_no', 'Insurance Policy No.') !!}
            {!! Form::text('policy_no',null,[
            'class' => 'form-control ' . ($errors->has('policy_no') ? 'is-invalid' : ''),
            'placeholder' => 'Enter Insurance Policy no',
            'required'
            ]) !!}
            <div class="invalid-feedback">{{ $errors->first('policy_no') }}</div>
        </div>
        <div class="col-md-5 mb-3">
            {!! Form::label('policy_name', 'Insurance Policy Name') !!}
            {!! Form::text('policy_name',null,[
            'class' => 'form-control ' . ($errors->has('policy_name') ? 'is-invalid' : ''),
            'placeholder' => 'Enter Insurance Policy Name',
            'required'
            ]) !!}
            <div class="invalid-feedback">{{ $errors->first('policy_name') }}</div>
        </div>

        <div class="col-md-2 mb-3 align-self-end">
            {{ Form::submit('Save', ['class' => 'btn btn-primary ']) }}
        </div>
    </div>
    {{ Form::close() }}
</div>


<div class="d-none">
    {{ Form::open(['route' => 'account.store', 'novalidate']) }}
    <div class="form-row">
        <div class="col-md-4 mb-3">
            {!! Form::label('account_no', 'Bank Account No.') !!}
            {!! Form::text('account_no',null,[
            'class' => 'form-control ' . ($errors->has('account_no') ? 'is-invalid' : ''),
            'placeholder' => 'Enter account no',
            'required'
            ]) !!}
            <div class="invalid-feedback">{{ $errors->first('account_no') }}</div>
        </div>
        <div class="col-md-4 mb-3">
            {!! Form::label('branch_name', 'Bank Branch Name') !!}
            {!! Form::text('branch_name',null,[
            'class' => 'form-control ' . ($errors->has('branch_name') ? 'is-invalid' : ''),
            'placeholder' => 'Enter bank branch name',
            'required'
            ]) !!}
            <div class="invalid-feedback">{{ $errors->first('branch_name') }}</div>
        </div>
        <div class="col-md-4 mb-3">
            {!! Form::label('ifsc', 'Bank IFSC Code') !!}
            {!! Form::text('ifsc',null,[
            'class' => 'form-control ' . ($errors->has('ifsc') ? 'is-invalid' : ''),
            'placeholder' => 'Enter Bank IFSC Code',
            'required'
            ]) !!}
            <div class="invalid-feedback">{{ $errors->first('ifsc') }}</div>
        </div>

        <div class="col mb-3 align-self-end text-right">
            {{ Form::submit('Save', ['class' => 'btn btn-primary ']) }}
        </div>
    </div>
    {{ Form::close() }}
</div>


<div class="d-none">
    {{ Form::open(['route' => 'course.store', 'novalidate']) }}
    <div class="form-row">
        <div class="col-md-4 mb-3">
            {!! Form::label('name', 'Course Name') !!}
            {!! Form::text('name',null,[
            'class' => 'form-control ' . ($errors->has('name') ? 'is-invalid' : ''),
            'placeholder' => 'Enter Course name',
            'required'
            ]) !!}
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
        </div>

        <div class="col-md-4 mb-3">
            {!! Form::label('date', 'Date') !!}
            {!! Form::text('date', null,[
            'class' => 'form-control ' . ($errors->has('date') ? 'is-invalid' : ''),
            'placeholder' => 'DD/MM/YYYY',
            'required',
            ]) !!}
            <div class="invalid-feedback">{{ $errors->first('date') }}</div>
        </div>

        <div class="col-md-4 mb-3">
            {!! Form::label('grade', 'Grading Obtained') !!}
            {!! Form::text('grade',null,[
            'class' => 'form-control ' . ($errors->has('grade') ? 'is-invalid' : ''),
            'placeholder' => 'Enter grading obtained',
            'required'
            ]) !!}
            <div class="invalid-feedback">{{ $errors->first('grade') }}</div>
        </div>
        <div class="col-md-4 mb-3">
            {!! Form::label('loc', null) !!}
            {!! Form::text('loc',null,[
            'class' => 'form-control ' . ($errors->has('loc') ? 'is-invalid' : ''),
            'placeholder' => 'loc',
            'required'
            ]) !!}
            <div class="invalid-feedback">{{ $errors->first('loc') }}</div>
        </div>

        <div class="col mb-3 align-self-end text-right">
            {{ Form::submit('Save', ['class' => 'btn btn-primary ']) }}
        </div>
    </div>
    {{ Form::close() }}
</div>


<div class="d-none">
    {{ Form::open(['route' => 'punishment.store', 'novalidate']) }}
    <div class="form-row">
        <div class="col-sm-6 col-lg-4 mb-3">
            {!! Form::label('place', null) !!}
            {!! Form::text('place',null,[
            'class' => 'form-control ' . ($errors->has('place') ? 'is-invalid' : ''),
            'placeholder' => 'Enter Place',
            'required'
            ]) !!}
            <div class="invalid-feedback">{{ $errors->first('place') }}</div>
        </div>

        <div class="col-sm-6 col-lg-4 mb-3">
            {!! Form::label('offence_date', 'Date of Offence') !!}
            {!! Form::text('offence_date', null,[
            'class' => 'form-control ' . ($errors->has('offence_date') ? 'is-invalid' : ''),
            'placeholder' => 'DD/MM/YYYY',
            'required',
            ]) !!}
            <div class="invalid-feedback">{{ $errors->first('offence_date') }}</div>
        </div>

        <div class="col-sm-6 col-lg-4 mb-3">
            {!! Form::label('rank', null) !!}
            {!! Form::text('rank',null,[
            'class' => 'form-control ' . ($errors->has('rank') ? 'is-invalid' : ''),
            'placeholder' => 'Enter Rank',
            'required'
            ]) !!}
            <div class="invalid-feedback">{{ $errors->first('rank') }}</div>
        </div>

        <div class="col-sm-6 col-lg-4 mb-3">
            {!! Form::label('witness', 'Name of Witness') !!}
            {!! Form::text('witness',null,[
            'class' => 'form-control ' . ($errors->has('witness') ? 'is-invalid' : ''),
            'placeholder' => 'Enter Name of Witness',
            'required'
            ]) !!}
            <div class="invalid-feedback">{{ $errors->first('witness') }}</div>
        </div>
        <div class="col-sm-6 col-lg-4 mb-3">
            {!! Form::label('punishment', 'Punishment Awarded') !!}
            {!! Form::text('punishment',null,[
            'class' => 'form-control ' . ($errors->has('punishment') ? 'is-invalid' : ''),
            'placeholder' => 'Enter Punishment Awarded',
            'required'
            ]) !!}
            <div class="invalid-feedback">{{ $errors->first('punishment') }}</div>
        </div>

        <div class="col-sm-6 col-lg-4 mb-3">
            {!! Form::label('order_date', 'Date of Award/Order') !!}
            {!! Form::text('order_date', null,[
            'class' => 'form-control ' . ($errors->has('order_date') ? 'is-invalid' : ''),
            'placeholder' => 'DD/MM/YYYY',
            'required',
            ]) !!}
            <div class="invalid-feedback">{{ $errors->first('order_date') }}</div>
        </div>

        <div class="col-sm-6 col-lg-4 mb-3">
            {!! Form::label('by_whom', 'By Whom Awarded') !!}
            {!! Form::text('by_whom',null,[
            'class' => 'form-control ' . ($errors->has('by_whom') ? 'is-invalid' : ''),
            'placeholder' => 'By Whom Awarded',
            'required'
            ]) !!}
            <div class="invalid-feedback">{{ $errors->first('by_whom') }}</div>
        </div>

        <div class="col-sm-6 col-lg-4 mb-3">
            {!! Form::label('offence', null) !!}
            {!! Form::textarea('offence',null,[
            'class' => 'form-control ' . ($errors->has('offence') ? 'is-invalid' : ''),
            'placeholder' => 'Enter Offence',
            'required',
            'rows' => 5
            ]) !!}
            <div class="invalid-feedback">{{ $errors->first('offence') }}</div>
        </div>

        <div class="col-sm-6 col-lg-4 mb-3">
            {!! Form::label('remark', 'Remarks') !!}
            {!! Form::textarea('remark',null,[
            'class' => 'form-control ' . ($errors->has('remark') ? 'is-invalid' : ''),
            'placeholder' => 'Enter Remarks',
            'required',
            'rows' => 5
            ]) !!}
            <div class="invalid-feedback">{{ $errors->first('remark') }}</div>
        </div>

        <div class="col mb-3 align-self-end text-right">
            {{ Form::submit('Save', ['class' => 'btn btn-primary ']) }}
        </div>
    </div>
    {{ Form::close() }}
</div>


<div class="d-none">
    {{ Form::open(['route' => 'sarpanch.store', 'novalidate']) }}
    <div class="form-row">
        <div class="col-md-5 mb-3">
            {!! Form::label('name', 'Sarpanch Name') !!}
            {!! Form::text('name',null,[
            'class' => 'form-control ' . ($errors->has('name') ? 'is-invalid' : ''),
            'placeholder' => 'Enter Sarpanch Name',
            'required'
            ]) !!}
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
        </div>
        <div class="col-md-5 mb-3">
            {!! Form::label('mobile', 'Mobile No.') !!}
            {!! Form::text('mobile',null,[
            'class' => 'form-control ' . ($errors->has('mobile') ? 'is-invalid' : ''),
            'placeholder' => 'Enter Sarpanch Mobile No.',
            'required'
            ]) !!}
            <div class="invalid-feedback">{{ $errors->first('mobile') }}</div>
        </div>

        <div class="col mb-3 align-self-end">
            {{ Form::submit('Save', ['class' => 'btn btn-primary ']) }}
        </div>
    </div>
    {{ Form::close() }}
</div>
