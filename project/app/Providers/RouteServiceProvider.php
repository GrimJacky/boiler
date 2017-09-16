<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Orchid\CMS\Core\Models\Page;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->binding();
        parent::boot();
    }

    public function binding()
    {
        Route::bind('calculate', function ($value) {
            $company = Auth::user()->getRoles()->first();
            $users = [];
            foreach ($company->getUsers() as $user)
            {
                array_push($users, $user->id);
            }

            $page = Page::whereIn('user_id', $users)
                ->where('slug', $company->slug . '-' . $value)
                ->first();

            if(is_null($page))
            {
                $page = new Page([
                    'slug' => $company->slug . '-' . $value
                ]);
            }
            $page->slug = $value;
            $page->slug_prefix = $company->slug;
            return $page;
        });
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));

        Route::middleware('web')->group(base_path('routes/dashboard.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
