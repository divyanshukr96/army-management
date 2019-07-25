@extends('layouts.app')

@section('title', '| Users')

@section('content')

    <div class="col-lg-10 offset-lg-1">
        <h3><i class="fa fa-users" style="font-size: large"></i> Enrolled Person

            @hasanypermission("army-add")
            <a href="{{ route('armies.create') }}" class="btn btn-success float-right ml-2">Add New Person</a>
            @endhasanypermission
            {{ Form::open(['class' => 'form-inline float-right', 'method' => 'get']) }}
            {{ Form::search('query', null, ['class' => 'form-control mr-sm-1', 'placeholder' => 'Search']) }}
            {{ Form::submit('Search', ['class' => 'btn btn-outline-success']) }}
            {{ Form::close() }}


        </h3>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">

                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Rank</th>
                    <th scope="col">Email</th>
                    <th scope="col">Regd. No.</th>
                    <th>Operations</th>
                </tr>
                </thead>

                <tbody>
                @if(count($armies) > 0)
                    @php
                        $s_no = $armies->currentpage() * $armies->perpage() -  $armies->perpage();
                    @endphp
                    @foreach ($armies as $army)
                        <tr>
                            <th scope="row">{{ sprintf('%02d',++$s_no) }}</th>
                            <td><a href="{{ route('armies.show', $army->id) }}">{{ $army->name }}</a></td>
                            <td>{{ $army->rank }}</td>
                            <td>{{ $army->email }}</td>
                            <td>{{ $army->regd_no }}</td>
                            <td>
                                <a href="{{ route('armies.show', $army->id) }}"
                                   class="btn btn-outline-secondary btn-sm float-left mr-1">view</a>
                                {{--                                <a href="{{ route('armies.edit', $army->id) }}"--}}
                                {{--                                   class="btn btn-info btn-sm float-left mr-1">Edit</a>--}}
                                @hasanypermission("army-delete")
                                {!! Form::open(['method' => 'DELETE', 'route' => ['armies.destroy', $army->id] ]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                                @endhasanypermission
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <th scope="row" colspan="6" class="text-center bg-warning">
                            Data not available @if(request()->get('query')) for
                            search {{ request()->get('query') }}@endif
                            @if($armies->currentpage() > 1)
                                <a href="{{$armies->previousPageUrl()}}">Go to previous page</a>
                            @endif
                        </th>
                    </tr>
                @endif
                </tbody>

            </table>

            @if(request()->get('query'))
                <a href="{{ route('armies.index') }}" class="btn btn-info float-right">Clear search</a>
            @endif
            {{ $armies->links() }}

        </div>

    </div>

@endsection
