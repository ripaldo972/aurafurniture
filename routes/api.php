<?php

use App\Http\Controllers\Api\ContactInformationController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\LogoController;
use App\Http\Controllers\Api\MedsosController;
use Illuminate\Http\Request;
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

Route::get('/logo', [LogoController::class, 'index']);

Route::get('/contact-information', [ContactInformationController::class, 'index']);
Route::get('/medsos', [MedsosController::class, 'index']);
Route::get('/location', [LocationController::class, 'index']);

