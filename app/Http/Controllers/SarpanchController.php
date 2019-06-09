<?php

namespace App\Http\Controllers;

use App\Http\Requests\SarpanchStoreValidate;
use App\PersonalDetail;
use App\Sarpanch;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SarpanchController extends Controller
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
     * @param SarpanchStoreValidate $request
     * @return Response
     */
    public function store(SarpanchStoreValidate $request)
    {
        $army = PersonalDetail::find(session('army'));
        $army->sarpanch()->save(new Sarpanch($request->all()));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param Sarpanch $sarpanch
     * @return Response
     */
    public function show(Sarpanch $sarpanch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Sarpanch $sarpanch
     * @return Response
     */
    public function edit(Sarpanch $sarpanch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Sarpanch $sarpanch
     * @return Response
     */
    public function update(Request $request, Sarpanch $sarpanch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Sarpanch $sarpanch
     * @return Response
     */
    public function destroy(Sarpanch $sarpanch)
    {
        //
    }
}
