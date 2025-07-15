<?php

use App\Http\Controllers\Api\Admin\UserController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/auth/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::group(['prefix' => 'admin'], function () {

        Route::apiResource('users', UserController::class);
        Route::post('/users/{user}/update-password', [UserController::class, 'updatePassword']);

        Route::apiResource('categories', \App\Http\Controllers\Api\Admin\CategoryController::class);
    });
});

Route::get('/docs', function () {
    return redirect('/api/documentation');
});
