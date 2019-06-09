<?php

namespace App\Http\Controllers;

use App\Enums\BloodGroupType;
use App\Enums\MaritalStatusType;
use App\Enums\ReligionType;
use App\Http\Requests\PersonalDetailValidate;
use App\PersonalDetail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PersonalDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('users');
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
        return view('personal-details.create', compact('options'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PersonalDetailValidate $request
     * @return Response
     */
    public function store(PersonalDetailValidate $request)
    {
        $army = PersonalDetail::create($request->all());
        session(['army' => $army->id]);
        return redirect()->route('family.create');
    }

    /**
     * Display the specified resource.
     *
     * @param PersonalDetail $army
     * @return void
     */
    public function show(PersonalDetail $army)
    {
        return $army;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PersonalDetail $personalDetail
     * @return Response
     */
    public function edit(PersonalDetail $personalDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param PersonalDetail $personalDetail
     * @return Response
     */
    public function update(Request $request, PersonalDetail $personalDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PersonalDetail $personalDetail
     * @return Response
     */
    public function destroy(PersonalDetail $personalDetail)
    {
        //
    }
}
