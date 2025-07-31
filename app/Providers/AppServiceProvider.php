<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\ForcePasswordReset;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     */
    protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     */
    public function boot(): void
    {
        // Register custom middleware aliases
        $this->app['router']->aliasMiddleware('is_admin', IsAdmin::class);
        $this->app['router']->aliasMiddleware('force_password_reset', ForcePasswordReset::class);

        parent::boot();
    }
    
}
