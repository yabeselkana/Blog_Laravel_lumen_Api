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



$router->post('api/register',['uses' =>'LoginController@register']);

$router->post('api/login',['uses' =>'LoginController@login']);


$router->group(['prefix'=>'api','middleware'=>'auth'] , function() use($router) {

    
    $router->get('blog',['uses' => 'BlogController@index']);
    $router->get('blog/{id}',['uses' => 'BlogController@show']);
    $router->delete('blog/{id}',['uses' => 'BlogController@destroy']);
    $router->post('blog',['uses' => 'BlogController@create']);
    $router->put('blog/{id}',['uses' => 'BlogController@update']);
    

    $router->get('comment',['uses' => 'CommentController@index']);
    $router->post('comment',['uses' => 'CommentController@create']);
    $router->put('comment/{id}',['uses' => 'CommentController@update']);
    
    }); 