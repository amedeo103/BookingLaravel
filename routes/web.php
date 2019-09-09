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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/reservation_index', function () {
    return view('reservation_index');
});
Route::get('/host', function (){
  return view('host');
});
Route::get('/show_all_units',function(){
  return view('show_all_units');
});
Route::get('/show_all_reservations', function(){
  return view('show_all_reservations');
});
Route::get('/edit_unit',function(){
  return view('edit_unit');
});
Route::get('/add_unit',function(){
  return view('add_unit');
});

Route::get('/add_reservation',function(){
  return view('add_reservation');
});
Route::get('/error', function () {
    return view('error');
});
