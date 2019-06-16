<?php

namespace App\Http\Controllers;

use App\Army;
use App\Http\Requests\SarpanchStoreValidate;
use App\PersonalDetail;
use App\Sarpanch;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SarpanchController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:army-add')->only(['store']);
        $this->middleware('permission:army-add|army-edit')->only(['edit', 'update']);
        $this->middleware('permission:army-delete')->only('destroy');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SarpanchStoreValidate $request
     * @param Army $army
     * @return Response
     */
    public function store(SarpanchStoreValidate $request, Army $army)
    {
        $army->sarpanch()->save(new Sarpanch($request->all()));
        return redirect()->back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Army $army
     * @param Sarpanch $sarpanch
     * @return void
     */
    public function edit(Army $army, Sarpanch $sarpanch)
    {
        return view('sarpanch.edit', compact('army', 'sarpanch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Army $army
     * @param Sarpanch $sarpanch
     * @return void
     */
    public function update(SarpanchStoreValidate $request, Army $army, Sarpanch $sarpanch)
    {
        $sarpanch->fill($request->all());
        $sarpanch->save();

        if (request()->has('redirect')){
            return redirect(request()->get('redirect'))->with('flash_message', 'Sarpanch successfully updated.');
        }
        return redirect()->back()->with('flash_message', 'Sarpanch successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Army $army
     * @param Sarpanch $sarpanch
     * @return void
     */
    public function destroy(Army $army, Sarpanch $sarpanch)
    {
        $sarpanch->delete();
        return redirect()->back()
            ->with('flash_message', 'Sarpanch successfully deleted.');
    }
}
