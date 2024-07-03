<?php

namespace App\Entities;

readonly class RepositoryEntity
{
    public function __construct(
        public string $owner,
        public string $repository,
        public string $description,
        public string $url,
        public int $stars,
        public int $forks,
    ) {}

    public static function new(array $data): self
    {
        return new self(
            owner: $data['owner'],
            repository: $data['repository'],
            description: $data['description'],
            url: $data['url'],
            stars: $data['stars'],
            forks: $data['forks'],
        );
    }

    public function toDatabase(): array
    {
        return [
            'owner' => $this->owner,
            'repository' => $this->repository,
            'description' => $this->description,
            'url' => $this->url,
            'stars' => $this->stars,
            'forks' => $this->forks,
        ];
    }
}
