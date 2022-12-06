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


// Route::view('/soc', 'ar.socialMedia');

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

        //!! Blog Routes
        Route::resource('/blog-category', App\Http\Controllers\Admin\BlogCategoryController::class)->except('create', 'edit', 'show');
        Route::resource('/blog-tag', App\Http\Controllers\Admin\BlogTagController::class)->except('create', 'edit', 'show');
        Route::resource('/blog-post', App\Http\Controllers\Admin\BlogPostController::class)->except('create', 'edit', 'show');

        Route::resource('/education', App\Http\Controllers\Admin\EducationController::class)->except('create', 'edit', 'show');
        Route::resource('/experience', App\Http\Controllers\Admin\ExperienceController::class)->except('create', 'edit', 'show');
        Route::resource('/message', App\Http\Controllers\Admin\MessageController::class)->except('create', 'edit', 'show');
        Route::resource('/projects', App\Http\Controllers\Admin\ProjectsController::class)->except('create', 'edit', 'show');
        Route::resource('/services', App\Http\Controllers\Admin\ServicesController::class)->except('create', 'edit', 'show');
        Route::resource('/skill', App\Http\Controllers\Admin\SkillsController::class)->except('create', 'edit', 'show');
        Route::resource('/socialmedia', App\Http\Controllers\Admin\SocialMediaController::class)->except('create', 'edit', 'show');
        Route::resource('/testimonials', App\Http\Controllers\Admin\TestimonialController::class)->except('create', 'edit', 'show');

        //!! Authentication Routes
        Route::resource('/roles', App\Http\Controllers\Admin\RoleController::class)->except('create', 'edit', 'show');
        Route::get('/permissions',[App\Http\Controllers\Admin\PermissionsController::class, 'index'])->name('permissions');
        Route::get('/permissions/generate',[App\Http\Controllers\Admin\PermissionsController::class, 'generatePermissions'])->name('permissions.generate');
        Route::resource('/users', App\Http\Controllers\Admin\UserController::class)->except('create', 'edit', 'show');
        Route::post('/users/assign-role', [App\Http\Controllers\Admin\UserController::class, 'assignRoleToUser'])->name('user.assignrole');

    });
