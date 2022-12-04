<?php
namespace App\Http\Traits;
use App\Models\User;
use App\Models\Student;

trait AuthTrait {
    public function index() {
        // Fetch all the students from the 'student' table.
        $users = User::all();
        return view('welcome')->with(compact('student'));
    }

    public function getRoleIdForAuthUser($collection, $key, $identifier, $role)
    {
        $string  = $collection[$identifier]. ' '. $key;
        $permission = \Spatie\Permission\Models\Permission::where('name', $string)->first();
        $permissionIdArr = $role->permissions->pluck('id')->toArray();
        $checkStatus = in_array($permission->id, $permissionIdArr);
        if(($checkStatus)){
            return "checked";
        }
        return "";
    }
}
