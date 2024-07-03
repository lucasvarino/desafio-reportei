<?php

namespace App\Repositories;

use App\Models\Repository;
use Illuminate\Support\Collection;

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
     * @param array $attributes
     * @param array $values
     * @return Repository
     */
    public function updateOrCreate(array $attributes, array $values = []): Repository
    {
        return $this->model->updateOrCreate($attributes, $values);
    }
}
