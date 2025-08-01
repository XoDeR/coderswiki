<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ArticleTag extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleTagFactory> */
    use HasFactory;
    use Uuid;

    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class);
    }
}
