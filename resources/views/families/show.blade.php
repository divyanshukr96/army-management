@extends('layouts.app')

@section('title', '| Users')

@section('content')

    <div class="col-lg-6 offset-lg-3">
        <h3><i class="fa fa-user" style="font-size: large"></i> Army Family</h3>
        <hr>
        @include('armies.details')

        <div class="table-responsive">
            <table class="table table- table-striped">
                <tbody>
                <tr>
                    <td>Name</td>
                    <td>{{$family->name}}</td>
                </tr>
                <tr>
                    <td>Mobile</td>
                    <td>{{ $family->mobile }}</td>
                </tr>
                <tr>
                    <td>Date of Birth</td>
                    <td>{{ date('d-m-Y', strtotime($family->dob)) }}</td>
                </tr>
                <tr>
                    <td>Age</td>
                    <td>{{ $family->age }}</td>
                </tr>
                <tr>
                    <td>Blood Group</td>
                    <td>{{ $family->blood_group->value }}</td>
                </tr>
                <tr>
                    <td>Relation</td>
                    <td>{{ $family->relation->value }}</td>
                </tr>
                <tr>
                    <td>Education</td>
                    <td>{{ $family->education }}</td>
                </tr>
                <tr>
                    <td>Occupation</td>
                    <td>{{ $family->occupation }}</td>
                </tr>

                @switch($family->relation->value)
                    @case('Wife')
                    <tr>
                        <td>Pan Card no.</td>
                        <td>{{ $family->pan_card }}</td>
                    </tr>
                    <tr>
                        <td>Date of Marriage</td>
                        <td>{{ $family->dom }}</td>
                    </tr>
                    <tr>
                        <td>Marriage Certificate</td>
                        <td><a target="_blank" href="{{ asset("image/{$family->certificate}") }}">View Certificate</a>
                        </td>
                    </tr>
                    @break
                    @case('Children')
                    <tr>
                        <td>Birth Certificate</td>
                        <td><a target="_blank" href="{{ asset("image/{$family->certificate}") }}">View Certificate</a>
                        </td>
                    </tr>
                    @break
                    @default

                @endswitch
                <tr>
                    <td colspan="2" class="text-right">
                        @hasanypermission("army-delete")
                        {!! Form::open(['method' => 'DELETE', 'route' => ['families.destroy', $army->id, $family->id] ]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger float-right btn-sm']) !!}
                        {!! Form::close() !!}
                        @endhasanypermission

                        @hasanypermission("army-edit|army-add")
                        <a href="{{ route('families.edit', [$army->id, $family->id, 'redirect' => url()->full()]) }}"
                           class="btn btn-info btn-sm mr-1">Edit</a>
                        @endhasanypermission
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ request()->get('redirect') ?? url()->previous() }}" class="btn btn-secondary">Back</a>
        </div>
    </div>

@endsection
