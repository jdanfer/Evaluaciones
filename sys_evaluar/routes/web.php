<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'AdminController@showHome')->name('home');
Route::get('/autoevaluacion',                                       'AdminController@showAutoEvaluacionCons');
Route::get('/autoevaluacion/{documento}/crear',                     'AdminController@showAutoEvalCreate');
Route::get('/autoevaluacion/{id}/{persona_id}/{periodo}/editar',    'AdminController@showEvalEdit');
Route::post('/autoevaluacion/{id}/{persona_id}/{periodo}/editar',        'AdminController@editAutoevaluacion');
Route::get('/evaluacion',                                           'AdminController@showEvaluacion');

Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
});

Route::group(['prefix' => '/admin', 'middleware' => 'auth'], function () {
    Route::get('/', function () {
        return redirect('/admin/titulos');
    });

    // Admin de Títulos: ok
    Route::get('/titulos',                              'AdminController@showTitulos');
    Route::get('/titulos/crear',                        'AdminController@showTitCreate');
    Route::get('/titulos/{id}/editar',                  'AdminController@showTitEdit');
    Route::post('/titulos',                             'AdminController@createTit');
    Route::post('/titulos/{id}/editar',                 'AdminController@editTit');
    Route::get('/titulos/{id}/eliminar',                'AdminController@deleteTit');

    // Admin de Evaluadores: ok
    Route::get('/evaluadores',                          'AdminController@showJefaturas');
    Route::get('/evaluadores/crear',                    'AdminController@showJefaturaCreate');
    Route::get('/evaluadores/{id}/editar',              'AdminController@showJefaturaEdit');
    Route::post('/evaluadores',                         'AdminController@createJefatura');
    Route::post('/evaluadores/{eva}/editar',            'AdminController@editJefatura');
    Route::get('/evaluadores/{eva}/eliminar',           'AdminController@deleteJefatura');

    // Admin de Períodos: ok
    Route::get('/periodos',                             'AdminController@showPeriodos');
    Route::get('/periodos/crear',                       'AdminController@showPeriodoCreate');
    Route::get('/periodos/{id}/editar',                 'AdminController@showPeriodoEdit');
    Route::post('/periodos',                            'AdminController@createPeriodo');
    Route::post('/periodos/{id}/editar',               'AdminController@editPeriodo');
    Route::get('/periodos/{id}/eliminar',              'AdminController@deletePeriodo');

    // Admin de Cargos:
    Route::get('/cargos',                               'AdminController@showCargos');
    Route::get('/cargos/crear',                         'AdminController@showCargoCreate');
    Route::get('/cargos/{id}/editar',                   'AdminController@showCargoEdit');
    Route::post('/cargos',                              'AdminController@createCargo');
    Route::post('/cargos/{cargo}/editar',               'AdminController@editCargo');
    Route::get('/cargos/{cargo}/eliminar',              'AdminController@deleteCargo');

    // Admin de Preguntas:
    Route::get('/preguntas',                               'AdminController@showPreguntas');
    Route::get('/preguntas/crear',                         'AdminController@showPreguntaCreate');
    Route::get('/preguntas/{id}/editar',                   'AdminController@showPreguntaEdit');
    Route::post('/preguntas',                              'AdminController@createPregunta');
    Route::post('/preguntas/{cargo}/editar',               'AdminController@editPregunta');
    Route::get('/preguntas/{cargo}/eliminar',              'AdminController@deletePregunta');

    // Admin de Personas a evaluar:
    Route::get('/personas',                               'AdminController@showPersonas');
    Route::get('/personas/crear',                         'AdminController@showPersonaCreate');
    Route::get('/personas/{id}/editar',                   'AdminController@showPersonaEdit');
    Route::post('/personas',                              'AdminController@createPersona');
    Route::post('/personas/{cargo}/editar',               'AdminController@editPersona');
    Route::get('/personas/{cargo}/eliminar',              'AdminController@deletePersona');

    Route::get('/ventas', 'SalesController@filtersCars')->name('filters');
    Route::get('/ventas/{year}{brand_id}{car_model_ir}{status}', 'SalesController@filtersCarsSelect')->name('filters');

    // Ruta para realizar logout del usuario loggueado:
    Route::get('/logout',                             'Auth\LoginController@logout');
});
Auth::routes();
