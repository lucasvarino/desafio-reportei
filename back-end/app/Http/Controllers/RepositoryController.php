<?php

namespace App\Http\Controllers;

use App\Http\Clients\GithubApiClient;
use App\Http\Resources\RepositoryResource;
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
        $this->repositoryService->syncCommits($repository->user->username, $repository->name, $repository->id, $request->user()->github_token);

        return response()->json(RepositoryResource::make($repository));
    }

    public function syncRepositories(Request $request): JsonResponse
    {
        $repositories = $this->repositoryService->syncRepositories($request->user()->username, $request->user()->id, $request->user()->github_token);
        $response = $repositories->map(fn ($repository) => $repository->only(['id', 'name']));

        return response()->json(['message' => 'Repositories synced successfully', 'repositories' => $response]);
    }

    public function syncCommits(Request $request, string $repositoryId): JsonResponse
    {
        $repository = $this->repositoryService->getRepositoryById($repositoryId);
        $owner = $repository->user->username;
        $commits = $this->repositoryService->syncCommits($owner, $repository->name, $repository->id, $request->user()->github_token);

        return response()->json($commits);
    }

    public function get90DaysCommits(Request $request, string $repositoryId): JsonResponse
    {
        $repository = $this->repositoryService->getRepositoryById($repositoryId);
        $this->repositoryService->syncCommits($repository->user->username, $repository->name, $repository->id, $request->user()->github_token);
        $commits = $this->repositoryService->getCommitsCountLast90Days($repository->id);

        return response()->json($commits);
    }
}
