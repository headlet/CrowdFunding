<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    protected $fillable = [
        'about_small_text',
        'header_logo',
        'footer_logo',
        'facebook',
        'twitter',
        'linkedin',
        'instagram',
        'youtube',
        'is_active'
    ];
}
