@extends('layouts.app')

@section('title', '| Users')

@section('content')

    <div class="col-lg-7 offset-lg-3">
        <h3><i class="fa fa-users" style="font-size: large"></i> {{ $punishment->punishment }}</h3>
        <hr>
        @include('armies.details', ['army' => $punishment->army])

        <div class="card mb-2">
            <div class="card-body row mb-2 py-2">
                <div class="col-12 col-sm-4 pt-2">
                    <span class="pr-3">Place :</span> {{$punishment->place}}</div>
                <div class="col-12 col-sm-4 pt-2 text-truncate">
                    <span class="pr-3">Date of Offence :</span> {{$punishment->offence_date}}
                </div>
                <div class="col-12 col-sm-4 pt-2 text-truncate">
                    <span class="pr-3">Rank :</span> {{$punishment->rank}}
                </div>
                <div class="col-12 col-sm-4 pt-2 text-truncate">
                    <span class="pr-3">Witness :</span> {{$punishment->witness}}
                </div>
                <div class="col-12 col-sm-4 pt-2 text-truncate">
                    <span class="pr-3">By Whom :</span> {{$punishment->by_whom}}
                </div>
                <div class="col-12 col-sm-4 pt-2 text-truncate">
                    <span class="pr-3">Date of Order :</span> {{$punishment->order_date}}
                </div>
                <div class="col-12 pt-2 text-truncate">
                    <span class="pr-3">Punishment Awarded :</span> {{$punishment->punishment}}
                </div>
                <div class="col-12 pt-2">
                    <span class="pr-3 font-weight-bold">Offence :</span>
                    {{$punishment->offence}} {{$punishment->offence}}
                </div>
                <div class="col-12 pt-2 ">
                    <span class="pr-3 font-weight-bold">Remark :</span> {{$punishment->remark}}
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between mt-4 mb-2">
            <a href="{{ route('punishments.index') }}" class="btn btn-secondary">Back</a>
            <a href="{{ route('armies.show', [$punishment->army->id, 'tab' => 'punishments']) }}"
               class="btn btn-outline-info">View All Punishment</a>
        </div>

    </div>

@endsection
