<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('auth/github', [AuthController::class, 'redirectToGithub']);
Route::get('auth/github/callback', [AuthController::class, 'handleGithubCallback']);
