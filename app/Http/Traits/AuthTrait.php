<?php
namespace App\Http\Traits;
use App\Models\User;
use App\Models\Student;

trait AuthTrait {
    public function index() {
        $users = User::all();
        return view('welcome')->with(compact('student'));
    }

    public function checkPermissionInputFields($permission, $role)
    {
        $permissionIdArr = $role->permissions->pluck('id')->toArray();
        $checkStatus = in_array($permission->id, $permissionIdArr);
        if(($checkStatus)){
            return "checked";
        }
        return "";
    }
}
