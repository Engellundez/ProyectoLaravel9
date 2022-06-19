<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Route::prefix('empleado')->name('empleado.')->middleware('auth')->group(function () {
	Route::get('/', 'EmpleadoController@index')->name('index');
	Route::get('crear', 'EmpleadoController@create')->name('create');
	Route::get('editar/{id}', 'EmpleadoController@edit')->name('edit');
	Route::post('guardar', 'EmpleadoController@store')->name('store');
	Route::put('actualizar/{id}', 'EmpleadoController@update')->name('update');
	Route::delete('eliminar/{id}', 'EmpleadoController@destroy')->name('destroy');
});

Auth::routes(['register'=>false,'reset'=>false]);

Route::get('/home', function (){
	return redirect('empleado');
})->name('home');
