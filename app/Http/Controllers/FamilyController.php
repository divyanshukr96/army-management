<?php

namespace App\Http\Controllers;

use App\Enums\BloodGroupType;
use App\Enums\DocumentType;
use App\Enums\MaritalStatusType;
use App\Enums\RelationType;
use App\Enums\ReligionType;
use App\Family;
use App\Http\Requests\FamilyStoreValidate;
use App\PersonalDetail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index1()
    {
        $options = [
            'marital_status' => MaritalStatusType::toSelectArray(),
            'blood_group' => BloodGroupType::toSelectArray(),
            'religion' => ReligionType::toSelectArray(),
            'relation' => RelationType::toSelectArray(),
            'document' => DocumentType::toSelectArray(),
        ];
//        session(['army' => '3c5ef973-cb76-4bd1-8765-9ac8f4d30322']);
//        session(['army' => 'cbfb7df0-41a6-42db-90bd-7589e78dcd6e']); //first
        $army = PersonalDetail::find(session('army'));
        $family = (object)[
            'father' => $army->family()->whereRelation(RelationType::Father)->get(),
            'mother' => $army->family()->whereRelation(RelationType::Mother)->get(),
            'children' => $army->family()->whereRelation(RelationType::Children)->get(),
            'wife' => $army->family()->whereRelation(RelationType::Wife)->get(),
        ];
        return view('family-details.view', compact('options', 'army', 'family'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $options = [
            'marital_status' => MaritalStatusType::toSelectArray(),
            'blood_group' => BloodGroupType::toSelectArray(),
            'religion' => ReligionType::toSelectArray(),
            'relation' => RelationType::toSelectArray(),
            'document' => DocumentType::toSelectArray(),
        ];
//        session(['army' => '3c5ef973-cb76-4bd1-8765-9ac8f4d30322']);
//        session(['army' => 'cbfb7df0-41a6-42db-90bd-7589e78dcd6e']); //first
        $army = PersonalDetail::find(session('army'));
        $family = (object)[
            'father' => $army->family()->whereRelation(RelationType::Father)->get(),
            'mother' => $army->family()->whereRelation(RelationType::Mother)->get(),
            'children' => $army->family()->whereRelation(RelationType::Children)->get(),
            'wife' => $army->family()->whereRelation(RelationType::Wife)->get(),
        ];
        return view('family-details.view', compact('options', 'army', 'family'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $options = [
            'marital_status' => MaritalStatusType::toSelectArray(),
            'blood_group' => BloodGroupType::toSelectArray(),
            'religion' => ReligionType::toSelectArray(),
            'relation' => RelationType::toSelectArray(),
        ];
        $family = PersonalDetail::find(session('army'))->family;
        return view('family-details.create', compact('options', 'family'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FamilyStoreValidate $request
     * @return void
     */
    public function store(FamilyStoreValidate $request)
    {
        $army = PersonalDetail::find(session('army'));
        $data = $request->except(['dom', 'pan_card', 'certificate']);
        if (RelationType::Wife === $request->get('relation')) $data = $request->all();
        if (RelationType::Children === $request->get('relation')) $data = $request->except(['dom', 'pan_card']);
        $army->family()->save(new Family($data));
        return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param Family $family
     * @return Response
     */
    public function show(Family $family)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Family $family
     * @return Response
     */
    public function edit(Family $family)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Family $family
     * @return Response
     */
    public function update(Request $request, Family $family)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Family $family
     * @return Response
     */
    public function destroy(Family $family)
    {
        //
    }
}
