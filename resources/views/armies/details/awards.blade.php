@extends('layouts.details')
@section('details')
    <div class="card mb-2">
        <div class="card-header py-2">
            <h5 class="mb-0 font-weight-bold">Awards & Honours</h5>
        </div>
        <div class="card-body pb-0 pt-2">
            @if(count($army->awards) > 0)
                <div class="mb-2">
                    @foreach($army->awards as $award)
                        <div class="row mb-2">
                            <div class="col-12 pt-1"><strong>{{$loop->iteration}}. </strong> {{$award->title}}</div>
                        </div>
                    @endforeach
                </div>
                <hr style="margin: 1.1rem -1.2rem .5rem; border-top-width: 2px">
            @else
                <div class="font-weight-bold text-center py-1">No any Awards received yet.</div>
            @endif
            @hasanypermission("army-edit|army-add")
                @include('forms.new.award')
            @endhasanypermission
        </div>
    </div>

@endsection
