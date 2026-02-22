<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GalleryCategory extends Model
{
    protected $fillable = ['name', 'slug', 'status'];

    protected $casts = ['status' => 'boolean'];

    public function galleries(): HasMany
    {
        return $this->hasMany(Gallery::class, 'category_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}