<?php

namespace App\Providers;

use App\Http\Composers\MenuComposer;
use App\Observers\PostObserver;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Orchid\CMS\Core\Models\Post;
use Orchid\CMS\Providers\MenuServiceProvider;
use Orchid\Platform\Kernel\Dashboard;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dashboard $dashboard)
    {
        Post::observe(PostObserver::class);
        $dashboard->registerResource('stylesheets', asset('css/dashboard.css'));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
