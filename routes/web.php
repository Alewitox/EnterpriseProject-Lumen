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


$router->get('/getreport',  ['uses' => 'ReportController@generateReport']);



$router->group(['prefix' => 'api'], function () use ($router) {

    // Auth End-points
    $router->post('register',['uses' => 'AuthController@register']);
    $router->post('login', ['uses' => 'AuthController@login']);
    

    // End-points Users table
    $router->get('users', 'UserController@showAllUsers');
    $router->get('users/{id}', 'UserController@showOneUser');
    $router->post('users', ['uses' => 'UserController@createUser']);
    $router->put('users/{id}', ['uses' => 'UserController@updateUser']);
    $router->delete('users/{id}', ['uses' => 'UserController@deleteUser']);


    // End-points Products table
    $router->get('products',  ['uses' => 'ProductController@showAllProducts']);
    $router->get('products/{id}',  ['uses' => 'ProductController@showOneProduct']);
    $router->post('products', ['uses' => 'ProductController@createProduct']);
    $router->put('products/{id}', ['uses' => 'ProductController@updateProduct']);
    $router->delete('products/{id}', ['uses' => 'ProductController@deleteProduct']);


    // End-points Distributions table
    $router->get('distribution',  ['uses' => 'DistributionController@showAllDistributions']);
    $router->get('distribution/{id}',  ['uses' => 'DistributionController@showOneDistribution']);
    $router->post('distribution', ['uses' => 'DistributionController@createDistribution']);
    $router->put('distribution/{id}', ['uses' => 'DistributionController@updateDistribution']);
    $router->delete('distribution/{id}', ['uses' => 'DistributionController@deleteDistribution']);


    // End-points Availabilities table
    $router->get('availability',  ['uses' => 'AvailabilityController@showAllAvailabilities']);
    $router->get('availability/{id}',  ['uses' => 'AvailabilityController@showOneAvailability']);
    $router->post('availability', ['uses' => 'AvailabilityController@createAvailability']);
    $router->put('availability/{id}', ['uses' => 'AvailabilityController@updateAvailability']);
    $router->delete('availability/{id}', ['uses' => 'AvailabilityController@deleteAvailability']);


    // End-points Reservations table
    $router->get('reservation',  ['uses' => 'ReservationController@showAllReservations']);
    $router->get('reservation/{id}',  ['uses' => 'ReservationController@showOneReservation']);
    $router->post('reservation', ['uses' => 'ReservationController@createReservation']);
    $router->put('reservation/{id}', ['uses' => 'ReservationController@updateReservation']);
    $router->delete('reservation/{id}', ['uses' => 'ReservationController@deleteReservation']);

});