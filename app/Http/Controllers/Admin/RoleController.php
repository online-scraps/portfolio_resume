<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Traits\AuthTrait;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    use AuthTrait;

    /**
     * RoleController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->checkCRUDPermission('App\Models\Role', 'list');
        $this->data['roles'] = Role::with('users')->get();
        $this->data['permissions'] = Permission::all();

        return view('ar.auth.role', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->checkCRUDPermission('App\Models\Role', 'create');
        $role = Role::create(['name' => $request->name]);
        $permissions = Permission::findMany(array_keys($request->permissions));
        // foreach ($permissions as $permission) {
        //     $role->givePermissionTo($permission);
        // }
        $role->syncPermissions($permissions);
        return redirect()->back()->with('success', 'Role created successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->checkCRUDPermission('App\Models\Role', 'update');
        $role = Role::find($id);
        $role->update(['name', $request->name]);
        // $role->name = $request->name;
        // $role->save();
        $permissions = Permission::findMany(array_keys($request->permissions));
        $role->syncPermissions($permissions);
        return redirect()->back()->with('success', 'Role Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->checkCRUDPermission('App\Models\Role', 'delete');
        $role = Role::find($id);
        $role->delete();
        return redirect()->back()->with('success', 'Role deleted successfully');
    }
}
