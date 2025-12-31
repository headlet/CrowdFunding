<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'user_id',
        'category_id',
        'short_description',
        'description',
        'goal_amount',
        'raised_amount',
        'start_date',
        'end_date',
        'country',
        'address',
        'image',
        'status',
        'is_featured',
    ];

    // Cast dates to Carbon automatically
    protected $casts = [
        'start_date' => 'date',
        'end_date'   => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(campaign_categories::class, 'category_id');
    }
}
