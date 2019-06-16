@php
    use App\Enums\RelationType;
    $wife = old('relation') == \App\Enums\RelationType::Wife;
    $child = old('relation') == \App\Enums\RelationType::Children;
    $family = (object)[
            'father' => $army->families()->whereRelation(RelationType::Father)->get(),
            'mother' => $army->families()->whereRelation(RelationType::Mother)->get(),
            'children' => $army->families()->whereRelation(RelationType::Children)->get(),
            'wife' => $army->families()->whereRelation(RelationType::Wife)->get(),
        ];
@endphp
@extends('layouts.details')
@section('details')



    <div class="card my-2 border-bottom">
        <div class="card-header py-2" id="familyHeading">
            <a class="btn btn-primary btn-sm float-right"
               href="{{ route('families.create',[$army->id, 'redirect'=> url()->full()]) }}"
               role="button">Add family details</a>
            <h5 class="mb-0 font-weight-bold">Family Details</h5>
        </div>
        <div class="card-body p-0 form-group-mb-0">
            @include('component.families')
        </div>
    </div>
@endsection
