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
        $this->middleware('permission:leave-add|army-add|army-edit')->only(['store']);

//        $this->middleware('permission:army-add|army-edit')->only(['edit', 'update']);

        $this->middleware('permission:army-delete|leave-delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $leaves = Leave::whereDate('to', '>=', Carbon::today()->toDateString() )->paginate(15);
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
     * @param PersonalDetail $army
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
     * @param Leave $leave
     * @return Response
     */
    public function show(Leave $leave)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Leave $leave
     * @return Response
     */
    public function edit(Leave $leave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Leave $leave
     * @return Response
     */
    public function update(Request $request, Leave $leave)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $army
     * @param Leave $leave
     * @return Response
     * @throws Exception
     */
    public function destroy($army, Leave $leaf)
    {
        $leaf->delete();
        return redirect()->back()->with('flash_message', 'Leave detail successfully deleted.');
    }
}
