<?php

namespace App\Http\Controllers;

use App\Account;
use App\Http\Requests\AccountStoreValidate;
use App\PersonalDetail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AccountController extends Controller
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
     * @param AccountStoreValidate $request
     * @return Response
     */
    public function store(AccountStoreValidate $request)
    {
        $army = PersonalDetail::find(session('army'));
        $army->account()->save(new Account($request->all()));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param Account $account
     * @return Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Account $account
     * @return Response
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Account $account
     * @return Response
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Account $account
     * @return Response
     */
    public function destroy(Account $account)
    {
        //
    }
}
