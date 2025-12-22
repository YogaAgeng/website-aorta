<?php

namespace App\Providers;

use App\Models\Artikel;
use App\Models\Project;
use App\Policies\ArtikelPolicy;
use App\Policies\ProjectPolicy;
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
        Artikel::class => ArtikelPolicy::class,
        Project::class => ProjectPolicy::class,
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Define gates for admin access
        Gate::before(function ($user, $ability) {
            if ($user->isAdmin()) {
                return true;
            }
        });

        // Define specific permissions
        Gate::define('manage_artikel', function ($user) {
            return $user->isAdmin();
        });

        Gate::define('manage_project', function ($user) {
            return $user->isAdmin();
        });
    }
}
