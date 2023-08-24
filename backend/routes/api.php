<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SignUpController;


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
Route::get('/user1', [AuthController::class, 'user']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/create', [SignUpController::class, 'createUser']);

Route::group(['prefix' => 'login'], function () {
    Route::post('/send', [AuthController::class, 'sendToken']);
    Route::post('/validate', [AuthController::class, 'login']);
});


Route::middleware('auth:sanctum')->group(function() {
    Route::get('/teste', [AuthController::class, 'teste']);
});


