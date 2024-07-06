<?php

namespace App\Http\Clients;

use App\Entities\RepositoryEntity;
use App\Models\Commit;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Collection;

class GithubApiClient
{
    protected Client $client;
    public function __construct(string $token)
    {
        $this->client = new Client([
            'base_uri' => 'https://api.github.com/',
            'headers' => [
                'Accept' => 'application/vnd.github.v3+json',
                'Authorization' => "Bearer {$token}",
            ],
        ]);
    }

    /**
     * @param string $username
     * @return Collection<RepositoryEntity>
     */
    public function getUserRepositories(string $username): Collection
    {
        try {
            $response = $this->client->get("users/{$username}/repos", [
                'query' => [
                    'per_page' => 100,
                ],
            ]);

            if ($response->getStatusCode() !== 200) {
                return collect();
            }

            return collect(json_decode($response->getBody()->getContents(), true))
                ->map(fn ($repository) => RepositoryEntity::new($repository));

        } catch (GuzzleException $e) {
            return collect();
        }
    }

    /**
     * @param string $owner
     * @param string $repository
     * @param string $repositoryId
     * @return Collection<Commit>
     */
    public function getCommits(string $owner, string $repository, string $repositoryId): Collection
    {
        try {
            $response = $this->client->get("repos/{$owner}/{$repository}/commits", [
                'query' => [
                    'per_page' => 100,
                ],
            ]);

            if ($response->getStatusCode() !== 200) {
                return collect();
            }

            return collect(json_decode($response->getBody()->getContents(), true))
                ->map(fn ($commit) => [
                    'repository_id' => $repositoryId,
                    'commit_hash' => $commit['sha'],
                    'author_name' => $commit['commit']['author']['name'],
                    'author_email' => $commit['commit']['author']['email'],
                    'commit_date' => $commit['commit']['author']['date'],
                    'message' => $commit['commit']['message'],
                ]);

        } catch (GuzzleException $e) {
            return collect();
        }
    }
}
