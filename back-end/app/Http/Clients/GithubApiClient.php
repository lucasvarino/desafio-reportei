<?php

namespace App\Http\Clients;

use App\Entities\CommitEntity;
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
        $perPage = 100;
        $page = 1;
        $repositories = collect();

        try {
            do {
                $response = $this->client->get("users/{$username}/repos", [
                    'query' => [
                        'per_page' => $perPage,
                        'page' => $page,
                    ],
                ]);

                if ($response->getStatusCode() !== 200) {
                    return $repositories;
                }

                $data = json_decode($response->getBody()->getContents(), true);

                $repositories = $repositories->merge(
                    collect($data)->map(fn ($repository) => RepositoryEntity::new($repository))
                );

                $page++;

            } while (!empty($data) && count($data) === $perPage);

            return $repositories;

        } catch (GuzzleException $e) {
            return $repositories;
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
        $perPage = 100;
        $page = 1;
        $commits = collect();

        try {
            do {
                $response = $this->client->get("repos/{$owner}/{$repository}/commits", [
                    'query' => [
                        'per_page' => $perPage,
                        'page' => $page,
                    ],
                ]);

                if ($response->getStatusCode() !== 200) {
                    return $commits;
                }

                $data = json_decode($response->getBody()->getContents(), true);

                $commits = $commits->merge(
                    collect($data)->map(fn ($commit) => CommitEntity::new($commit, $repositoryId))
                );

                $page++;

            } while (!empty($data) && count($data) === $perPage);

            return $commits;

        } catch (GuzzleException $e) {
            return $commits;
        }
    }
}
