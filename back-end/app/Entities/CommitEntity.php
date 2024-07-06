<?php

namespace App\Entities;

use Carbon\Carbon;

readonly class CommitEntity
{
    public function __construct(
        public string $commit_hash,
        public string $author_name,
        public string $author_email,
        public string $commit_date,
        public string $message,
        public int $repository_id,
    ) {}

    public static function new(array $data, string $repositoryId): self
    {
        return new self(
            commit_hash: $data['sha'],
            author_name: $data['commit']['author']['name'],
            author_email: $data['commit']['author']['email'],
            commit_date: Carbon::parse($data['commit']['author']['date'])->format('Y-m-d H:i:s'),
            message: $data['commit']['message'],
            repository_id: $repositoryId,
        );
    }

    public function toDatabase(): array
    {
        return [
            'commit_hash' => $this->commit_hash,
            'author_name' => $this->author_name,
            'author_email' => $this->author_email,
            'commit_date' => $this->commit_date,
            'message' => $this->message,
            'repository_id' => $this->repository_id,
        ];
    }
}
