<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gallery extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'gallery_category_id',
        'image',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(GalleryCategory::class);
    }
}
