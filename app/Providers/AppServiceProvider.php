<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Role;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // provide  user roles data to auth view
        view()->composer('auth.*', function ($view) {
            $view->with('roles', Role::where('name','!=','admin')->orderBy('name')->get());
        });
    }
}
