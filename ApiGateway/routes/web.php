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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'auth'], function () use ($router) {
    $router->post('login', 'Auth\AuthController@login');
    $router->post('register', 'Auth\AuthController@register');
});

$router->group(['middleware' => 'client.credentials'], function() use ($router){
    $router->get('/authors', 'Author\AuthorController@index');
});
