@extends('layouts.app')

@section('title', '| Permissions')

@section('content')

    <div class="col-lg-10 offset-lg-1">
        <h3><i class="fa fa-key" style="font-size: large"></i> Available Permissions

            <a href="{{ route('users.index') }}" class="btn btn-outline-secondary float-right">Users</a>
            <a href="{{ route('roles.index') }}" class="btn btn-outline-secondary float-right mx-1">Roles</a></h3>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">

                <thead>
                <tr>
                    <th>Permissions</th>
                    <th>Operation</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>
                            <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-info btn-sm float-left" style="margin-right: 3px;">Edit</a>

                            {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <a href="{{ URL::to('permissions/create') }}" class="btn btn-success">Add Permission</a>

    </div>

@endsection
