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
    return view('welcome');
});
Route::get('/list', [ApartmentsController::class, 'index']);

Route::get('/create', [ApartmentsController::class, 'create']);
Route::post('/create', [ApartmentsController::class, 'store']);

Route::get('/{id}/edit', [ApartmentsController::class, 'edit']);
Route::put('/{id}/edit', [ApartmentsController::class, 'update']);

Route::delete('/{id}', [ApartmentsController::class, 'delete']);
Route::get('/{id}', [ApartmentsController::class, 'read']);

