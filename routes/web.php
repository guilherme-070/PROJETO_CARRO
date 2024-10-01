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
   return view('minor');
});


Route::resource('/modelo','App\Http\Controllers\ModeloController');
Route::resource('/marca','App\Http\Controllers\MarcaController');
Route::resource('/color','App\Http\Controllers\ColorController');
Route::resource('/carro','App\Http\Controllers\CarroController');
Route::get('/report/carro', 'App\Http\Controllers\CarroController@report')->name('carro.report');
//Route::get('/home', 'App\Http\Controllers\HomeController@graph')->name('home');


Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth'])->name('home');

require __DIR__.'/auth.php';
