<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // these gates are pretty self explanatory
        Gate::define('isAdmin', function($user){
            return $user->user_role == 'Admin';
        });
        Gate::define('isNotAdmin', function($user){
            return $user->user_role != 'Admin';
        });

        Gate::define('isMale', function($user){
            return $user->user_gender == 'Male';
        });
        Gate::define('isNotMale', function($user){
            return $user->user_gender != 'Male';
        });
    }
}
