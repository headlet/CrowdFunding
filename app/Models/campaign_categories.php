<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class campaign_categories extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
    ];

    public function campaigns()
    {
        return $this->hasMany(Campaign::class, 'category_id');
    }
}
