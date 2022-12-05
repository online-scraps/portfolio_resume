<?php

use App\Models\Projects;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('hr.index');
});

Route::get('/a', function () {
    return view('ar.dashboard');
});

// Route::view('/bc', 'ar.blog.category');
// Route::view('/bt', 'ar.blog.tag');
// Route::view('/bt', 'ar.blog.tag');
// Route::view('/edu', 'ar.eductaion');
// Route::view('/exp', 'ar.experience');
// Route::view('/ski', 'ar.skill');
// Route::view('/ser', 'ar.service');
// Route::view('/soc', 'ar.socialMedia');
// Route::view('/test', 'ar.testimonial');

// Route::get('/p',function () {
//     $projects = Projects::all();
//     return view('ar.project', compact('projects'));
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::name('admin.')
    ->prefix('admin/')
    ->middleware('auth')
    ->group(function () {
        Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::resource('/projects', App\Http\Controllers\Admin\ProjectsController::class)->except('create', 'edit', 'show');
        Route::resource('/roles', App\Http\Controllers\Admin\RoleController::class)->except('create', 'edit', 'show');
        Route::resource('/users', App\Http\Controllers\Admin\Auth\UserController::class)->except('create', 'edit', 'show');
        Route::get('/permissions',[App\Http\Controllers\Admin\PermissionsController::class, 'index'])->name('permissions');
        Route::get('/permissions/generate',[App\Http\Controllers\Admin\PermissionsController::class, 'generatePermissions'])->name('permissions.generate');
    });
