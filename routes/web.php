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
Route::resource('producto', 'ProductoController');
Route::resource('tipohabitacion', 'TipohabController');
Route::resource('cliente', 'ClienteController');
Route::resource('empleado', 'EmpleadoController');
Route::resource('reserva', 'ReservaController');
Route::resource('habitacion', 'HabitController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
