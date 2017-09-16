<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/quote-system/{company_name}/js', 'Quote\ScriptController@script');

Route::group([
    'namespace'  => 'Api',
    'prefix'     => 'script/api',
], function () {
    Route::get('/all/{company_name}', 'BoilersController@getBoilers');
    Route::post('/new-order/{company_name}', 'BoilersController@createOrder');
});
