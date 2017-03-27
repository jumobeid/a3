<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/**
* Main Route for orders /
*/
//Route::post('/orders/{$title?}', 'OrdersController@show');
Route::get('/orders/submitted', 'OrdersController@submitted');

Route::get('/', function () {
    return view('welcome');
});


//Route::get('/orders/{title?}','OrdersController@show');

if(config('app.env')=='local'){
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
}
