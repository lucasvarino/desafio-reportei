<?php

namespace App\Services;

use App\Models\Repository;
use App\Repositories\RepositoryRepositoryInterface;
use Illuminate\Support\Collection;

class RepositoryService
{
    public function __construct(protected RepositoryRepositoryInterface $repositoryRepository)
    {
    }

    /**
     * @param string $userId
     * @return Collection<Repository>
     */
    public function getUserRepositories(string $userId): Collection
    {
        return $this->repositoryRepository->getByUserId($userId);
    }
}
