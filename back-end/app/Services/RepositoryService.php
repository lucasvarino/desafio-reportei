<?php

namespace App\Services;

use App\Http\Clients\GithubApiClient;
use App\Models\Repository;
use App\Repositories\RepositoryRepositoryInterface;
use Illuminate\Support\Collection;
use function Symfony\Component\String\s;

class RepositoryService
{
    protected RepositoryRepositoryInterface $repositoryRepository;

    public function __construct(RepositoryRepositoryInterface $repositoryRepository)
    {
        $this->repositoryRepository = $repositoryRepository;
    }

    /**
     * @param string $userId
     * @return Collection<Repository>
     */
    public function getUserRepositories(string $userId): Collection
    {
        return $this->repositoryRepository->getByUserId($userId);
    }

    /**
     * @param string $username
     * @param string $userId
     * @param string $token
     * @return Collection<Repository>
     */
    public function syncRepositories(string $username, string $userId, string $token): Collection
    {
        $client = new GithubApiClient($token);
        $githubRepositories = $client->getUserRepositories($username);
        $databaseRepositories = $this->repositoryRepository->getByUsername($username);

        $repoIds = $githubRepositories->pluck('github_id');

        $newRepositories = $githubRepositories->filter(function ($repository) use ($repoIds) {
            return !$repoIds->contains($repository->github_id);
        });

        $syncRepos = $this->repositoryRepository->syncRepositories($username, $userId, $newRepositories);

        return $syncRepos->isEmpty() ? $databaseRepositories : $syncRepos;
    }
}
