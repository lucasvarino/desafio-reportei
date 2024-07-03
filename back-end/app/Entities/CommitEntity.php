<?php

namespace App\Entities;

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

    public function new(array $data): self
    {
        return new self(
            commit_hash: $data['commit_hash'],
            author_name: $data['author_name'],
            author_email: $data['author_email'],
            commit_date: $data['commit_date'],
            message: $data['message'],
            repository_id: $data['repository_id'],
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
