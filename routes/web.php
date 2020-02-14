<?php
use App\Reservation;


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


$router->get('key', function() {
    return str_random(32);
});


$router->get('report',  ['uses' => 'ReportController@generateReport']);



// Use this for endpoints that require prior identification to access the data.

// $router->group(['prefix' => 'api', 'middleware' => 'auth'], function () use ($router) {
// });



$router->group(['prefix' => 'api'], function () use ($router) {

    // Auth Endpoints
    $router->post('register',['uses' => 'AuthController@register']);
    $router->post('login', ['uses' => 'AuthController@login']);
    $router->post('user', ['uses' => 'UserController@showOneUserWithEmail']);

    // Endpoints Products table
    
    $router->get('countProducts',  ['uses' => 'ProductController@countProducts']);
    $router->get('products',  ['uses' => 'ProductController@showAllProducts']);
    $router->get('products/{id}',  ['uses' => 'ProductController@showOneProduct']);
    $router->post('products', ['uses' => 'ProductController@createProduct']);
    $router->put('products/{id}', ['uses' => 'ProductController@updateProduct']);
    $router->delete('products/{id}', ['uses' => 'ProductController@deleteProduct']);


    // Endpoints Distributions table
    $router->get('distribution',  ['uses' => 'DistributionController@showAllDistributions']);
    $router->get('distribution/{id}',  ['uses' => 'DistributionController@showOneDistribution']);
    $router->post('distribution', ['uses' => 'DistributionController@createDistribution']);
    $router->put('distribution/{id}', ['uses' => 'DistributionController@updateDistribution']);
    $router->delete('distribution/{id}', ['uses' => 'DistributionController@deleteDistribution']);


    // Endpoints Availabilities table
    $router->get('availability',  ['uses' => 'AvailabilityController@showAllAvailabilities']);
    $router->get('availability/{id}',  ['uses' => 'AvailabilityController@showOneAvailability']);
    $router->post('availability', ['uses' => 'AvailabilityController@createAvailability']);
    $router->put('availability/{id}', ['uses' => 'AvailabilityController@updateAvailability']);
    $router->delete('availability/{id}', ['uses' => 'AvailabilityController@deleteAvailability']);

});
  

 $router->group(['prefix' => 'auth', 'middleware' => 'auth'], function () use ($router) {


    // Endpoints Users table
    $router->get('users', 'UserController@showAllUsers');
    $router->get('users/{id}', 'UserController@showOneUser');
    $router->post('users', ['uses' => 'UserController@createUser']);
    $router->put('users/{id}', ['uses' => 'UserController@updateUser']);
    $router->delete('users/{id}', ['uses' => 'UserController@deleteUser']);


    // Endpoints Reservations table
    $router->get('reservation',  ['uses' => 'ReservationController@showAllReservations']);
    $router->get('reservation/{id}',  ['uses' => 'ReservationController@showOneReservation']);
    $router->post('reservation', ['uses' => 'ReservationController@createReservation']);
    $router->put('reservation/{id}', ['uses' => 'ReservationController@updateReservation']);
    $router->delete('reservation/{id}', ['uses' => 'ReservationController@deleteReservation']);


});


$router->get('/create_reservations/{id_reservation}/{id_product}', function ($id_reservation,$id_product) use ($router) {
    $reservation = Reservation::find($id_reservation);
    $reservation->products()->attach($id_product,['price'=>'1234']);
    echo json_encode("guardado");
});

$router->get('/select_reservations/{id_reservation}', function ($id_reservation) use ($router) {
    $reservation = Reservation::find($id_reservation);
    $array = array();
    $number=0;
    foreach($reservation->products as $product){
        $array[$number]=array('status'=>$product->status,'date'=>$product->date,'price'=>$product->pivot->price);
        $number++;
    }
    echo json_encode($array);
});