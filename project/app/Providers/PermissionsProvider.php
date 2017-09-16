<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Orchid\Platform\Kernel\Dashboard;

class PermissionsProvider extends ServiceProvider
{
    protected $defer = false;
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Dashboard $dashboard)
    {
        $permission = $this->registerPermissions();
        $dashboard->permission->registerPermissions($permission);
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function registerPermissions()
    {
        return [
            'Main' => [
                [
                    'slug'        => 'dashboard.calculator',
                    'description' => 'Calculator settings',
                ],
                [
                    'slug'        => 'dashboard.create.company',
                    'description' => 'Companies creator',
                ],
            ],

        ];
    }
}
