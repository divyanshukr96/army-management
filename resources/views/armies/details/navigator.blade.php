<h3 class="font-weight-bold">{{$army->rank}} {{$army->name}} </h3>
<div class="card my-2 font-weight-bold">
    <div class="card-body py-1 form-group-mb-0">
        <div class="float-right">
            <a href="{{ asset("image/{$army->image}") }}" target="_blank">
                <img height="100"
                     src="{{ asset("image/{$army->image}") }}"
                     alt="">
            </a>
        </div>
        <div class="row form-group-mx-px-0 mb-2">

            <div class="col-md-6 form-group row">
                <label for="regd_no" class="col-5 col-sm-4 col-form-label">Registration No.</label>
                <div class="col-7 col-sm-8">
                    <input type="text" id="regd_no" readonly
                           class="form-control-plaintext focus-none"
                           value="{{$army->regd_no}}">
                </div>
            </div>
            <div class="col-md-6 form-group row">
                <label for="id_card" class="col-5 col-sm-4 col-form-label">ID Card No.</label>
                <div class="col-7 col-sm-8">
                    <input type="text" id="id_card" readonly
                           class="form-control-plaintext focus-none"
                           value="{{$army->id_card_no}}">
                </div>
            </div>
            <div class="col-md-6 form-group row">
                <label for="rank" class="col-5 col-sm-4 col-form-label">Rank</label>
                <div class="col-7 col-sm-8">
                    <input type="text" id="rank" readonly
                           class="form-control-plaintext focus-none"
                           value="{{$army->rank}}">
                </div>
            </div>
            <div class="col-md-6 form-group row">
                <label for="doe" class="col-5 col-sm-4 col-form-label">Date of Enrollment</label>
                <div class="col-7 col-sm-8">
                    <input type="text" id="doe" readonly
                           class="form-control-plaintext focus-none"
                           value="{{$army->doe}}">
                </div>
            </div>
            <div class="col-md-6 form-group row">
                <label for="company" class="col-5 col-sm-4 col-form-label">Company Name</label>
                <div class="col-7 col-sm-8">
                    <input type="text" id="company" readonly
                           class="form-control-plaintext focus-none"
                           value="{{$army->company}}">
                </div>
            </div>
            <div class="col-md-6 form-group row">
                <label for="dos" class="col-5 col-sm-4 col-form-label">Date of Service</label>
                <div class="col-7 col-sm-8">
                    <input type="text" id="dos" readonly
                           class="form-control-plaintext focus-none"
                           value="{{$army->dos}}">
                </div>
            </div>
        </div>
    </div>
</div>

<a href="{{ route('armies.show',[$army->id, 'tab' => 'login']) }}"
   class="btn btn-outline-secondary {{request()->tab === 'login' ? 'active' : ''}} float-right">Login Details</a>

<div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with a groups">
    <div class="btn-group mr-2" role="group" aria-label="First group">
        <a href="{{ route('armies.show',[$army->id, 'tab' => 'personal']) }}"
           class="btn btn-outline-secondary {{request()->tab === 'personal' ? 'active' : ''}}">Personal</a>
        <a href="{{ route('armies.show',[$army->id, 'tab' => 'family']) }}"
           class="btn btn-outline-secondary {{request()->tab === 'family' ? 'active' : ''}}">Family</a>
        <a href="{{ route('armies.show',[$army->id, 'tab' => 'documents']) }}"
           class="btn btn-outline-secondary {{request()->tab === 'documents' ? 'active' : ''}}">Documents</a>
        <a href="{{ route('armies.show',[$army->id, 'tab' => 'courses']) }}"
           class="btn btn-outline-secondary {{request()->tab === 'courses' ? 'active' : ''}}">Courses</a>
        <a href="{{ route('armies.show',[$army->id, 'tab' => 'punishments']) }}"
           class="btn btn-outline-secondary {{request()->tab === 'punishments' ? 'active' : ''}}">Punishments</a>
        <a href="{{ route('armies.show',[$army->id, 'tab' => 'awards']) }}"
           class="btn btn-outline-secondary {{request()->tab === 'awards' ? 'active' : ''}}">Awards</a>
        <a href="{{ route('armies.show',[$army->id, 'tab' => 'leaves']) }}"
           class="btn btn-outline-secondary {{request()->tab === 'leaves' ? 'active' : ''}}">Leaves</a>
    </div>
</div>
