<?php

namespace App\Services;

use App\Models\About_us;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardService
{
    public function getAll($pagination = '')
    {
        return [
            "contact" => Contact::first(),
        ];
    }
}