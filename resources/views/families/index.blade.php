@extends('layouts.app')

@section('title', '| Users')

@section('content')

    <div class="col-lg-10 offset-lg-1">
        <h3><i class="fa fa-user" style="font-size: large"></i> Army Family</h3>
        <hr>
        @include('armies.details')
        <div class="mt-3">
            @include('component.families')
        </div>

        <div class="d-flex justify-content-end my-2">
            <a href="{{ route('families.create',[$army->id, 'redirect'=> url()->full()]) }}"
               class="btn btn-info mb-2 btn-sm">Add Family Details</a>
        </div>

        @include('component.sarpanch', ['form' => true])

        <div class="d-flex justify-content-between mt-5">
{{--            <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>--}}
            <a href="{{ route('armies.create') }}" class="btn btn-danger">Close</a>
            <a href="{{ route('documents.index',[$army->id]) }}" class="btn btn-success px-5">Next Step</a>
        </div>

    </div>

@endsection
