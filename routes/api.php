<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StepController;

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
Route::post('login',[AuthController::class,'login']);
Route::middleware(['auth:sanctum', 'throttle:10,20'])->group(function () {
    Route::controller(StepController::class)
        ->group(function () {
            Route::get('daily/steps', 'dailySteps');
            Route::get('leaderboard', 'leaderBoard');
        });
});
