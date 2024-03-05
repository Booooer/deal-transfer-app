<?php

use App\Http\Controllers\DealController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\FunnelController;
use \App\Http\Controllers\StageController;
use \App\Http\Controllers\DepartmentController;
use \App\Http\Controllers\UserController;

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

Route::prefix('v1')->group(function () {
    Route::apiResource('funnels',FunnelController::class);
    Route::apiResource('stages',StageController::class);
    Route::apiResource('users',UserController::class);
    Route::apiResource('departments',DepartmentController::class);
    Route::apiResource('deals',DealController::class);
});

Route::fallback(static function () {
    return response()->json([
        'message' => 'Think about what you are doing, because you are clearly doing something wrong...',
        'errors'  => ['error' => 'Route not found'],
    ], 404);
});
