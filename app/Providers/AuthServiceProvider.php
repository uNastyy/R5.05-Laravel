<?php
namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-modules', function (User $user) {
            return $user->isProf();
        });

        Gate::define('manage-notes', function (User $user) {
            return $user->isProf();
        });

        Gate::define('manage-evaluations', function (User $user) {
            return $user->isProf();
        });
    }
}
