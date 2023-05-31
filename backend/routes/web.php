<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('user/{id}', function ($id) {
    return 'User '.$id;
});

$router->post('register', 'AuthController@register');
$router->post('login', 'AuthController@login');
$router->group(['middleware' => 'auth'], function () use ($router) {
    $router->get('logout', 'AuthController@logout');
    
    $router->group(['prefix' => 'cliente'], function () use ($router) {
        $router->get('/', [ 'as' => 'index', 'uses' => 'ClientsController@index'] );
        $router->post('/', [ 'as' => 'create', 'uses' => 'ClientsController@create'] );
        $router->put('/{id}', [ 'as' => 'edit', 'uses' => 'ClientsController@update']);
    });
    
    $router->group(['prefix' => 'endereco'], function () use ($router) {
        $router->get('/', [ 'as' => 'index', 'uses' => 'AddressController@index'] );
        $router->post('/', [ 'as' => 'create', 'uses' => 'AddressController@create'] );
        $router->put('/{id}', [ 'as' => 'edit', 'uses' => 'AddressController@update']);
    });
    
    $router->group(['prefix' => 'status'], function () use ($router) {
        $router->get('/', [ 'as' => 'index', 'uses' => 'StatusController@index'] );
        $router->post('/', [ 'as' => 'create', 'uses' => 'StatusController@create'] );
        $router->put('/{id}', [ 'as' => 'edit', 'uses' => 'StatusController@update']);
    });
    
    $router->group(['prefix' => 'produtos'], function () use ($router) {
        $router->get('/', [ 'as' => 'index', 'uses' => 'ProdutosController@index'] );
        $router->post('/', [ 'as' => 'create', 'uses' => 'ProdutosController@create'] );
        $router->put('/{id}', [ 'as' => 'edit', 'uses' => 'ProdutosController@update']);
    });
});