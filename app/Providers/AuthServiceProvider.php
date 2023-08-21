<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('isUser',function(User $user){
            return $user->role == 'user';
        });
        Gate::define('isProf',function(User $user){
            return $user->role == 'prof';
        });
        Gate::define('isAdmin',function(User $user){
            return $user->role == 'admin' || $user->role == 'super_admin';
        });
        Gate::define('isSupAdmin',function(User $user){
            return $user->role == 'super_admin';
        });
        
    }
}
