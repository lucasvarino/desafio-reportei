<?php

namespace App\Entities;

use Carbon\Carbon;

readonly class RepositoryEntity
{
    public function __construct(
        public string $github_id,
        public string $name,
        public string $full_name,
        public string $description,
        public string $url,
        public string $open_issues_count,
        public string $stargazers_count,
        public string $pull_requests_count,
        public string $last_updated_at,
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
            open_issues_count: intval($data['open_issues_count']),
            stargazers_count: intval($data['stargazers_count']),
            pull_requests_count: intval($data['pull_requests_count'] ?? 0),
            last_updated_at: Carbon::parse($data['updated_at'])->format('Y-m-d H:i:s'),
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
            'open_issues_count' => $this->open_issues_count,
            'stargazers_count' => $this->stargazers_count,
            'pull_requests_count' => $this->pull_requests_count,
            'last_updated_at' => $this->last_updated_at,
            'user_id' => $this->user_id,
        ];
    }
}
