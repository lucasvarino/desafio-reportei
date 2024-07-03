<?php

namespace App\Repositories;

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
               $this->model->create([
                   'user_id' => $userId,
                   'github_id' => $repository->github_id,
                   'name' => $repository->name,
                   'full_name' => $repository->full_name,
                   'url' => $repository->url,
                   'description' => $repository->description,
               ]);

                $createdRepositories->push($repository);
           }
        });

        return $createdRepositories;
    }
}
