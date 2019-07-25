<?php

namespace App\Http\Controllers;

use App\Army;
use App\Professional;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class ProfessionalController extends Controller
{

    public function __construct()
    {
        $this->middleware('newArmy')->only(['index', 'store']);
        $this->middleware('permission:army-add')->only(['index', 'store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Army $army
     * @return Response
     */
    public function index(Army $army)
    {
        return view('professionals.create', compact('army'));
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
     * @param Request $request
     * @param Army $army
     * @return Response
     * @throws ValidationException
     */
    public function store(Request $request, Army $army)
    {
        $this->validate($request, [
            'complete' => 'required|accepted'
        ]);
        $army->registered = $request->get('complete');
        $army->save();
        return redirect()->back()->with('flash_message', 'New Army Details successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param Professional $professional
     * @return Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Professional $professional
     * @return Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Professional $professional
     * @return Response
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Professional $professional
     * @return Response
     */
    public function destroy()
    {
        //
    }
}
