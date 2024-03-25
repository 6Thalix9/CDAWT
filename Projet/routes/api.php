<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PartieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [AuthController::class, 'logout']);


});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/partie/create', [PartieController::class, 'createPartie']);
Route::get('/parties', [PartieController::class, 'index']);
Route::delete('/{id}', [PartieController::class, 'destroy']);
