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
        $this->repositoryService->syncRepositories($request->user()->username, $request->user()->id, $request->user()->github_token);
        $repositories = $this->repositoryService->getUserRepositories($request->user()->id);

        return response()->json($repositories);
    }
}
