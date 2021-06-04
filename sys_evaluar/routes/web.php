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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/titulos',                              'AdminController@showTitulos');
Route::get('/titulos/crear',                        'AdminController@showTitCreate');
Route::get('/titulos/{id}/editar',                  'AdminController@showTitEdit');
Route::post('/titulos',                             'AdminController@createTit');
Route::post('/titulos/{tit}/editar',                'AdminController@editTit');
Route::get('/titulos/{tit}/eliminar',               'AdminController@deleteTit');

Route::get('/', 'PagesController@showHome')->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
