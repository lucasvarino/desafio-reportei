<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RepositoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'github_id' => $this->github_id,
            'name' => $this->name,
            'full_name' => $this->full_name,
            'url' => $this->url,
            'description' => $this->description,
            'last_updated_at' => Carbon::parse($this->last_updated_at)->diffForHumans(),
            'stargazers_count' => $this->stargazers_count,
            'open_issues_count' => $this->open_issues_count,
            'pull_requests_count' => $this->pull_requests_count,
            'commits' => CommitResource::collection($this->whenLoaded('commits')),
        ];
    }
}
