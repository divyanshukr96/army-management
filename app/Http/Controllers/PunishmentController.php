<?php

namespace App\Http\Controllers;

use App\Army;
use App\Http\Requests\PunishmentStoreValidate;
use App\PersonalDetail;
use App\Punishment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PunishmentController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role_or_permission:army-add|punishment'])->only(['create', 'store',]);
        $this->middleware(['role_or_permission:army-add|army-edit|punishment'])->only(['edit', 'update']);
        $this->middleware(['permission:army-delete'])->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $punishments = Punishment::paginate(15);
        return view('punishments.index', compact('punishments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Army $army
     * @return Response
     */
    public function create(Army $army)
    {
        return view('punishments.create', compact('army'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PunishmentStoreValidate $request
     * @param Army $army
     * @return Response
     */
    public function store(PunishmentStoreValidate $request, Army $army)
    {
        $army->punishments()->save(new Punishment($request->all()));
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
        return view('punishments.show', compact('punishment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Army $army
     * @param Punishment $punishment
     * @return Response
     */
    public function edit(Army $army, Punishment $punishment)
    {
        return view('punishments.edit', compact('army', 'punishment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PunishmentStoreValidate $request
     * @param Army $army
     * @param Punishment $punishment
     * @return Response
     */
    public function update(PunishmentStoreValidate $request, Army $army, Punishment $punishment)
    {
        $punishment->fill($request->all());
        $punishment->save();
        if (request()->has('redirect')) return redirect(request()->redirect);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Army $army
     * @param Punishment $punishment
     * @return Response
     * @throws \Exception
     */
    public function destroy(Army $army, Punishment $punishment)
    {
        $punishment->delete();
        return redirect()->back();
    }
}
