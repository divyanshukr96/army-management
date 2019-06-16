@if(count($army->families) > 0)
    <div class="table-responsive">
        <table class="table table-bordered table-striped mb-0">
            <thead>
            <tr>
                <th>Name</th>
                <th>Relation</th>
                <th>Mobile</th>
                <th>Occupation</th>
                <th>Blood Group</th>
                <th>Operations</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($army->families as $family)
                <tr>
                    <td>{{ $family->name }}</td>
                    <td>{{ $family->relation->value }}</td>
                    <td>{{ $family->mobile }}</td>
                    <td>{{ $family->occupation }}</td>
                    <td>{{ $family->blood_group->value }}</td>
                    <td>
                        <a href="{{ route('families.show',[$army->id, $family->id, 'redirect' => url()->full()]) }}"
                           class="btn btn-outline-primary btn-sm float-left mr-1">View</a>
                        <a href="{{ route('families.edit',[$army->id, $family->id, 'redirect' => url()->full()]) }}"
                           class="btn btn-info btn-sm float-left mr-1">Edit</a>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['families.destroy', $army->id, $family->id] ]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endif
