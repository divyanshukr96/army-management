<?php

namespace App\Http\Controllers;

use App\Http\Requests\InsuranceStoreValidate;
use App\Insurance;
use App\PersonalDetail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InsuranceController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param InsuranceStoreValidate $request
     * @return Response
     */
    public function store(InsuranceStoreValidate $request)
    {
        $army = PersonalDetail::find(session('army'));
        $army->insurance()->save(new Insurance($request->all()));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param Insurance $insurance
     * @return Response
     */
    public function show(Insurance $insurance)
    {
        //
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
    public function destroy(Insurance $insurance)
    {
        //
    }
}
