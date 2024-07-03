<?php

namespace App\Http\Controllers;

use App\Http\Clients\GithubApiClient;
use App\Services\RepositoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RepositoryController extends Controller
{
    protected RepositoryService $repositoryService;

    public function __construct(RepositoryService $repositoryService)
    {
        $this->repositoryService = $repositoryService;
    }

    public function index(Request $request): JsonResponse
    {
        $repositories = $this->repositoryService->getUserRepositories($request->user()->username);

        return response()->json($repositories);
    }
}
