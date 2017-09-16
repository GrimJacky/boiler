<?php

/*
|--------------------------------------------------------------------------
| Company Page Web Routes
|--------------------------------------------------------------------------
|
| Base route
|
*/

$this->group([
    'middleware' => ['web', 'dashboard', 'access'],
    'prefix'     => 'dashboard/calculator/pages',
    'namespace'  => 'App\Http\Controllers\Dashboard',
],
    function (\Illuminate\Routing\Router $router) {
        $router->get('{calculate}', [
            'as'   => 'dashboard.calculator.pages.show',
            'uses' => 'PageController@show',
        ]);
        $router->put('{calculate}', [
            'as'   => 'dashboard.calculator.pages.update',
            'uses' => 'PageController@update',
        ]);
    });

$this->group([
    'middleware' => ['web', 'dashboard', 'access'],
    'prefix'     => 'dashboard',
    'namespace'  => 'App\Http\Controllers\Dashboard',
],
    function (\Illuminate\Routing\Router $router) {
        $router->get('copy/boiler/{id}/{post}', [
            'as'   => 'dashboard.copy.boiler',
            'uses' => 'CopyBoilerController@copyBoiler',
        ]);
    });

$this->group([
    'middleware' => ['web', 'dashboard', 'access'],
    'prefix'     => 'dashboard',
    'namespace'  => 'App\Http\Controllers\Dashboard',
],
    function (\Illuminate\Routing\Router $router) {
        $router->get('company/create', [
            'as'   => 'dashboard.create.company',
            'uses' => 'RoleController@show',
        ]);
        $router->put('company/create', [
            'as'   => 'dashboard.create.company',
            'uses' => 'RoleController@update',
        ]);
    });