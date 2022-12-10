<?php
namespace App\Http\Traits;
use App\Models\User;
use ReflectionClass;
use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

trait AuthTrait {

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

    public function getModelData($value, $id){
        $data = get_class($this)::find($id);
        if ($data){
            return $data->$value;
        }else{
            return "No ".$value." Found";
        }
    }

    public static function artisanCommands(){
        return [
            'migrate:fresh' => "Delete all Database Data",
            'migrate:fresh --seed' => "Delete all Database Data and reload Default Data",
            'optimize:clear' => "Optimize Application",
        ];
    }

    public static function jsonArtisanCommands(){
        return response()->json([
            'migrate:fresh' => "Delete all Database Data",
            'migrate:fresh --seed' => "Delete all Database Data and reload Default Data",
            'optimize:clear' => "Optimize Application",
        ]);
    }
}
