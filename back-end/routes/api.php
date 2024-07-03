<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RepositoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('auth/github', [AuthController::class, 'redirectToGithub']);
Route::get('auth/github/callback', [AuthController::class, 'handleGithubCallback']);
Route::post('auth/logout', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('repositories', [RepositoryController::class, 'index']);
    Route::get('repositories/{repository}/commits', [CommitController::class, 'index']);
});
