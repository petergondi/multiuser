<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use App\Task;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // $userlogged=Auth::user()->id;
        Schema::defaultStringLength(191);
       // $usernew_task=Task::where('asignee_id',$userlogged)->where('status','no')->count();
        //View::share('usernew_task', $usernew_task);
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
