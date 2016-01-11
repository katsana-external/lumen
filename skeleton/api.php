<?php

$api = app(Dingo\Api\Routing\Router::class);

/*
|--------------------------------------------------------------------------
| Application API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the API routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$api->version(['v1'], ['namespace' => 'App\Lumen\Http\Controllers'], function ($api) {
    $api->post('auth', 'AuthController@authenticate');
    $api->get('auth/refresh', 'AuthController@refresh');

    $api->group(['middleware' => ['auth:jwt']], function ($api) {
        $api->delete('auth', 'AuthController@deauthenticate');
    });
});
