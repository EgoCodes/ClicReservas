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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->middleware('verified');

Route::get('/register', function(){
    return Redirect::to('/login');
});

Route::get('/home', function(){
    return Redirect::to('../index.php');
});

Route::resource('empInfos', 'empInfoController');

Route::resource('empres', 'empresController');

Route::resource('hors', 'horController');

Route::resource('perfilClis', 'perfilCliController');

Route::resource('ventanillas', 'ventanillaController');

Route::resource('empHorarios', 'empHorarioController');

Route::resource('contactos', 'contactoController');

Route::resource('comprasClis', 'comprasCliController');

Route::resource('clients', 'clientController');

Route::resource('cantVents', 'cantVentController');

Route::resource('barris', 'barriController');