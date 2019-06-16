<?php

namespace App\Http\Controllers;

use App\Army;
use App\CSDCard;
use App\Document;
use App\Http\Requests\CSDCardStoreValidate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CSDCardController extends Controller
{

    /**
     * CSDCardController constructor.
     */
    public function __construct()
    {
        $this->middleware('permission:army-add')->only(['store']);
        $this->middleware('permission:army-add|army-edit')->only(['edit', 'update']);
        $this->middleware('permission:army-delete')->only('destroy');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CSDCardStoreValidate $request
     * @param Army $army
     * @return Response
     */
    public function store(CSDCardStoreValidate $request, Army $army)
    {
        if (empty($request->liquor) && empty($request->grocery)) {
            return redirect()->back();
        }
        $army->csdCard()->save(new CSDCard($request->all()));
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Army $army
     * @param CSDCard $cSDCard
     * @return void
     */
    public function edit(Army $army, CSDCard $card)
    {
        return view('csdcard.edit', compact('army', 'card'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CSDCardStoreValidate $request
     * @param Army $army
     * @param CSDCard $card
     * @return void
     */
    public function update(CSDCardStoreValidate $request, Army $army, CSDCard $card)
    {
        $card->fill($request->all());
        $card->save();
        if (request()->has('redirect')) {
            return redirect(request()->get('redirect'))->with('flash_message', 'CSD Card successfully updated.');
        }
        return redirect()->back()->with('flash_message', 'CSD Card successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Army $army
     * @param CSDCard $cSDCard
     * @return void
     */
    public function destroy(Army $army, CSDCard $card)
    {
        $card->delete();
        return redirect()->back()->with('flash_message', 'CSD Card successfully deleted.');
    }
}
