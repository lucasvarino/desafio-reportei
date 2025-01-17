<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RepositoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('auth/github', [AuthController::class, 'redirectToGithub']);
Route::get('auth/github/callback', [AuthController::class, 'handleGithubCallback']);
Route::post('auth/logout', [AuthController::class, 'logout']);

Route::middleware('auth:api')->group(function () {
    Route::get('repositories', [RepositoryController::class, 'index']);
    Route::get('repositories/sync', [RepositoryController::class, 'syncRepositories']);
    Route::get('repositories/{repository}', [RepositoryController::class, 'show']);
    Route::get('repositories/{repository}/commits/sync', [RepositoryController::class, 'syncCommits']);
    Route::get('repositories/{repository}/commits', [RepositoryController::class, 'get90DaysCommits']);
});
