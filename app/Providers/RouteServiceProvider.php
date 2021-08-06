<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';
    // public const CLIENT =
    public const ADMIN = '/admin';

    protected $api_v1_namespace = 'App\\Http\\Controllers\\Api\\V1';
    protected $web_namespace = 'App\\Http\\Controllers\\Web';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            // load api routes
            $this->map_api_v1_routes();

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/client_web.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/doctor_web.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->prefix('admin')
                ->group(base_path('routes/admin_web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }

    /**
     * this function load the api routes for the version v1
     *
     * @return void
     */
    private function map_api_v1_routes()
    {
        Route::prefix('api/v1')
            ->middleware('api')
            ->namespace($this->api_v1_namespace)
            ->group(base_path('routes/api/v1.php'));
    }
}
