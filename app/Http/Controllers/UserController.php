<?php

namespace App\Http\Controllers;


use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware('role_or_permission:super-admin|user-view')->only('index');
        $this->middleware('role_or_permission:super-admin|user-add')->except(['delete', 'update']);
        $this->middleware('role_or_permission:super-admin|user-edit')->except(['create', 'store', 'delete']);
        $this->middleware('role_or_permission:super-admin|user-delete')->only(['index', 'delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::whereNotExists(function ($query) {
            $query->select(DB::raw(1))->from('armies')->whereRaw('armies.regd_no = users.username');
        })->get();

        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //Get all roles and pass it to the view
        $roles = Role::get();
        return view('users.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:8|max:100',
            'username' => 'required|min:8|max:50|unique:users',
            'email' => 'required|email|min:8|max:50|unique:users',
            'password' => 'required|min:8|max:100|confirmed',
        ]);
        $user = User::create($request->all());

        $roles = $request['roles']; //Retrieving the roles field
        //Checking if a role was selected
        if (isset($roles)) {

            foreach ($roles as $role) {
                $role_r = Role::where('id', '=', $role)->firstOrFail();
                $user->assignRole($role_r); //Assigning role to user
            }
        }
        //Redirect to the users.index view and display message

        return redirect()->route('users.index')
            ->with('flash_message', 'User successfully added.');
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
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id); //Get user with specified id
        $roles = Role::get(); //Get all roles

        if ($user->army) return redirect()->back();

        return view('users.edit', compact('user', 'roles')); //pass user and roles data to view
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id); //Get role specified by id

        //Validate name, email and password fields
        $this->validate($request, [
            'name' => 'required|max:120',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6|confirmed'
        ]);
        $input = $request->only(['name', 'email']); //Retrieve the name, email and password fields
        $roles = $request['roles']; //Retrieve all roles
        if ($request->get('password')) $user->fill($request->only('password'));
        $user->fill($input)->save();

        if (isset($roles)) {
            $authUser = auth()->user();
            if (!$authUser->hasRole('super-admin')) {
                if (in_array(Role::findByName('super-admin')->id, $roles)) {
                    throw ValidationException::withMessages([
                        'role' => ["You can't assign super-admin role to any user"],
                    ]);
                }
            } elseif ($authUser->id == $id && !in_array(Role::findByName('super-admin')->id, $roles)) {
                throw ValidationException::withMessages([
                    'role' => ["You can't remove super-admin role from self"],
                ]);
            }

            $user->roles()->sync($roles);  //If one or more role is selected associate user to roles
        } else {
            $user->roles()->detach(); //If no role is selected remove existing role associated to a user
        }
        return redirect()->route('users.index')
            ->with('flash_message',
                'User successfully edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')
            ->with('flash_message',
                'User successfully deleted.');
    }
}
