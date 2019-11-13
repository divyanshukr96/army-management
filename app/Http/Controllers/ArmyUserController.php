<?php

namespace App\Http\Controllers;

use App\Army;
use App\Http\Requests\ArmyUserCreateValidation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class ArmyUserController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param ArmyUserCreateValidation $request
     * @param Army $army
     * @return Response
     */
    public function store(ArmyUserCreateValidation $request, Army $army)
    {
        if ($army->regd_no !== $request->get('username')) {
            return redirect()->back();
        }
        User::create([
            'username' => $request->get('username'),
            'password' => $request->get('password'),
            'email' => $army->email,
            'name' => $army->name,
        ]);

        return redirect()->back()->with('success','User created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Army $army
     * @param User $user
     * @return Response
     * @throws ValidationException
     */
    public function update(Request $request, Army $army, User $user)
    {
        $this->validate($request, [
            'password' => 'required|min:6|max:20'
        ]);
        if ($army->regd_no === $user->username) {
            $user->password = $request->get('password');
            $user->save();
        }
        return redirect()->back()->with('success','Password changed successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
