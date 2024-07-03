<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Repository extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'github_id',
        'name',
        'full_name',
        'description',
        'url',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function commits(): HasMany
    {
        return $this->hasMany(Commit::class);
    }
}
