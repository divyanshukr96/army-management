<h5 class="font-weight-bold border-bottom pb-1">{{$relation}}
    <button class="btn btn-link btn-sm float-right more-less collapsed" style="line-height: unset; margin-top: 8px" type="button"
            data-toggle="collapse" data-target="#{{$relation}}" aria-expanded="true"
            aria-controls="{{$relation}}" title="Hide/Show">
    </button>
</h5>

<div class="collapse" id="{{$relation}}">
    @foreach($data as $fa)
        <div class="row form-group-mx-px-0 mb-2">
            <div class="col-md-6 form-group row">
                <label for="name" class="col-5 col-sm-4 col-form-label">Name</label>
                <div class="col-7 col-sm-8">
                    <input type="text" id="name" readonly
                           class="form-control-plaintext focus-none"
                           value="{{$fa->name}}">
                </div>
            </div>
            <div class="col-md-6 form-group row">
                <label for="mobile" class="col-5 col-sm-4 col-form-label">Mobile</label>
                <div class="col-7 col-sm-8">
                    <input type="text" id="mobile" readonly
                           class="form-control-plaintext focus-none"
                           value="{{$fa->mobile}}">
                </div>
            </div>
            @if($fa->dob)
                <div class="col-md-6 form-group row">
                    <label for="dob" class="col-5 col-sm-4 col-form-label">Date of Birth</label>
                    <div class="col-7 col-sm-8">
                        <input type="text" id="dob" readonly class="form-control-plaintext focus-none"
                               value="{{$fa->dob}}">
                    </div>
                </div>
            @endif
            <div class="col-md-6 form-group row">
                <label for="age" class="col-5 col-sm-4 col-form-label">Age</label>
                <div class="col-7 col-sm-8">
                    <input type="text" id="age" readonly
                           class="form-control-plaintext focus-none"
                           value="{{$fa->age}}">
                </div>
            </div>
            <div class="col-md-6 form-group row">
                <label for="blood_group" class="col-5 col-sm-4 col-form-label">Blood
                    Group</label>
                <div class="col-7 col-sm-8">
                    <input type="text" id="blood_group" readonly
                           class="form-control-plaintext focus-none"
                           value="{{ $fa->blood_group->value }}">
                </div>
            </div>
            <div class="col-md-6 form-group row">
                <label for="education" class="col-5 col-sm-4 col-form-label">Education</label>
                <div class="col-7 col-sm-8">
                    <input type="text" id="education" readonly
                           class="form-control-plaintext focus-none"
                           value="{{ $fa->education }}">
                </div>
            </div>
            <div class="col-md-6 form-group row">
                <label for="occupation" class="col-5 col-sm-4 col-form-label">Profession</label>
                <div class="col-7 col-sm-8">
                    <input type="text" id="occupation" readonly
                           class="form-control-plaintext focus-none"
                           value="{{ $fa->occupation }}">
                </div>
            </div>
            @if($fa->pan_card)
                <div class="col-md-6 form-group row">
                    <label for="pan_card" class="col-5 col-sm-4 col-form-label">Pan Card</label>
                    <div class="col-7 col-sm-8">
                        <input type="text" id="pan_card" readonly
                               class="form-control-plaintext focus-none"
                               value="{{ $fa->pan_card }}">
                    </div>
                </div>
            @endif
            @if($fa->dom)
                <div class="col-md-6 form-group row">
                    <label for="dom" class="col-5 col-sm-4 col-form-label">Date of Marriage</label>
                    <div class="col-7 col-sm-8">
                        <input type="text" id="dom" readonly
                               class="form-control-plaintext focus-none"
                               value="{{ $fa->dom }}">
                    </div>
                </div>
            @endif
            @if($fa->certificate)
                <div class="col-md-6 form-group row">
                    <label for="certificate" class="col-5 col-sm-4 col-form-label">Certificate</label>
                    <div class="col-7 col-sm-8">
                        <input type="text" id="certificate" readonly
                               class="form-control-plaintext focus-none"
                               value="{{ $fa->certificate }}">
                    </div>
                </div>
            @endif
            <a href="{{route('families.edit',[$army->id, $fa->id])}}" class="edit position-absolute" title="edit">
                <i class="fas fa-edit"></i>
            </a>
        </div>
    @endforeach
</div>
