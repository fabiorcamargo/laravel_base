<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\UfController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/uf', [UfController::class, 'get'])->name('get_uf');
Route::get('/cities/{city}', [CityController::class, 'get'])->name('get_cities');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


