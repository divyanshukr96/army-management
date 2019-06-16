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
