@extends('layouts.app')

@section('title', '| Users')

@section('content')

    <div class="col-lg-10 offset-lg-1">
        <h3><i class="fa fa-users" style="font-size: large"></i> Currently On Leave

            {{--            <a href="{{ route('punishments.create') }}" class="btn btn-success float-right">Add New Army</a>--}}
        </h3>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">

                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">From</th>
                    <th scope="col">To Date</th>
                    <th scope="col">No. of Days</th>
                    {{--                    <th scope="col">Remaining</th>--}}
                    <th scope="col">Cause</th>
                    @can('leave-edit')
                        <th></th>
                    @endcan
                </tr>
                </thead>

                <tbody>
                @if(count($leaves) > 0)
                    @php
                        $s_no = $leaves->currentpage() * $leaves->perpage() -  $leaves->perpage();
                    @endphp
                    @foreach ($leaves as $leave)
                        <tr>
                            <th scope="row">{{ sprintf('%02d',++$s_no) }}</th>
                            <td>{{ $leave->army->name }}</td>
                            <td>{{!$leave->from ?: date('d-m-Y', strtotime($leave->from))}}</td>
                            <td>{{!$leave->to ?: date('d-m-Y', strtotime($leave->to))}}</td>
                            <th scope="col" title="Remaining : {{$leave->remaining}} Days">{{ $leave->days }}</th>
                            {{--                            <th scope="col">{{ $leave->days }}</th>--}}
                            <td>{{ $leave->type->value }}</td>
                            @can('leave-edit')
                                <td>
                                    {{--                                    <a href="{{ route('punishments.show', $leave->id) }}"--}}
                                    {{--                                       class="btn btn-outline-secondary btn-sm float-left mr-1">view</a>--}}
                                    <a href="{{ route('leaves.edit',[$leave->army->id, $leave->id, 'redirect' => url()->full()]) }}"
                                       class="btn btn-sm btn-info mx-1">Edit</a>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <th scope="row" colspan="6" class="text-center bg-warning">
                            Data not available
                            @if($leaves->currentpage() > 1)
                                <a href="{{$leaves->previousPageUrl()}}">Go to previous page</a>
                            @endif
                        </th>
                    </tr>
                @endif
                </tbody>

            </table>
            {{ $leaves->links() }}
        </div>

    </div>

@endsection
