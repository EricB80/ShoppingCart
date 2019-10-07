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


/**Cart Routes */
$router->get('/carts', 'CartController@index');
$router->get('/carts/{id}', 'CartController@read');
$router->post('/carts', 'CartController@create');
$router->put('/carts/{id}', 'CartController@update');
$router->delete('/carts/{id}', 'CartController@delete');

/**Items Routes */
$router->get('/items', 'ItemController@index');
$router->get('/items/{id}', 'ItemController@read');
$router->post('/items', 'ItemController@create');
$router->put('/items/{id}', 'ItemController@update');
$router->delete('/items/{id}', 'ItemController@delete');
