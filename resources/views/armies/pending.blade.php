@extends('layouts.app')

@section('title', '| Users')

@section('content')

    <div class="col-lg-10 offset-lg-1">
        <h3><i class="fa fa-users" style="font-size: large"></i> Pending Registration List
            @hasanypermission("army-add")
            <a href="{{ route('armies.create') }}" class="btn btn-success float-right">Add New Person</a>
            @endhasanypermission
        </h3>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">

                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Regd. No.</th>
                    <th scope="col">Rank</th>
                    <th scope="col">Date & Time Added</th>
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
                            <td>{{ $army->name }}</td>
                            <td>{{ $army->email }}</td>
                            <td>{{ $army->regd_no }}</td>
                            <td>{{ $army->rank }}</td>
                            <td>{{ $army->created_at->format('F d, Y h:ia') }}</td>
                            <td>
                                @hasanypermission("army-add")
                                <a href="{{ route('families.index', $army->id) }}"
                                   class="btn btn-primary btn-sm float-left mr-1">Proceed</a>
                                @endhasanypermission
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
                        <th scope="row" colspan="7" class="text-center bg-warning">
                            Data not available
                            @if($armies->currentpage() > 1)
                                <a href="{{$armies->previousPageUrl()}}">Go to previous page</a>
                            @endif
                        </th>
                    </tr>
                @endif
                </tbody>

            </table>
        </div>

    </div>

@endsection
