<?php

namespace App\Providers;

use App\Http\Composers\MenuComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Orchid\CMS\Providers\MenuServiceProvider as Menu;

class MenuServiceProvider extends ServiceProvider
{

/*    protected $defer = false;

    public function provides()
    {
        return [Menu::class];
    }
*/
    public function boot()
    {
        View::composer('dashboard::layouts.dashboard', MenuComposer::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
  /*      $this->app->singleton(Menu::class, function ($app) {
            dd([]);
        });
    */}
}
