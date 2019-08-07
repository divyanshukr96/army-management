@extends('layouts.app')

@section('content')

    <div class='col-lg-4 offset-lg-4'>
        <h4>Person's <span title="Military Hospital">MH</span> or
            <span title="Temporary Duty">T/Duty</span> Details</h4>
        <hr>
        @include('armies.details',['army' => $duty->army])

        <a href="{{ route('armies.show',[$duty->army->id, 'redirect' => url()->full()]) }}"
           class="btn btn-outline-dark mb-2 px-3">Show Details</a>

        <div class="card mb-2">
            <div class="card-body pb-0 pt-2">
                <div class="row mb-2">
                    <div class="col-12 col-sm-4 pt-2">From <span class="float-right">:</span></div>
                    <div class="col-12 col-sm-8 pt-2 font-weight-bold">
                        {{!$duty->from ?: date('d-m-Y', strtotime($duty->from))}}</div>
                    <div class="col-12 col-sm-4 pt-2">To Date <span class="float-right">:</span></div>
                    <div class="col-12 col-sm-8 pt-2 font-weight-bold">
                        {{!$duty->to ?: date('d-m-Y', strtotime($duty->to))}}</div>
                    <div class="col-12 col-sm-4 pt-2">Type<span class="float-right">:</span></div>
                    <div class="col-12 col-sm-8 pt-2 font-weight-bold">
                        @lang('message.'.strtoupper($duty->type->value))
                    </div>
                    <div class="col-12 col-sm-4 pt-2">Location<span class="float-right">:</span></div>
                    <div class="col-12 col-sm-8 pt-2 font-weight-bold">{{$duty->loc}}</div>
                    <div class="col-12 col-sm-4 pt-2">Description<span class="float-right">:</span></div>
                    <div class="col-12 col-sm-8 pt-2 font-weight-bold">{{$duty->description}}</div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ request()->get('redirect')?: url()->previous() }}" class="btn btn-secondary">Back</a>
            <a href="{{ route('duties.edit',[$duty->id, 'redirect' => url()->full()]) }}"
               class="btn btn-info mx-1">Edit</a>
        </div>

    </div>

@endsection
