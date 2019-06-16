<div class="card mb-2">
    <div class="card-header py-2">
        <h5 class="mb-0 font-weight-bold">Sarpanch Details</h5>
    </div>
    <div class="card-body pb-0 pt-1">
        @if($army->sarpanch)
            <div class="row mb-2">
                <div class="col-12 col-sm-4 pt-2">Name <span class="float-right">:</span></div>
                <div class="col-12 col-sm-8 pt-2 font-weight-bold">{{ucwords($army->sarpanch->name)}}</div>
                <div class="col-12 col-sm-4 pt-2">Mobile <span class="float-right">:</span></div>
                <div class="col-12 col-sm-8 pt-2 font-weight-bold">{{$army->sarpanch->mobile}}</div>
                <div class="col-12 text-right">
                    <a href="{{ route('sarpanch.edit',[$army->id, $army->sarpanch->id, 'redirect' => url()->full()]) }}" class="btn btn-sm btn-info mx-2">Edit</a>

                    {{ Form::open(['method' => 'DELETE', 'route' => ['sarpanch.destroy', $army->id, $army->sarpanch->id], 'class' => 'd-inline']) }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-sm btn-danger d-inline']) }}
                    {{ Form::close() }}
                </div>
            </div>
        @elseif(isset($form) && $form)
            @include('forms.new.sarpanch')
        @else
            <h6 class="font-weight-bold text-center py-2">Details not available</h6>
        @endif
    </div>
</div>
