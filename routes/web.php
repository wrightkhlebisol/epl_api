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

$router->group(
    ['prefix' => 'api'], 
    function () use ($router) {
        $router->post('/register', 'AuthController@register');
        $router->post('/login', 'AuthController@login');
        $router->get('/logout', 'AuthController@logout');

        $router->get('/teams', 'TeamsController@index');
        $router->post('/teams', 'TeamsController@create');
        $router->patch('/teams/{teams}', 'TeamsController@update');
        $router->delete('/teams/{teams}', 'TeamsController@delete');

        $router->get('/', 'FixturesController@index');
        $router->post('/fixtures', 'FixturesController@create');
        $router->patch('/fixtures/{fixtures}', 'FixturesController@update');
        $router->delete('/fixtures/{fixtures}', 'FixturesController@delete');
    }
);
