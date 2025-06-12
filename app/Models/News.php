<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class News extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'content',
        'news_category_id',
        'published_at',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(NewsCategory::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(NewsImage::class);
    }
}
