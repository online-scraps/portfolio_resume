<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    // public function boot()
    // {
    //     $userId = Auth::id();
    //     $user = User::find($userId);
    //     dd(request()->user(),  auth()->user(), Auth::check(), $userId, $user, User::find(1));
    //     if(Auth::check()){
    //         view()->share('user', Auth::user());
    //     }
    //     view()->composer('layouts.ar', function ($view)  use ($user){
    //         $view->with('user', $user);
    //     });
    //     // $this->menuItems = ["Home", "About Us", "Contact"];
    //     // $this->appData = AppSetting::first();

    //     // view()->composer(['layouts.shop', 'layouts.billing'], function ($view) {
    //     //     $view->with([
    //     //         'menuItems' => $this->menuItems,
    //     //         'appData' => $this->appData,
    //     //     ]);
    //     // });
    // }
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        // dd($request->user());
        view()->share('user', $request->user());
    }
}
