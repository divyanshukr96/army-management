<?php

namespace App\Http\Controllers;

use App\Account;
use App\Army;
use App\Http\Requests\AccountStoreValidate;
use App\PersonalDetail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AccountController extends Controller
{

    /**
     * AccountController constructor.
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
     * @param AccountStoreValidate $request
     * @param Army $army
     * @return Response
     */
    public function store(AccountStoreValidate $request, Army $army)
    {
        $army->account()->save(new Account($request->all()));
        return redirect()->back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Army $army
     * @param Account $account
     * @return void
     */
    public function edit(Army $army, Account $account)
    {
        return view('account.edit', compact('army', 'account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Army $army
     * @param Account $account
     * @return void
     */
    public function update(AccountStoreValidate $request, Army $army, Account $account)
    {
        $account->fill($request->all());
        $account->save();
        if (request()->has('redirect')) {
            return redirect(request()->get('redirect'))->with('flash_message', 'Account successfully updated.');
        }
        return redirect()->back()->with('flash_message', 'Account successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Army $army
     * @param Account $account
     * @return void
     */
    public function destroy(Army $army, Account $account)
    {
        $account->delete();
        return redirect()->back()->with('flash_message', 'Account successfully deleted.');
    }
}
