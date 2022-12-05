<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use App\Models\Permission;

class PermissionsController extends Controller
{
    public function index()
    {
        $this->data['permissions'] = Permission::all();
        return view('ar.auth.permissions', $this->data);
    }

    public function generatePermissions()
    {
        Artisan::call('generate:permissions');
        return redirect()->back();
    }
}
