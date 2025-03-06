<?php

use App\Http\Controllers\EmpleadoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [EmpleadoController::class, 'index']);
Route::post('/store', [EmpleadoController::class, 'store'])->name('store');
Route::get('/fetch-all', [EmpleadoController::class, 'fetchAll'])->name('fetchAll');
Route::get('/editar', [EmpleadoController::class, 'editar'])->name('editar');
Route::post('/actualizar', [EmpleadoController::class, 'actualizar'])->name('actualizar');
Route::post('/eliminar', [EmpleadoController::class, 'eliminar'])->name('eliminar');
