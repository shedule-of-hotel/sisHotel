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
    return view('auth/login'); //->name('vistaindex');
});

Route::resource('habitacion', 'HabitController');

Route::resource('producto', 'ProductoController'); //->name('vistaproducto');
Route::resource('tipohabitacion', 'TipohabController'); //->name('vistatipodehabitacion');
Route::resource('cliente', 'ClienteController'); //->name('vistacliente');
Route::resource('empleado', 'EmpleadoController'); //->name('vistaempleado');
Route::resource('reserva', 'ReservaController'); //->name('vistareserva');
Route::resource('compras', '---'); //->name('vistacompras');
Route::resource('detalledecompra', '---'); //->name('vistadetalledecompra');
Route::resource('comprobante', '---'); //->name('vistacomprobante');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
