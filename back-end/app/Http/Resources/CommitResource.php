<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommitResource extends JsonResource
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
            'commit_hash' => $this->commit_hash,
            'author_name' => $this->author_name,
            'author_email' => $this->author_email,
            'commit_date' => $this->commit_date,
            'message' => $this->message,
        ];
    }
}
