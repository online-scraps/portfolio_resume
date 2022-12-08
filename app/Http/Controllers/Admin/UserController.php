<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Traits\AuthTrait;

class UserController extends Controller
{
    use AuthTrait;
    protected $user;

    public function __construct()
    {
        $this->user = Auth::user();
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->checkCRUDPermission('App\Models\User', 'list');
        $this->data['users'] = User::all();
        $this->data['roles'] = Role::all();
        return view('ar.auth.user', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $this->checkCRUDPermission('App\Models\User', 'create');
        $roleId = $request->role_id;
        $role = Role::find($roleId);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $user->assignRole($role);

        return redirect()->back()->with('success', 'User Created Successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $this->checkCRUDPermission('App\Models\User', 'update');
        $roleId = $request->role_id;
        $role = Role::find($roleId);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $user->assignRole($role);

        return redirect()->back()->with('success', 'User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(
            [
                'status' => 'success',
                'message' => 'User Deleted Successfully.',
            ]
        );
    }

    public function assignRoleToUser(Request $request, $id)
    {
        $roleId = $request->role_id;
        $role = Role::find($roleId);

        $user = User::find($id);
        $user->assignRole($role);

        return redirect()->back()->with('success', 'Role assigned Successfully');
    }

    public function myProfileView()
    {
        return view('ar.auth.profile');
    }
}
