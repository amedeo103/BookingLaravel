<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Dohvati sve jedinice
Route::get('/units', 'UnitController@index');
//Dohvati samo jednu
Route::get('unit/{id}', 'UnitController@show');
//Unesi nove jedinice
Route::post('/units','UnitController@create');
//Uredjivanje pojedine jedinice
Route::put('/units/{id}','UnitController@edit');
//Brisanje jedinice
Route::delete('/units/{id}','UnitController@destroy');

//Reservations

//Dohvati sve rezervacije
Route::get('/reservation','ReservationController@index');
//Prikaz jedne
Route::get('/reservation/{id}','ReservationController@show');
//Dodaj novu rezervaciju
Route::post('/reservation','ReservationController@create');
//Brisi rezervaciju
Route::delete('/reservation/{id}','ReservationController@destroy');

//Blokirani dani
Route::get('/getBlockedDates', 'ReservationController@blockedDates');
