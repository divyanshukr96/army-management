<div class="card mb-2">
    <div class="card-header py-2">
        <h5 class="mb-0 font-weight-bold">CSD Card Details</h5>
    </div>
    <div class="card-body pb-0 pt-2">
        @if($army->csdCard)
            <div class="row mb-2">
                <div class="col-12 col-sm-4 pt-2">Grocery Card No. <span class="float-right">:</span></div>
                <div class="col-12 col-sm-8 pt-2 font-weight-bold">{{$army->csdCard->grocery}}</div>
                <div class="col-12 col-sm-4 pt-2">Liquor Card No. <span class="float-right">:</span></div>
                <div class="col-12 col-sm-8 pt-2 font-weight-bold">{{$army->csdCard->liquor}}</div>
                <div class="col-12 text-right">
                    <a href="{{ route('card.edit',[$army->id, $army->csdCard->id, 'redirect' => url()->full()]) }}" class="btn btn-sm btn-info mx-2">Edit</a>

                    {{ Form::open(['method' => 'DELETE', 'route' => ['card.destroy', $army->id, $army->csdCard->id], 'class' => 'd-inline']) }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-sm btn-danger d-inline']) }}
                    {{ Form::close() }}
                </div>
            </div>
        @else
            @include('forms.new.csd')
        @endif
    </div>
</div>
