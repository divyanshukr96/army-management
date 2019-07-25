@extends('layouts.app')

@section('title', '| Current Courses')

@section('content')

    <div class="col-lg-10 offset-lg-1">
        <h3><i class="fa fa-users" style="font-size: large"></i> Currently Courses

            {{--            <a href="{{ route('punishments.create') }}" class="btn btn-success float-right">Add New Army</a>--}}
        </h3>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">

                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Course</th>
                    <th scope="col">From</th>
                    <th scope="col">To Date</th>
                    @can('army-edit')
                        <th></th>
                    @endcan
                </tr>
                </thead>

                <tbody>
                @if(count($courses) > 0)
                    @php
                        $s_no = $courses->currentpage() * $courses->perpage() -  $courses->perpage();
                    @endphp
                    @foreach ($courses as $course)
                        <tr>
                            <th scope="row">{{ sprintf('%02d',++$s_no) }}</th>
                            <td>{{ $course->army->name }}</td>
                            <td>{{ $course->name }}</td>
                            <td>{{!$course->from ?: date('d-m-Y', strtotime($course->from))}}</td>
                            <td title="Remaining : {{$course->remaining}} Days">{{!$course->to ?: date('d-m-Y', strtotime($course->to))}}</td>
                            @can('army-edit')
                                <td>
                                    <a href="{{ route('courses.edit',[$course->army->id, $course->id, 'redirect' => url()->full()]) }}"
                                       class="btn btn-sm btn-info mx-1">Edit</a>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <th scope="row" colspan="6" class="text-center bg-warning">
                            Data not available
                            @if($courses->currentpage() > 1)
                                <a href="{{$courses->previousPageUrl()}}">Go to previous page</a>
                            @endif
                        </th>
                    </tr>
                @endif
                </tbody>

            </table>
            {{ $courses->links() }}
        </div>

    </div>

@endsection
