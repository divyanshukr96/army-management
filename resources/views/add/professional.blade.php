@php
    $leavesGroup = $army->leaves()->get()->groupBy('type.value');
    $options = [
    'leaveType' => \App\Enums\LeaveType::toSelectArray()
    ];
@endphp
@extends('layouts.app')
@section('content')
    <div class="container px-0">
        @include('add.include.details')


        <div class="card mb-2">
            <div class="card-header py-2">
                <h5 class="mb-0 font-weight-bold">Leaves Details</h5>
            </div>
            <div class="card-body pb-0 pt-2">
                {{--                {{dd($army->leaves()->get(['type', 'from', 'to'])->groupBy('type.value'))}}--}}
                @if(count($leavesGroup) > 0)
                    <div class="mb-2">
                        <table class="table table-sm">
                            <tr>
                                <td></td>
                                <td>From</td>
                                <td>To</td>
                                <td>Days</td>
                            </tr>
                            @foreach($leavesGroup as $group => $leaves)
                                <tr>
                                    <td colspan="4" class="font-weight-bold">{{$group}}</td>
                                </tr>
                                @foreach($leaves as $leave)
                                    <tr>
                                        <td>{{$loop->iteration}}.</td>
                                        <td>{{$leave->from}}</td>
                                        <td>{{$leave->to}}</td>
                                        <td>{{$leave->days}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </table>
                    </div>
                    <hr style="margin: 1.1rem -1.2rem .5rem; border-top-width: 2px">
                @endif
                @include('forms.new.leave')
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-header py-2">
                <h5 class="mb-0 font-weight-bold">Course Attended</h5>
            </div>
            <div class="card-body pb-0 pt-2">
                @if(count($army->course) > 0)
                    <div class="mb-2">
                        @foreach($army->course as $doc)
                            <div class="font-weight-bold border-bottom pb-1">{{ucwords($doc->name)}}</div>
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
                @endif
                <div class="text-right pt-1 mb-2">
                    <a class="btn btn-primary btn-sm"
                       href="{{route('course.create',[$army->id,'redirect'=> url()->full()]) }}"
                       role="button">Add Course Details</a>
                </div>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-header py-2">
                <h5 class="mb-0 font-weight-bold">Awards & Honours</h5>
            </div>
            <div class="card-body pb-0 pt-2">
                @if(count($army->awards) > 0)
                    <div class="mb-2">
                        @foreach($army->awards as $award)
                            <div class="row mb-2">
                                <div class="col-12 pt-1"><strong>{{$loop->iteration}}. </strong> {{$award->title}}</div>
                            </div>
                        @endforeach
                    </div>
                    <hr style="margin: 1.1rem -1.2rem .5rem; border-top-width: 2px">
                @endif
                @include('forms.new.award')
            </div>
        </div>

        @if(count($army->punishment) > 0)
            <div class="card mb-2">
                <div class="card-header py-2">
                    <h4 class="mb-0 font-weight-bold">Punishment Awarded</h4>
                </div>
                <div class="card-body pb-0 pt-2">
                    <div class="mb-2">
                        @foreach($army->punishment as $punish)
                            <div class="font-weight-bold border-bottom pb-1">{{ucwords($punish->order_date)}}</div>
                            <div class="row mb-2">
                                <div class="col-12 col-sm-4 pt-2">
                                    <span class="pr-3">Place :</span> {{$punish->place}}</div>
                                <div class="col-12 col-sm-4 pt-2 text-truncate">
                                    <span class="pr-3">Date of Offence :</span> {{$punish->offence_date}}
                                </div>
                                <div class="col-12 col-sm-4 pt-2 text-truncate">
                                    <span class="pr-3">Rank :</span> {{$punish->rank}}
                                </div>
                                <div class="col-12 col-sm-4 pt-2 text-truncate">
                                    <span class="pr-3">Witness :</span> {{$punish->witness}}
                                </div>
                                <div class="col-12 col-sm-4 pt-2 text-truncate">
                                    <span class="pr-3">By Whom :</span> {{$punish->by_whom}}
                                </div>
                                <div class="col-12 col-sm-4 pt-2 text-truncate">
                                    <span class="pr-3">Date of Order :</span> {{$punish->order_date}}
                                </div>
                                <div class="col-12 pt-2 text-truncate">
                                    <span class="pr-3">Punishment Awarded :</span> {{$punish->punishment}}
                                </div>
                                <div class="col-12 pt-2">
                                    <span class="pr-3 font-weight-bold">Offence :</span>
                                    {{$punish->offence}} {{$punish->offence}}
                                </div>
                                <div class="col-12 pt-2 ">
                                    <span class="pr-3 font-weight-bold">Remark :</span> {{$punish->remark}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        <div class="text-right pt-1 mb-2">
            <a class="btn btn-primary btn-sm"
               href="{{route('punishment.create',[$army->id,'redirect'=> url()->full()])}}"
               role="button">Add Punishment Awarded</a>
        </div>


        <div class="d-flex justify-content-between mt-5">
            <a href="{{ route('add.document',$army->id) }}" class="btn btn-secondary">Back</a>
            <a href="{{ route('add.professional',session('army')) }}" class="btn btn-success"> Have to setup</a>
        </div>


    </div>
@endsection
