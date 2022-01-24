<?php
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Muestra
Route::prefix('muestra')->name('muestra/')->group(static function() {
    Route::get('/',                                'App\Http\Controllers\MuestraController@index')->name('index');
    Route::get('/{id}/show',                       'App\Http\Controllers\MuestraController@show')->name('show');
    Route::post('/',                               'App\Http\Controllers\MuestraController@store')->name('store');
    Route::post('/{id}/edit',                      'App\Http\Controllers\MuestraController@edit')->name('edit');
    Route::delete('/{id}',                         'App\Http\Controllers\MuestraController@destroy')->name('destroy');
});

//Lote
Route::prefix('lote')->name('lote/')->group(static function() {
    Route::get('/',                                'App\Http\Controllers\LoteController@index')->name('index');
    Route::get('/{id}/show',                       'App\Http\Controllers\LoteController@show')->name('show');
    Route::post('/',                               'App\Http\Controllers\LoteController@store')->name('store');
    Route::post('/{id}/edit',                      'App\Http\Controllers\LoteController@edit')->name('edit');
    Route::delete('/{id}',                         'App\Http\Controllers\LoteController@destroy')->name('destroy');
});

//Proyecto
Route::prefix('proyecto')->name('proyecto/')->group(static function() {
    Route::get('/',                                'App\Http\Controllers\ProyectoController@index')->name('index');
    Route::get('/{id}/show',                       'App\Http\Controllers\ProyectoController@show')->name('show');
    Route::post('/',                               'App\Http\Controllers\ProyectoController@store')->name('store');
    Route::post('/{id}/edit',                      'App\Http\Controllers\ProyectoController@edit')->name('edit');
    Route::delete('/{id}',                         'App\Http\Controllers\ProyectoController@destroy')->name('destroy');
});

//Cliente
Route::prefix('cliente')->name('cliente/')->group(static function() {
    Route::get('/',                                'App\Http\Controllers\ClienteController@index')->name('index');
    Route::get('/{id}/show',                       'App\Http\Controllers\ClienteController@show')->name('show');
    Route::post('/',                               'App\Http\Controllers\ClienteController@store')->name('store');
    Route::post('/{id}/edit',                      'App\Http\Controllers\ClienteController@edit')->name('edit');
    Route::delete('/{id}',                         'App\Http\Controllers\ClienteController@destroy')->name('destroy');
});

//Estudio
Route::prefix('estudio')->name('estudio/')->group(static function() {
    Route::get('/',                                'App\Http\Controllers\EstudioController@index')->name('index');
    Route::get('/{id}/show',                       'App\Http\Controllers\EstudioController@show')->name('show');
    Route::post('/',                               'App\Http\Controllers\EstudioController@store')->name('store');
    Route::post('/{id}/edit',                      'App\Http\Controllers\EstudioController@edit')->name('edit');
    Route::delete('/{id}',                         'App\Http\Controllers\EstudioController@destroy')->name('destroy');
});

//Categoria de los estudios
Route::prefix('categoria-estudio')->name('categoria-estudio/')->group(static function() {
    Route::get('/',                                'App\Http\Controllers\EstudioCategoriaController@index')->name('index');
    Route::get('/{id}/show',                       'App\Http\Controllers\EstudioCategoriaController@show')->name('show');
    Route::post('/',                               'App\Http\Controllers\EstudioCategoriaController@store')->name('store');
    Route::post('/{id}/edit',                      'App\Http\Controllers\EstudioCategoriaController@edit')->name('edit');
    Route::delete('/{id}',                         'App\Http\Controllers\EstudioCategoriaController@destroy')->name('destroy');
});

//Parametros
Route::prefix('parametro')->name('parametro/')->group(static function() {
    Route::get('/',                                'App\Http\Controllers\ParametroController@index')->name('index');
    Route::get('/{id}/show',                       'App\Http\Controllers\ParametroController@show')->name('show');
    Route::post('/',                               'App\Http\Controllers\ParametroController@store')->name('store');
    Route::post('/{id}/edit',                      'App\Http\Controllers\ParametroController@edit')->name('edit');
    Route::delete('/{id}',                         'App\Http\Controllers\ParametroController@destroy')->name('destroy');
});

//Categoria de los parámetros
Route::prefix('categoria-parametro')->name('categoria-parametro/')->group(static function() {
    Route::get('/',                                'App\Http\Controllers\ParametroCategoriaController@index')->name('index');
    Route::get('/{id}/show',                       'App\Http\Controllers\ParametroCategoriaController@show')->name('show');
    Route::post('/',                               'App\Http\Controllers\ParametroCategoriaController@store')->name('store');
    Route::post('/{id}/edit',                      'App\Http\Controllers\ParametroCategoriaController@edit')->name('edit');
    Route::delete('/{id}',                         'App\Http\Controllers\ParametroCategoriaController@destroy')->name('destroy');
});

//Departamentos
Route::prefix('departamento')->name('departamento/')->group(static function() {
    Route::get('/',                                'App\Http\Controllers\DepartamentoController@index')->name('index');
    Route::get('/{id}/show',                       'App\Http\Controllers\DepartamentoController@show')->name('show');
    Route::post('/',                               'App\Http\Controllers\DepartamentoController@store')->name('store');
    Route::post('/{id}/edit',                      'App\Http\Controllers\DepartamentoController@edit')->name('edit');
    Route::delete('/{id}',                         'App\Http\Controllers\DepartamentoController@destroy')->name('destroy');
});

//Departamentos
Route::prefix('municipio')->name('municipio/')->group(static function() {
    Route::get('/',                                'App\Http\Controllers\MunicipioController@index')->name('index');
    Route::get('/{id}/show',                       'App\Http\Controllers\MunicipioController@show')->name('show');
    Route::post('/',                               'App\Http\Controllers\MunicipioController@store')->name('store');
    Route::post('/{id}/edit',                      'App\Http\Controllers\MunicipioController@edit')->name('edit');
    Route::delete('/{id}',                         'App\Http\Controllers\MunicipioController@destroy')->name('destroy');
});