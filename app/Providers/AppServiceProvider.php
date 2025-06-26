<?php

namespace App\Providers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');

        Paginator::useBootstrap();

        Gate::define('admin', function(User $user){
            return $user->role === 'admin';
            
        });

        Gate::define('user', function(User $user){
            return $user->role === 'user';
            
        });

        Gate::define('kepala cabang', function(User $user){
            return $user->role === 'kepala cabang';
            
        });
    }
}
