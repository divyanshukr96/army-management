<?php

namespace App\Http\Controllers;

use App\Address;
use App\Army;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Army $army, Address $address)
    {
        return view('address.edit', compact('army', 'address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Army $army
     * @param \App\Address $address
     * @return \Illuminate\Http\Response
     * @throws ValidationException
     */
    public function update(Request $request, Army $army, Address $address)
    {
        $this->validate($request, [
            'state' => 'required|string|max:50',
            'district' => 'required|string|max:50',
            'pin_code' => 'required|numeric|digits:6',
            'address' => 'required|string|max:300',
        ]);
        $address->fill($request->all());
        $address->save();
        return redirect()->route('armies.show', $army->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        //
    }
}
