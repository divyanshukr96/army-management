<?php

namespace App\Http\Controllers;

use App\Http\Requests\PunishmentStoreValidate;
use App\PersonalDetail;
use App\Punishment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PunishmentController extends Controller
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
     * @param PunishmentStoreValidate $request
     * @return Response
     */
    public function store(PunishmentStoreValidate $request)
    {
        $army = PersonalDetail::find(session('army'));
        $army->punishment()->save(new Punishment($request->all()));
        if (request()->has('redirect')) return redirect(request()->redirect);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param Punishment $punishment
     * @return Response
     */
    public function show(Punishment $punishment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Punishment $punishment
     * @return Response
     */
    public function edit(Punishment $punishment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Punishment $punishment
     * @return Response
     */
    public function update(Request $request, Punishment $punishment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Punishment $punishment
     * @return Response
     */
    public function destroy(Punishment $punishment)
    {
        //
    }
}
