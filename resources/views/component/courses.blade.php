<div class="card mb-2">
    <div class="card-header py-2">
        <h5 class="mb-0 font-weight-bold">Course Attended</h5>
    </div>
    <div class="card-body pb-0 pt-2">
        @if(count($army->courses) > 0)
            <div class="mb-2">
                @foreach($army->courses as $course)
                    <div class="font-weight-bold border-bottom pb-1">
                        {{ucwords($course->name)}}
                        <span class="float-right">
                            @can('army-edit')
                                <a href="{{ route('courses.edit',[$army->id, $course->id, 'redirect' => url()->full()]) }}"
                                   class="btn btn-sm btn-info mx-1">Edit</a>
                            @endcan
                            @can('army-delete')
                                {{ Form::open(['method' => 'DELETE', 'route' => ['courses.destroy', $army->id, $course->id], 'class' => 'd-inline']) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-sm btn-danger d-inline']) }}
                                {{ Form::close() }}
                            @endcan
                        </span>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12 col-sm-4 pt-2">
                            <span class="pr-3">Date :</span>
                            @if($course->from)
                                <span title="start date">{{date('d-m-Y', strtotime($course->from))}}</span>
                            @endif
                            @if($course->to)
                                to <span title="end date">{{date('d-m-Y', strtotime($course->to))}}</span>
                            @endif
                        </div>
                        <div class="col-12 col-sm-3 pt-2 text-truncate">
                            <span class="pr-3">Grade :</span> {{$course->grade}}
                        </div>
                        <div class="col pt-2">{{$course->loc}}</div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="py-2">
                Course Details not available.
            </div>
        @endif
        @hasanypermission("army-edit|army-add")
        <div class="text-right pt-1 mb-2">
            <a class="btn btn-primary btn-sm"
               href="{{route('courses.create',[$army->id,'redirect'=> url()->full()]) }}"
               role="button">Add Course Details</a>
        </div>
        @endhasanypermission
    </div>
</div>
