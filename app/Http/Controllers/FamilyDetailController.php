<?php

namespace App\Http\Controllers;

use App\Enums\BloodGroupType;
use App\Enums\MaritalStatusType;
use App\Enums\ReligionType;
use App\FamilyDetail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FamilyDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
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
            'religion' => ReligionType::toSelectArray()
        ];
        return view('family-details.create', compact('options'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param FamilyDetail $familyDetail
     * @return Response
     */
    public function show(FamilyDetail $familyDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param FamilyDetail $familyDetail
     * @return Response
     */
    public function edit(FamilyDetail $familyDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param FamilyDetail $familyDetail
     * @return Response
     */
    public function update(Request $request, FamilyDetail $familyDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param FamilyDetail $familyDetail
     * @return Response
     */
    public function destroy(FamilyDetail $familyDetail)
    {
        //
    }
}
