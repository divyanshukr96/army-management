@extends('layouts.app')

@section('title', '| Roles')

@section('content')

    <div class="col-lg-10 offset-lg-1">
        <h2><i class="fas fa-key" style="font-size: large"></i> Roles
            @role('user')
            <a href="{{ route('users.index') }}" class="btn btn-outline-secondary float-right mx-1">Users</a>
            @endrole
            <a href="{{ route('permissions.index') }}" class="btn btn-outline-secondary float-right">Permissions</a>
        </h2>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Role</th>
                    <th>Permissions</th>
                    <th>Operation</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($roles as $role)
                    <tr>

                        <td>{{ $role->name }}</td>

                        <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>
                        <td>
                            <a href="{{ URL::to('roles/'.$role->id.'/edit') }}" class="btn btn-info btn-sm float-left"
                               style="margin-right: 3px;">Edit</a>

                            {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id] ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}

                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>

        <a href="{{ URL::to('roles/create') }}" class="btn btn-success">Add Role</a>

    </div>

@endsection
