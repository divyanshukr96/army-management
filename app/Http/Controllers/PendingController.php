<?php

namespace App\Http\Controllers;

use App\Army;
use Illuminate\Http\Request;

class PendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $armies = Army::where('registered', false)->paginate(15);
        return view('armies.pending', compact('armies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Army  $army
     * @return \Illuminate\Http\Response
     */
    public function show(Army $army)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Army  $army
     * @return \Illuminate\Http\Response
     */
    public function edit(Army $army)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Army  $army
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Army $army)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Army  $army
     * @return \Illuminate\Http\Response
     */
    public function destroy(Army $army)
    {
        //
    }
}
