<?php

namespace App\Http\Controllers;

use App\Army;
use App\Http\Requests\LeaveStoreValidate;
use App\Leave;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LeaveController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:leave-add|army-add|army-edit')->only(['create', 'store']);

        $this->middleware('permission:army-add|army-edit|leave-edit')->only(['edit', 'update']);

        $this->middleware('permission:army-delete|leave-delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $leaves = Leave::whereDate('to', '>=', Carbon::today()->toDateString())->paginate(15);
        return view('leaves.index', compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Army $army
     * @return Response
     */
    public function create(Army $army)
    {
        return view('leaves.create', compact('army'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LeaveStoreValidate $request
     * @param Army $army
     * @return void
     */
    public function store(LeaveStoreValidate $request, Army $army)
    {
        $army->leaves()->save(new Leave($request->all()));
        if (request()->has('redirect')) {
            return redirect(request()->get('redirect'))->with('flash_message', 'Leave detail successfully added.');
        }
        return redirect()->back()->with('flash_message', 'Leave detail successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param Leave $leaf
     * @return void
     */
    public function show(Leave $leaf)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Army $army
     * @param Leave $leaf
     * @return Response
     */
    public function edit(Army $army, Leave $leaf)
    {
        return view('leaves.edit', compact('army', 'leaf'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Army $army
     * @param Leave $leaf
     * @return void
     */
    public function update(Request $request, Army $army, Leave $leaf)
    {
        $leaf->update($request->all());
        if (request()->has('redirect')) {
            return redirect(request()->get('redirect'))->with('flash_message', 'Leave detail successfully updated.');
        }
        return redirect()->back()->with('flash_message', 'Leave detail successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $army
     * @param Leave $leaf
     * @return Response
     * @throws Exception
     */
    public function destroy($army, Leave $leaf)
    {
        $leaf->delete();
        if (request()->has('redirect')) {
            return redirect(request()->get('redirect'))->with('flash_message', 'Leave detail successfully updated.');
        }
        return redirect()->back()->with('flash_message', 'Leave detail successfully updated.');
    }
}
