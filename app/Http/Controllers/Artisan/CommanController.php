<?php

namespace App\Http\Controllers\Artisan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class CommanController extends Controller
{
    public function migrateFresh()
    {
        Artisan::call('migrate:fresh');
        return response()->json([
            'status' => 'success',
            'message' => 'Migrated successfully'
        ]);
    }

    public function migrateFreshSeed()
    {
        Artisan::call('migrate:fresh --seed');
        return response()->json([
            'status' => 'success',
            'message' => 'Migrated and Seeded successfully'
        ]);
    }

    public function optimizeClear()
    {
        Artisan::call('optimize:clear');
        return response()->json([
            'status' => 'success',
            'message' => 'Optimized successfully'
        ]);
    }

    public function executeCommand(Request $request)
    {
        Artisan::call($request->command);
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully Executed'
        ]);
    }
}
