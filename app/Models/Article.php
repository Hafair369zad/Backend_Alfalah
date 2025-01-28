<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author');
    }

    // tabel pivot
    public function articleType(): BelongsToMany
    {
        return $this->belongsToMany(ArticleType::class, 'article_article_types', 'article_id', 'article_type_id')->withTimestamp();
    }
}
