<?php

namespace App\Http\Controllers;

use App\Army;
use App\Http\Requests\InsuranceStoreValidate;
use App\Insurance;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InsuranceController extends Controller
{

    /**
     * InsuranceController constructor.
     */
    public function __construct()
    {
        $this->middleware('permission:army-add|army-edit')->only(['store', 'edit', 'update']);
        $this->middleware('permission:army-delete')->only('destroy');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param InsuranceStoreValidate $request
     * @param Army $army
     * @return Response
     */
    public function store(InsuranceStoreValidate $request, Army $army)
    {
        $army->insurances()->save(new Insurance($request->all()));
        return redirect()->back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Insurance $insurance
     * @return Response
     */
    public function edit(Insurance $insurance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Insurance $insurance
     * @return Response
     */
    public function update(Request $request, Insurance $insurance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Insurance $insurance
     * @return Response
     */
    public function destroy(Army $army, Insurance $insurance)
    {
        $insurance->delete();
        return redirect()->back()
            ->with('flash_message', 'Insurance / Policy successfully deleted.');
    }
}
