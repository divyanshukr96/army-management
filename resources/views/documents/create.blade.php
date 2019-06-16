@extends('layouts.app')

@section('title', '| Army Documents')

@section('content')
    <div class="col-lg-10 offset-lg-1">
        <h3><i class="fa fa-user" style="font-size: large"></i> Army Documents</h3>
        <hr>
        @include('armies.details')

        @include('component.document')

        @include('component.account')

        @include('component.csd-card')

        @include('component.insurance')


        <div class="d-flex justify-content-between my-4">
{{--            <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>--}}
            <a href="{{ route('families.index',[$army->id]) }}" class="btn btn-secondary">Back</a>
            <a href="{{ route('professional.index', $army->id) }}" class="btn btn-success px-5">Next Step</a>
        </div>

    </div>

@endsection
