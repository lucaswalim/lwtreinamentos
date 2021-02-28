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
    return redirect('/pessoas');
});


Route::get('/pessoas', [\App\Http\Controllers\PessoaController::class, 'index']);
Route::get('/pessoas/criar', [\App\Http\Controllers\PessoaController::class, 'create']);
Route::post('/pessoas/criar', [\App\Http\Controllers\PessoaController::class, 'store']);
Route::get('/pessoas/{id}', [\App\Http\Controllers\PessoaController::class, 'show']);

Route::get('/salas', [\App\Http\Controllers\SalaController::class, 'index']);
Route::get('/salas/criar', [\App\Http\Controllers\SalaController::class, 'create']);
Route::post('/salas/criar', [\App\Http\Controllers\SalaController::class, 'store']);
Route::get('/salas/etapas', [\App\Http\Controllers\SalaController::class, 'segundaEtapaSala']);
Route::get('/salas/{id}', [\App\Http\Controllers\SalaController::class, 'show']);


Route::get('/cafe', [\App\Http\Controllers\CafeController::class, 'index']);
Route::get('/cafe/criar', [\App\Http\Controllers\CafeController::class, 'create']);
Route::post('/cafe/criar', [\App\Http\Controllers\CafeController::class, 'store']);
Route::get('/cafe/{id}', [\App\Http\Controllers\CafeController::class, 'show']);


