<?php

namespace App\Services;

use App\Models\About_us;
use App\Models\Campaign;
use App\Models\Contact;
use App\Models\Donation;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardService
{
    public function getAll($pagination = '')
    {
        $donations = Donation::orderBy('created_at', 'asc')->get();

        // Extract amounts and dates for the chart
        $amounts = $donations->pluck('amount')->toArray();
        $dates = $donations->pluck('created_at')->map(function ($date) {
            return $date->format('d M');
        })->toArray();

        return [
            'campaign_count' => Campaign::count(),
            'donor_count' => Donation::count(),
            'totalAmount' => Donation::sum('amount'),
            'team_count' => Team::count(),
            "contact" => Contact::first(),
            'amounts' => $amounts,
            'dates' => $dates
        ];
    }
}
