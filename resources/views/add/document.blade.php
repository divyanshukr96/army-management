@extends('layouts.app')
@section('content')
    <div class="container px-0">
        @include('add.include.details')

        @include('component.document')

        @include('component.account')

        @include('component.csd-card')

        @include('component.insurance')

        <div class="d-flex justify-content-between mt-5">
            <a href="{{ route('add.family',$army->id) }}" class="btn btn-secondary">Back</a>
            <a href="{{ route('add.professional',$army->id) }}" class="btn btn-success">Proceed Next</a>
        </div>

    </div>
@endsection
