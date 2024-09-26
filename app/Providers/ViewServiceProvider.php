<?php

namespace App\Providers;

// use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // view()->composer('user.include.navbar',function($view){
        //     $view->with('category',Category::select('id','name')->get());
        //     // $view->with('setting',Setting::select('logo','favicon')->first() );
        // });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
