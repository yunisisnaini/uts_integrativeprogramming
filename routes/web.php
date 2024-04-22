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

$router->get('/books', 'BooksController@index');
$router->get('/books/{id:[\d]+}', [
    'as' => 'books.show',
    'uses' => 'BooksController@show'
]);
$router->post('/books', 'BooksController@store');
$router->put('/books/{id:[\d]+}', 'BooksController@update');
$router->delete('/books/{id:[\d]+}', 'BooksController@destroy');
$router->delete('/books', 'BooksController@destroyall');


$router->get('/peminjamans', 'PeminjamanController@index');
$router->get('/peminjamans/{id:[\d]+}', [
    'as' => 'peminjamans.show',
    'uses' => 'PeminjamanController@show'
]);
$router->post('/peminjamans', 'PeminjamanController@store');
$router->put('/peminjamans/{id:[\d]+}', 'PeminjamanController@update');
$router->delete('/peminjamans/{id:[\d]+}', 'PeminjamanController@destroy');
$router->delete('/peminjamans', 'PeminjamanController@destroyall');