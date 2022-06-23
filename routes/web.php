<?php

use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\TipoDocumentoController;
use Illuminate\Support\Facades\Artisan;
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
    return view('welcome');
});

Route::get('solucion-de-las-preguntas', function() {
    return view('solucion-preguntas');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', function() {
        return view('home');
    });
    Route::resource('departamentos', DepartamentoController::class);
    Route::get('lista-de-municipios/{id}', [MunicipioController::class, 'list']);
    Route::resource('municipios', MunicipioController::class);
    Route::resource('tipos-de-documentos', TipoDocumentoController::class)->parameters(['tipos-de-documentos' => 'tipoDocumento']);
    Route::resource('generos', GeneroController::class);
    Route::put('pacientes/{paciente}/cambiar-foto', [PacienteController::class, 'changePhoto'])->name('pacientes.changePhoto');
    Route::resource('pacientes', PacienteController::class);
});

Route::get('clear-cache', function() {
    Artisan::call('route:cache');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
});
