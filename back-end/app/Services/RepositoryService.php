<?php

namespace App\Services;

use App\Entities\CommitEntity;
use App\Http\Clients\GithubApiClient;
use App\Models\Repository;
use App\Repositories\RepositoryRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
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
     * @param string $id
     * @return Repository
     */
    public function getRepositoryById(string $id): Repository
    {
        return $this->repositoryRepository->getById($id);
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
        $databaseRepositoriesIds = $databaseRepositories->pluck('github_id');

        $newRepositories = $githubRepositories->filter(function ($repository) use ($databaseRepositoriesIds) {
            return !$databaseRepositoriesIds->contains($repository->github_id);
        });

        $syncRepos = $this->repositoryRepository->syncRepositories($username, $userId, $newRepositories);

        return $syncRepos->isEmpty() ? $databaseRepositories : $syncRepos;
    }

    /**
     * @param string $owner
     * @param string $repository
     * @param string $repositoryId
     * @param string $token
     * @return Collection
     */
    public function syncCommits(string $owner, string $repository, string $repositoryId, string $token): Collection
    {
        $client = new GithubApiClient($token);
        $commits = $client
            ->getCommits($owner, $repository, $repositoryId)
            ->map(fn (CommitEntity $commit) => $commit->toDatabase());

        $lastCommit = $this->repositoryRepository->getLastCommit($repositoryId);

        if ($lastCommit) {
            $newCommits = $commits->takeWhile(fn ($commit) => $commit['commit_hash'] !== $lastCommit->commit_hash);
        } else {
            $newCommits = $commits;
        }

        if ($newCommits->isEmpty()) {
            return $commits;
        }

        $this->repositoryRepository->syncCommits($repositoryId, $newCommits);

        return $newCommits;
    }


    /**
     * @param string $repositoryId
     * @return Collection
     */
    public function getCommitsCountLast90Days(string $repositoryId): Collection
    {
        $commitsCount = $this->repositoryRepository->getCommitsCountLast90Days($repositoryId);

        $dates = collect();
        $startDate = Carbon::now()->subDays(90);
        $endDate = Carbon::now();

        for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
            $formattedDate = $date->format('Y-m-d');
            $dates->push([
                'date' => Carbon::parse($formattedDate)->format('d/m/y'),
                'count' => $commitsCount->get($formattedDate, 0),
            ]);
        }

        return $dates;
    }
}
