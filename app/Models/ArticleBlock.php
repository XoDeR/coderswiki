<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ArticleBlock extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleBlockFactory> */
    use HasFactory;
    use Uuid;

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}
