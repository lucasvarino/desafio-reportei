<?php

namespace App\Repositories;

use App\Models\Commit;
use App\Models\Repository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class RepositoryRepository implements RepositoryRepositoryInterface
{
    protected Repository $model;

    public function __construct(Repository $model)
    {
        $this->model = $model;
    }

    /**
     * @param string $id
     * @return
     */
    public function getById(string $id)
    {
         return $this->model->with('commits')->findOrFail($id);
    }

    /**
     * @param string $userId
     * @return Collection<Repository>
     */
    public function getByUserId(string $userId): Collection
    {
        return $this->model->where('user_id', $userId)->get();
    }

    /**
     * @param string $username
     * @return Collection<Repository>
     */
    public function getByUsername(string $username): Collection
    {
        // A model tem o user_id e o user_id tem username
        return $this->model->whereHas('user', function ($query) use ($username) {
            $query->where('username', $username);
        })->get();
    }

    /**
     * @param array $attributes
     * @param array $values
     * @return Repository
     */
    public function updateOrCreate(array $attributes, array $values = []): Repository
    {
        return $this->model->updateOrCreate($attributes, $values);
    }

    public function syncRepositories(string $username, string $userId, Collection $newRepositories): Collection
    {
        $createdRepositories = collect();
        DB::transaction(function () use ($username, $userId, $newRepositories, $createdRepositories) {
           foreach ($newRepositories as $repository) {
               $model = $this->model->create([
                   'user_id' => $userId,
                   'github_id' => $repository->github_id,
                   'name' => $repository->name,
                   'full_name' => $repository->full_name,
                   'url' => $repository->url,
                   'open_issues_count' => $repository->open_issues_count,
                   'stargazers_count' => $repository->stargazers_count,
                   'pull_requests_count' => $repository->pull_requests_count,
                   'last_updated_at' => $repository->last_updated_at,
                   'description' => $repository->description,
               ]);

                $createdRepositories->push($model);
           }
        });

        return $createdRepositories;
    }

    /**
     * @param string $repositoryId
     * @param Collection $commits
     * @return Collection<Commit>
     */
    public function syncCommits(string $repositoryId, Collection $commits): Collection
    {
        $commitsCreated = collect();
        DB::transaction(function () use ($repositoryId, $commits) {
            $repository = $this->model->findOrFail($repositoryId);

            $commitsCreated = $repository->commits()->createMany($commits);
        });

        return $commitsCreated;
    }
}
