@extends('layouts.app')

@section('title', '| '. trans('message.'.strtoupper(request()->get('type'))))

@section('content')

    <div class="col-lg-10 offset-lg-1">
        <h4><i class="fa fa-users" style="font-size: initial"></i> Currently
            On @lang('message.'.strtoupper(request()->get('type')))</h4>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">

                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Rank</th>
                    <th scope="col">From</th>
                    <th scope="col">To Date</th>
                    <th scope="col">No. of Days</th>
                    <th scope="col">Description</th>
                    {{--                    @can('leave-edit')--}}
                    <th></th>
                    {{--                    @endcan--}}
                </tr>
                </thead>

                <tbody>
                @if(count($duties) > 0)
                    @php
                        $s_no = $duties->currentpage() * $duties->perpage() -  $duties->perpage();
                    @endphp
                    @foreach ($duties as $duty)
                        <tr>
                            <th scope="row">{{ sprintf('%02d',++$s_no) }}</th>
                            <td><a href="{{ route('duties.show',$duty->id) }}">{{ $duty->army->name }}</a></td>
                            <td>{{ $duty->army->rank }}</td>
                            <td>{{!$duty->from ?: date('d-m-Y', strtotime($duty->from))}}</td>
                            <td>{{!$duty->to ?: date('d-m-Y', strtotime($duty->to))}}</td>
                            <th scope="col" title="Remaining : {{$duty->remaining}}">{{ $duty->days }}</th>
                            <td>{{ $duty->description }}</td>
                            {{--                            @can('leave-edit')--}}
                            <td>
                                <a href="{{ route('duties.edit',[$duty->id, 'redirect' => url()->full()]) }}"
                                   class="btn btn-sm btn-info mx-1">Edit</a>
                            </td>
                            {{--                            @endcan--}}
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <th scope="row" colspan="8" class="text-center bg-warning">
                            Data not available
                            @if($duties->currentpage() > 1)
                                <a href="{{$duties->previousPageUrl()}}"> Go to previous page</a>
                            @else
                                <a href="{{ url()->route('home') }}"> Go to Home page</a>
                            @endif
                        </th>
                    </tr>
                @endif
                </tbody>

            </table>
            {{ $duties->links() }}
        </div>

    </div>

@endsection
