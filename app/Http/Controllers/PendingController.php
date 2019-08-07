<?php

namespace App\Http\Controllers;

use App\Army;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $armies = Army::where('registered', false)->paginate(15);
        return view('armies.pending', compact('armies'));
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
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Army $army
     * @return Response
     */
    public function show(Army $army)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Army $army
     * @return Response
     */
    public function edit(Army $army)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Army $army
     * @return Response
     */
    public function update(Request $request, Army $army)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Army $army
     * @return Response
     * @throws Exception
     */
    public function destroy(Army $army)
    {
        $army->delete();
        if (request()->has('redirect')) {
            return redirect(request()->get('redirect'))->with('flash_message', 'Pending Persona successfully updated.');
        }
        return redirect()->back()->with('flash_message', 'Pending Persona successfully updated.');
    }
}
