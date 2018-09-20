<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
 */

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->group(['prefix' => 'admin'], function($api){

    	$api->get('menus', 'VCComponent\Laravel\Menu\Http\Controllers\Admin\Menu\MenuController@index');
    	$api->post('menus', 'VCComponent\Laravel\Menu\Http\Controllers\Admin\Menu\MenuController@store');
    	$api->get('menus/{id}', 'VCComponent\Laravel\Menu\Http\Controllers\Admin\Menu\MenuController@show');
        $api->post('menus/{id}/items', 'VCComponent\Laravel\Menu\Http\Controllers\Admin\Menu\MenuController@addItem');
    	$api->put('menus/{id}', 'VCComponent\Laravel\Menu\Http\Controllers\Admin\Menu\MenuController@update');
        $api->post('menus/{id}/save', 'VCComponent\Laravel\Menu\Http\Controllers\Admin\Menu\MenuController@UpdateMenuItem');
    });
});
