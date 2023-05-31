<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\Acoustic_GuitarsController;
use App\Http\Controllers\Api\All_GuitarsController;
use \App\Http\Controllers\Api\Bass_GuitarsController;
use \App\Http\Controllers\Api\Electric_GuitarsController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'electric_guitars' => Electric_GuitarsController::class,
]);

Route::apiResources([
    'bass_guitars' => Bass_GuitarsController::class,
]);

Route::apiResources([
    'acoustic_guitars' => Acoustic_GuitarsController::class,
]);

Route::apiResources([
    'all' => All_GuitarsController::class,
]);