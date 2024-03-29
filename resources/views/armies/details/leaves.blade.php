@php
    $leavesGroup = $army->leaves()->get()->groupBy('type.value')
@endphp
@extends('layouts.details')
@section('details')
    {{--    <div class="card">--}}
    {{--        <div class="card-body py-2">--}}
    {{--            @include('forms.new.leave')--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <div class="text-right">
        @can('leave-add')
            <a href="{{ route('leaves.create', [$army->id, 'redirect' => url()->full()]) }}" class="btn btn-info">
                Add New Leave</a>
        @endcan
    </div>
    <div class="card my-2">
        <div class="card-header py-2">
            <h5 class="mb-0 font-weight-bold">Leaves Details</h5>
        </div>
        <div class="card-body px-1 py-0">
            @if(count($leavesGroup) > 0)
                <div class="mb-2">
                    <table class="table table-sm">
                        <tr>
                            <td></td>
                            <td>From</td>
                            <td>To</td>
                            <td>Days</td>
                            <td></td>
                        </tr>
                        @foreach($leavesGroup as $group => $leaves)
                            <tr>
                                <td colspan="5" class="font-weight-bold">{{$group}}</td>
                            </tr>
                            @foreach($leaves as $leave)
                                <tr>
                                    <td>{{$loop->iteration}}.</td>
                                    <td>{{!$leave->from ?: date('d-m-Y', strtotime($leave->from))}}</td>
                                    <td>{{!$leave->to ?: date('d-m-Y', strtotime($leave->to))}}</td>
                                    <td>{{$leave->days}}</td>
                                    @can('leave-edit')
                                        <td>
                                            <a href="{{ route('leaves.edit',[$army->id, $leave->id, 'redirect' => url()->full()]) }}"
                                               class="btn btn-sm btn-info mx-1">Edit</a>
                                        </td>
                                    @endcan
                                </tr>
                                @if($loop->last)
                                    <tr class="font-weight-bold">
                                        <td colspan="3" class="text-center">Total {{$group}}</td>
                                        <td>{{$army->leaves()->where('type',$group)->sum('days')}}</td>
                                        <td></td>
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach
                        <tr class="font-weight-bold">
                            <td colspan="3" class="text-center">Total Leave</td>
                            <td>{{$army->leaves()->sum('days')}}</td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            @else

                <div class="font-weight-bold text-center py-2">No any leave yet</div>

            @endif
        </div>
    </div>

@endsection
