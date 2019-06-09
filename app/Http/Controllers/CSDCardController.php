<?php

namespace App\Http\Controllers;

use App\CSDCard;
use App\Document;
use App\Http\Requests\CSDCardStoreValidate;
use App\PersonalDetail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CSDCardController extends Controller
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
     * @param CSDCardStoreValidate $request
     * @return Response
     */
    public function store(CSDCardStoreValidate $request)
    {
        $army = PersonalDetail::find(session('army'));
        $army->csdCard()->save(new CSDCard($request->all()));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param CSDCard $cSDCard
     * @return Response
     */
    public function show(CSDCard $cSDCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CSDCard $cSDCard
     * @return Response
     */
    public function edit(CSDCard $cSDCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param CSDCard $cSDCard
     * @return Response
     */
    public function update(Request $request, CSDCard $cSDCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CSDCard $cSDCard
     * @return Response
     */
    public function destroy(CSDCard $cSDCard)
    {
        //
    }
}
