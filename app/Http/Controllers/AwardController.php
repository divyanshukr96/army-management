<?php

namespace App\Http\Controllers;

use App\Army;
use App\Award;
use App\Http\Requests\AwardStoreValidate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AwardController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:army-add|army-edit'])->only(['store', 'edit', 'update']);
        $this->middleware(['permission:army-delete'])->only(['destroy']);
    }

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
     * @param AwardStoreValidate $request
     * @param Army $army
     * @return Response
     */
    public function store(AwardStoreValidate $request, Army $army)
    {
        $army->awards()->save(new Award($request->all()));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param Award $award
     * @return Response
     */
    public function show(Award $award)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Award $award
     * @return Response
     */
    public function edit(Award $award)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Award $award
     * @return Response
     */
    public function update(Request $request, Award $award)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Award $award
     * @return Response
     */
    public function destroy(Award $award)
    {
        //
    }
}
