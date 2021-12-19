<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'author',
        'publisher',
        'published_at',
        'description',
        'article_categories_id',
        'thumbnail_image',
    ];

    public function category() {
        return $this->hasOne(ArticleCategory::class, 'id', 'article_categories_id');
    }
}
