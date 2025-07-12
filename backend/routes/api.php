<?php

use app\Http\Controllers\Api\Admin\UserController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(function() {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function() {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::group(['prefix' => 'admin'], function () {
            Route::apiResource('users', UserController::class);
            Route::post('/users/{user}/update-password', [UserController::class, 'updatePassword']);
        });
    });

});

Route::get('/docs', function () {
    return redirect('/api/documentation');
});
