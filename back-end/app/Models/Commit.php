<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Commit extends Model
{
    use HasFactory;

    protected $fillable = [
        'repository_id',
        'commit_hash',
        'author_name',
        'author_email',
        'commit_date',
        'message',
    ];

    public function repository(): BelongsTo
    {
        return $this->belongsTo(Repository::class);
    }
}
