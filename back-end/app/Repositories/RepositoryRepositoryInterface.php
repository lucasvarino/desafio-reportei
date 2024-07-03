<?php

namespace App\Repositories;

use App\Models\Repository;
use Illuminate\Support\Collection;

interface RepositoryRepositoryInterface
{
    /**
     * @param string $userId
     * @return Collection<Repository>
     */
    public function getByUserId(string $userId): Collection;

    /**
     * @param array $attributes
     * @param array $values
     * @return Repository
     */
    public function updateOrCreate(array $attributes, array $values = []): Repository;

    /**
     * @param string $username
     * @param string $userId
     * @param Collection $newRepositories
     * @return void
     */
    public function syncRepositories(string $username, string $userId, Collection $newRepositories): void;
}
