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
    return view('starships');
});


$router->group(['prefix' => 'api'], function () use ($router) {

    $router->post('/login', 'UserController@authenticate');

    //get all spacecraft details
    $router->get('/spacecrafts', ['uses' => 'SpacecraftController@index']);

    //get one spacecraft details
    $router->post('/spacecraft/{id}', ['uses' => 'SpacecraftController@ShowOneSpaceCraft']);

    $router->group(['middleware' => 'auth'], function () use ($router) {

        //create spacecraft
        $router->post('spacecrafts', ['uses' => 'SpacecraftController@create']);

        //delete space craft
        $router->delete('spacecrafts/{id}', ['uses' => 'SpacecraftController@delete']);

        //update spacecraft
        $router->put('spacecrafts/{id}', ['uses' => 'SpacecraftController@update']);

    });
});
