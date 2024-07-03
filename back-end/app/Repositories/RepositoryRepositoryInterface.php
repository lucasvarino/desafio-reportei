<?php

namespace App\Repositories;

interface RepositoryRepositoryInterface
{
    public function getByUserId(string $userId);
    public function updateOrCreate(array $attributes, array $values = []);
}
