<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthenticatedTokenController;
use App\Http\Controllers\Api\Auth\RegisteredUserTokenController;
use App\Http\Controllers\Api\UserTokenController;

Route::get('/user', function (Request $request) {
    return response()->json(['user' => $request->user()]);
})->middleware('auth:sanctum');

Route::post('/login', [AuthenticatedTokenController::class, 'store']);

Route::middleware('auth:sanctum')->post('/logout', [AuthenticatedTokenController::class, 'destroy']);

Route::post('/register', [RegisteredUserTokenController::class, 'store']);

Route::middleware('auth:sanctum')->get('/userAdmin', [UserTokenController::class, 'getUsers']);
