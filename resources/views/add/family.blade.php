@php
    $wife = old('relation') == \App\Enums\RelationType::Wife;
    $child = old('relation') == \App\Enums\RelationType::Children;
@endphp
@extends('layouts.app')
@section('content')
    <div class="container px-0">
        @include('add.include.details')

        @includeWhen(count($army->family) > 0,'add.include.family-details')

        <div class="d-flex justify-content-end">
            <a href="{{ route('family.create',[$army->id, 'redirect'=> url()->full()]) }}"
               class="btn btn-info mb-2">Add Family Details</a>
        </div>



        <div class="d-flex justify-content-between mt-5">
            <a href="{{ route('army.create') }}" class="btn btn-danger">Close</a>
            <a href="{{ route('add.document',$army->id) }}" class="btn btn-success">Proceed Next</a>
        </div>
    </div>
@endsection
