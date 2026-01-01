<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignCategories extends Model
{
    protected $table = 'campaign_categories';
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
