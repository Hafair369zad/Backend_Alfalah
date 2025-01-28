<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ArticleType extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // tabel pivot
    public function article(): BelongsToMany
    {
        return $this->belongsToMany(Article::class, 'article_article_types', 'article_type_id', 'article_id')->withTimestamp();
    }
}
