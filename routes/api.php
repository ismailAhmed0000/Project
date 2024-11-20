<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\IslandController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('patients', PatientController::class);
Route::apiResource('addresses', AddressController::class);


Route::get('/islands', [IslandController::class, 'getIslands']);

