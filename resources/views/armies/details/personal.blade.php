@extends('layouts.details')
@section('details')

    <div class="card my-2">
        <div class="card-header py-2">
            <a href="{{ route('armies.edit', $army->id) }}" class="btn btn-info btn-sm float-right px-3">Edit</a>
            <h4 class="mb-0 font-weight-bold">Personal Details</h4>
        </div>
        <div class="card-body py-2 form-group-mb-0">
            <div class="row form-group-mx-px-0 mb-2">
                <div class="col-md-6 form-group row">
                    <label for="name" class="col-5 col-sm-4 col-form-label">Name</label>
                    <div class="col-7 col-sm-8">
                        <input type="text" id="name" readonly
                               class="form-control-plaintext focus-none"
                               value="{{$army->name}}">
                    </div>
                </div>
                <div class="col-md-6 form-group row">
                    <label for="email" class="col-5 col-sm-4 col-form-label">Email</label>
                    <div class="col-7 col-sm-8">
                        <input type="text" id="email" readonly
                               class="form-control-plaintext focus-none word-wrap"
                               value="{{$army->email}}" title="{{$army->email}}">
                    </div>
                </div>
                <div class="col-md-6 form-group row">
                    <label for="mobile" class="col-5 col-sm-4 col-form-label">Mobile</label>
                    <div class="col-7 col-sm-8">
                        <input type="text" id="mobile" readonly class="form-control-plaintext focus-none"
                               value="{{$army->mobile}}">
                    </div>
                </div>
                <div class="col-md-6 form-group row">
                    <label for="dob" class="col-5 col-sm-4 col-form-label">Date of Birth</label>
                    <div class="col-7 col-sm-8">
                        <input type="text" id="dob" readonly class="form-control-plaintext focus-none"
                               value="{{$army->dob}} ({{$army->age}})">
                    </div>
                </div>
                <div class="col-md-6 form-group row">
                    <label for="religion" class="col-5 col-sm-4 col-form-label">Religion</label>
                    <div class="col-7 col-sm-8">
                        <input type="text" id="religion" readonly class="form-control-plaintext focus-none"
                               value="{{ $army->religion->value }}">
                    </div>
                </div>
                <div class="col-md-6 form-group row">
                    <label for="caste" class="col-5 col-sm-4 col-form-label">Caste</label>
                    <div class="col-7 col-sm-8">
                        <input type="text" id="caste" readonly class="form-control-plaintext focus-none"
                               value="{{ $army->caste }}">
                    </div>
                </div>

                <div class="col-md-6 form-group row">
                    <label for="blood_group" class="col-5 col-sm-4 col-form-label">Blood Group</label>
                    <div class="col-7 col-sm-8">
                        <input type="text" id="blood_group" readonly class="form-control-plaintext focus-none"
                               value="{{ $army->blood_group->value }}">
                    </div>
                </div>
                <div class="col-md-6 form-group row">
                    <label for="marital_status" class="col-5 col-sm-4 col-form-label">Marital Status</label>
                    <div class="col-7 col-sm-8">
                        <input type="text" id="marital_status" readonly
                               class="form-control-plaintext focus-none"
                               value="{{ $army->marital_status->value }}">
                    </div>
                </div>
                <div class="col-md-6 form-group row">
                    <label for="mother_tongue" class="col-5 col-sm-4 col-form-label">Mother tongue</label>
                    <div class="col-7 col-sm-8">
                        <input type="text" id="mother_tongue" readonly class="form-control-plaintext focus-none"
                               value="{{ $army->mother_tongue }}">
                    </div>
                </div>
                <div class="col-md-6 form-group row">
                    <label for="medical" class="col-5 col-sm-4 col-form-label">Medical</label>
                    <div class="col-7 col-sm-8">
                        <input type="text" id="medical" readonly class="form-control-plaintext focus-none"
                               value="{{ $army->medical }}">
                    </div>
                </div>
                <div class="col-md-6 form-group row">
                    <label for="education" class="col-5 col-sm-4 col-form-label">Civil Education</label>
                    <div class="col-7 col-sm-8">
                        <input type="text" id="education" readonly class="form-control-plaintext focus-none"
                               value="{{ $army->education }}">
                    </div>
                </div>
                <div class="col-md-6 form-group row">
                    <label for="education" class="col-5 col-sm-4 col-form-label">Nearest Railway Station</label>
                    <div class="col-7 col-sm-8">
                        <input type="text" id="education" readonly class="form-control-plaintext focus-none"
                               value="{{ $army->nrs }}">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card my-2">
        <div class="card-body py-2 form-group-mb-0">
            <a href="{{ route('address.edit', [$army->id, $army->address->id]) }}"
               class="btn btn-info btn-sm float-right px-3">Edit</a>
            <h5 class="font-weight-bold">Address</h5>
            <hr class="my-1">
            <div class="row form-group-mx-px-0 mb-2">
                <div class="col-md-6 form-group row">
                    <label for="state" class="col-5 col-sm-4 col-form-label">State</label>
                    <div class="col-7 col-sm-8">
                        <input type="text" id="state" readonly
                               class="form-control-plaintext focus-none"
                               value="{{$army->address->state}}">
                    </div>
                </div>
                <div class="col-md-6 form-group row">
                    <label for="district" class="col-5 col-sm-4 col-form-label">District</label>
                    <div class="col-7 col-sm-8">
                        <input type="text" id="district" readonly
                               class="form-control-plaintext focus-none"
                               value="{{$army->address->district}}">
                    </div>
                </div>
                <div class="col-md-6 form-group row">
                    <label for="pin_code" class="col-5 col-sm-4 col-form-label">Pin Code</label>
                    <div class="col-7 col-sm-8">
                        <input type="text" id="pin_code" readonly
                               class="form-control-plaintext focus-none"
                               value="{{$army->address->pin_code}}">
                    </div>
                </div>
                <div class="col-md-6 form-group row">
                    <label for="address" class="col-5 col-sm-4 col-form-label">Address</label>
                    <div class="col-7 col-sm-8">
                        <textarea id="address" rows="4" class="form-control-plaintext focus-none"
                                  readonly>{{$army->address->address}}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="card mb-2">
        <div class="card-header py-2">
            <a href="{{ route('sarpanch.edit', [$army->id, $army->sarpanch->id, 'redirect' => url()->full()]) }}"
               class="btn btn-info btn-sm float-right px-3">Edit</a>
            <h5 class="mb-0 font-weight-bold">Sarpanch Details</h5>
        </div>
        <div class="card-body pb-0 pt-1">
            @if($army->sarpanch)
                <div class="row mb-2">
                    <div class="col-12 col-sm-4 pt-2">Name <span class="float-right">:</span></div>
                    <div class="col-12 col-sm-8 pt-2 font-weight-bold">{{ucwords($army->sarpanch->name)}}</div>
                    <div class="col-12 col-sm-4 pt-2">Mobile <span class="float-right">:</span></div>
                    <div class="col-12 col-sm-8 pt-2 font-weight-bold">{{$army->sarpanch->mobile}}</div>
                </div>
            @else
                @include('forms.new.sarpanch')
                {{--                <div class="text-right my-2">--}}
                {{--                    <a class="btn btn-primary btn-sm" href="#" role="button">Add Sarpanch</a>--}}
                {{--                </div>--}}
            @endif
        </div>
    </div>

@endsection
