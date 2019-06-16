<div class="card mb-2">
    <div class="card-header py-2">
        <a class="btn btn-primary btn-sm float-right"
           href="{{route('punishments.create',[$army->id,'redirect'=> url()->full()])}}"
           role="button">Add Punishment</a>
        <h4 class="mb-0 font-weight-bold">Punishment Awarded</h4>
    </div>
    <div class="card-body pb-0 pt-2">
        <div class="mb-2">
            @if(count($army->punishments) > 0)
                @foreach($army->punishments as $punish)
                    <div class="font-weight-bold border-bottom pb-1">
                        {{ucwords($punish->order_date)}}
                        <span class="float-right">
                                    <a href="{{ route('punishments.edit',[$army->id, $punish->id, 'redirect' => url()->full()]) }}"
                                       class="btn btn-sm btn-info mx-1">Edit</a>

                                    {{ Form::open(['method' => 'DELETE', 'route' => ['punishments.destroy', $army->id, $punish->id], 'class' => 'd-inline']) }}
                            {{ Form::submit('Delete', ['class' => 'btn btn-sm btn-danger d-inline']) }}
                            {{ Form::close() }}
                                </span>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12 col-sm-4 pt-2">
                            <span class="pr-3">Place :</span> {{$punish->place}}</div>
                        <div class="col-12 col-sm-4 pt-2 text-truncate">
                            <span class="pr-3">Date of Offence :</span> {{$punish->offence_date}}
                        </div>
                        <div class="col-12 col-sm-4 pt-2 text-truncate">
                            <span class="pr-3">Rank :</span> {{$punish->rank}}
                        </div>
                        <div class="col-12 col-sm-4 pt-2 text-truncate">
                            <span class="pr-3">Witness :</span> {{$punish->witness}}
                        </div>
                        <div class="col-12 col-sm-4 pt-2 text-truncate">
                            <span class="pr-3">By Whom :</span> {{$punish->by_whom}}
                        </div>
                        <div class="col-12 col-sm-4 pt-2 text-truncate">
                            <span class="pr-3">Date of Order :</span> {{$punish->order_date}}
                        </div>
                        <div class="col-12 pt-2 text-truncate">
                            <span class="pr-3">Punishment Awarded :</span> {{$punish->punishment}}
                        </div>
                        <div class="col-12 pt-2">
                            <span class="pr-3 font-weight-bold">Offence :</span>
                            {{$punish->offence}} {{$punish->offence}}
                        </div>
                        <div class="col-12 pt-2 ">
                            <span class="pr-3 font-weight-bold">Remark :</span> {{$punish->remark}}
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center font-weight-bold">No any punishment awarded yet</div>
            @endif
        </div>
    </div>
</div>

