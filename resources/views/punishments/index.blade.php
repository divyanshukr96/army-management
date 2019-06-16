@extends('layouts.app')

@section('title', '| Users')

@section('content')

    <div class="col-lg-10 offset-lg-1">
        <h3><i class="fa fa-users" style="font-size: large"></i> Punishments

{{--            <a href="{{ route('punishments.create') }}" class="btn btn-success float-right">Add New Army</a>--}}
        </h3>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">

                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Punishment</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">BY Whom</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                @if(count($punishments) > 0)
                    @php
                        $s_no = $punishments->currentpage() * $punishments->perpage() -  $punishments->perpage();
                    @endphp
                    @foreach ($punishments as $punishment)
                        <tr>
                            <th scope="row">{{ sprintf('%02d',++$s_no) }}</th>
                            <td>{{ $punishment->army->name }}</td>
                            <td>{{ $punishment->punishment }}</td>
                            <td>{{ $punishment->order_date }}</td>
                            <td>{{ $punishment->by_whom }}</td>
                            <td>
                                <a href="{{ route('punishments.show', $punishment->id) }}"
                                   class="btn btn-outline-secondary btn-sm float-left mr-1">view</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <th scope="row" colspan="6" class="text-center bg-warning">
                            Data not available
                            @if($punishments->currentpage() > 1)
                                <a href="{{$punishments->previousPageUrl()}}">Go to previous page</a>
                            @endif
                        </th>
                    </tr>
                @endif
                </tbody>

            </table>
            {{ $punishments->links() }}
        </div>

    </div>

@endsection
