<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();

        Gate::define('permission', function ($id) {
            $id = $id->role_id;
            if ($id == 2 || $id = 3) {
                return true;
            }
        });
        Gate::define('manager', function ($id) {
            $id = $id->role_id;
            if ($id == 1 || $id == 2) {
                return true;
            }
        });
    }
}
