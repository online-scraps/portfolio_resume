<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['roles'] = Role::all();
        $this->data['permissions'] = Permission::all();
        $permName = [];
        $modelName = [];
        // $this->data['permissions']['permName'] = [];
        // $this->data['permissions']['modelName'] = [];
        // foreach ($this->data['permissions']->pluck('name') as $perm) {
            // $permission = explode(" ",$perm);
            // dd($permission[0], $permission[1]);
            // array_push($permName, $permission[0]);
            // array_push($modelName, $permission[1]);
        // }
        // dd($permName, $modelName);
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
        // dd($request->all());
        $role = Role::create(['name' => $request->name]);
        $permissions = Permission::findMany(array_keys($request->permissions));
        foreach ($permissions as $permission) {
            $role->givePermissionTo($permission);
        }
        return redirect()->back()->with('successMessage', 'Role created successfully');
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
        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();
        $permissions = Permission::findMany(array_keys($request->permissions));
        foreach ($permissions as $permission) {
            $role->givePermissionTo($permission);
        }
        return redirect()->back()->with('successMessage', 'Role Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->back()->with('successMessage', 'Role deleted successfully');
    }
}
