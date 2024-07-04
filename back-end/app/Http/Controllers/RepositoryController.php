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
        $repositories = $this->repositoryService->getUserRepositories($request->user()->id);

        return response()->json($repositories);
    }

    public function show(Request $request, string $repositoryId): JsonResponse
    {
        $repository = $this->repositoryService->getRepositoryById($repositoryId);

        return response()->json($repository);
    }

    public function syncRepositories(Request $request): JsonResponse
    {
        $repositories = $this->repositoryService->syncRepositories($request->user()->username, $request->user()->id, $request->user()->github_token);
        $response = $repositories->map(fn ($repository) => $repository->only(['id', 'name']));

        return response()->json(['message' => 'Repositories synced successfully', 'repositories' => $response]);
    }
}
