<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;
    use Uuid;

    public function blocks(): HasMany
    {
        return $this->hasMany(ArticleBlock::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(ArticleTag::class);
    }
}
