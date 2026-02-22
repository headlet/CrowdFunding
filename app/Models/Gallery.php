<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gallery extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'image',
        'alt_text',
        'caption',
        'sort_order',
        'featured',
        'status',
    ];

    protected $casts = [
        'featured'   => 'boolean',
        'status'     => 'boolean',
        'sort_order' => 'integer',
    ];

    // ── Relationships ─────────────────────────────────────────

    public function galleryCategory(): BelongsTo
    {
        return $this->belongsTo(GalleryCategory::class, 'category_id');
    }

    // ── Scopes ────────────────────────────────────────────────

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderByDesc('created_at');
    }
}