<?php

namespace App\Models;

use App\Models\Role;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRoleNameForAuthUser($userId)
    {
        $user = User::find($userId);
        $roles = array_values($user->getRoleNames()->toArray());
        if (count($roles) > 0){
            return implode(", ", $roles);
        }else{
            return "No Role Assigned";
        }
    }

    public function getRoleIdForAuthUser($userId, $roleId)
    {
        $user = User::find($userId);
        $roles = array_values($user->getRoleNames()->toArray());
        if (count($roles) > 0){
            $rolesId = Role::where('name', $roles[0])->first()->id;
            if($rolesId == $roleId){
                return true;
            }
        }
        return false;
    }

    public function getOldEmailForEdit($userId)
    {
        $user = User::find($userId);
        if($user){
            return $user->email;
        }else{
            return "";
        }
    }

    public function getOldNameForEdit($userId)
    {
        $user = User::find($userId);
        if($user){
            return $user->name;
        }else{
            return "";
        }
    }

    public function maintainerCheck()
    {
        // if($this){
            $status = $this->hasAnyRole('maintainer|super_admin');
            if($status){
                return true;
            }
        // }
        
        return false;
    }

    // public function (Type $var = null)
    // {
    //     # code...
    // }
}
