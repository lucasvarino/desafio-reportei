<?php

namespace App\Entities;

readonly class RepositoryEntity
{
    public function __construct(
        public string $github_id,
        public string $name,
        public string $full_name,
        public string $description,
        public string $url,
        public string $user_id,
    ) {}

    public static function new(array $data): self
    {
        return new self(
            github_id: $data['id'],
            name: $data['name'],
            full_name: $data['full_name'],
            description: $data['description'] ?? '',
            url: $data['html_url'],
            user_id: $data['owner']['id'],
        );
    }

    public function toDatabase(): array
    {
        return [
            'github_id' => $this->github_id,
            'name' => $this->name,
            'full_name' => $this->full_name,
            'description' => $this->description,
            'url' => $this->url,
            'user_id' => $this->user_id,
        ];
    }
}
