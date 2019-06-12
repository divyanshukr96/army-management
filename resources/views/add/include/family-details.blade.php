@php
    use App\Enums\RelationType;
    $family = (object)[
                'father' => $army->family()->whereRelation(RelationType::Father)->get(),
                'mother' => $army->family()->whereRelation(RelationType::Mother)->get(),
                'children' => $army->family()->whereRelation(RelationType::Children)->get(),
                'wife' => $army->family()->whereRelation(RelationType::Wife)->get(),
            ];
@endphp
<div class="card mb-2">
    <div class="card-header py-2">
        <h5 class="mb-0 font-weight-bold">Family Details</h5>
    </div>
    <div class="card-body py-2 form-group-mb-0">
        @includeWhen(count($family->father) > 0,'family-details.family-details',['data' => $family->father, 'relation' => 'Father'])
        @includeWhen(count($family->mother) > 0,'family-details.family-details',['data' => $family->mother, 'relation' => 'Mother'])
        @includeWhen(count($family->wife) > 0,'family-details.family-details',['data' => $family->wife, 'relation' => 'Wife'])
        @includeWhen(count($family->children) > 0,'family-details.family-details',['data' => $family->children, 'relation' => 'Children'])
    </div>
</div>
