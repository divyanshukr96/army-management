@php
    use App\Enums\RelationType;
    $wife = old('relation') == \App\Enums\RelationType::Wife;
    $child = old('relation') == \App\Enums\RelationType::Children;
    $family = (object)[
            'father' => $army->family()->whereRelation(RelationType::Father)->get(),
            'mother' => $army->family()->whereRelation(RelationType::Mother)->get(),
            'children' => $army->family()->whereRelation(RelationType::Children)->get(),
            'wife' => $army->family()->whereRelation(RelationType::Wife)->get(),
        ];
@endphp
@extends('layouts.app')
@section('content')
    <div class="container px-0">
        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group mr-2" role="group" aria-label="First group">
                <button type="button" class="btn btn-outline-secondary">Personal</button>
                <button type="button" class="btn btn-outline-secondary">Family</button>
                <button type="button" class="btn btn-outline-secondary">Documents</button>
                <button type="button" class="btn btn-outline-secondary">Courses</button>
                <button type="button" class="btn btn-outline-secondary">Punishments</button>
                <button type="button" class="btn btn-outline-secondary">Awards & Leave</button>
            </div>
        </div>

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
