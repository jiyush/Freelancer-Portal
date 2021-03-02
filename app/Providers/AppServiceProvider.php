<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Role;
use App\Models\User;

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
        view()->composer(['auth.*','admin.*'], function ($view) {
            $view->with('roles', Role::where('name','!=','admin')->orderBy('name')->get());
        });

        // Provide user data to admin user blade
        view()->composer('admin.user', function ($view) {
            $view->with('users', User::where('role','!=','admin')->orderBy('name')->get());
        });
    }
}
