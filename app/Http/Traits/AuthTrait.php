<?php
namespace App\Http\Traits;
use App\Models\User;
use ReflectionClass;
use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

trait AuthTrait {
    public function index() {
        $users = User::all();
        return view('welcome')->with(compact('student'));
    }

    public static function checkPermissionInputFields($permission, $role)
    {
        $permissionIdArr = $role->permissions->pluck('id')->toArray();
        $checkStatus = in_array($permission->id, $permissionIdArr);
        if(($checkStatus)){
            return "checked";
        }
        return "";
    }

    public function checkCRUDPermission($modelName, $method)
    {
        $reflection = new ReflectionClass($modelName);
        $user = User::find(Auth::id());
        $permission = $user->hasPermissionTo($method.' '.Str::lower($reflection->getShortName()));
            if($permission){
                return;
            }else{
                abort(403);
            }
    }
}
