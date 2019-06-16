@php
    $leavesGroup = $army->leaves()->get()->groupBy('type.value');
    $options = [
    'leaveType' => \App\Enums\LeaveType::toSelectArray()
    ];
@endphp

@extends('layouts.app')

@section('title', '| Army Documents')

@section('content')
    <div class="col-lg-10 offset-lg-1">
        <h3><i class="fa fa-user" style="font-size: large"></i> Professional Details</h3>
        <hr>
        @include('armies.details')

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
                                        <td>
                                            {{$leave->days}}

                                            @can('leave-delete')
                                                <span class="float-right">
                                                {{ Form::open(['method' => 'DELETE', 'route' => ['leaves.destroy', $army->id, $leave->id], 'class' => 'd-inline']) }}
                                                    {{ Form::submit('Delete', ['class' => 'btn btn-sm btn-danger d-inline']) }}
                                                    {{ Form::close() }}
                                                </span>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </table>
                    </div>
                    <hr style="margin: 1.1rem -1.2rem .5rem; border-top-width: 2px">
                @endif
                <div class="text-right pt-1 mb-2">
                    <a class="btn btn-primary btn-sm"
                       href="{{route('leaves.create',[$army->id,'redirect'=> url()->full()])}}"
                       role="button">Add Leave</a>
                </div>
            </div>
        </div>

        @include('component.courses')

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


        @include('component.punishment')


        <div class="d-flex justify-content-between my-5">
            {{--            <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>--}}
            <a href="{{ route('documents.index',[$army->id]) }}" class="btn btn-secondary">Back</a>
            {{ Form::open(['route' => ['professional.store', $army->id]]) }}
            {{ Form::hidden('complete',true) }}
            {{ Form::submit('Finish Registration', ['class' => 'btn btn-success px-5']) }}
            {{ Form::close() }}
        </div>

    </div>

@endsection
