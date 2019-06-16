@extends('layouts.app')
@section('content')
    <div class="container px-0">
        <table class="table table-striped table-hover ">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Regd. No.</th>
                <th scope="col">Rank</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @if(count($armies) > 0)
                @php
                    $s_no = $armies->currentpage() * $armies->perpage() -  $armies->perpage();
                @endphp
                @foreach($armies as $army)
                    <tr>
                        <th scope="row">{{ sprintf('%02d',++$s_no) }}</th>
                        <td>{{$army->name}}</td>
                        <td>{{$army->email}}</td>
                        <td>{{ $army->regd_no }}</td>
                        <td>{{ $army->rank }}</td>
                        <td class="text-right">
                            <a href="{{ route('army.show', $army->id) }}" class="btn btn-info btn-sm">View</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <th scope="row" colspan="6" class="text-center bg-warning">
                        Data not available
                        @if($armies->currentpage() > 1)
                            <a href="{{$armies->previousPageUrl()}}">Go to previous page</a>
                        @endif
                    </th>
                </tr>
            @endif
            </tbody>
        </table>
        {{ $armies->links() }}
    </div>
@endsection
