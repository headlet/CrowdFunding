<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutCharity extends Model
{
     use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'box1_title',
        'box2_title',
        'image',
        'is_active',
    ];
}