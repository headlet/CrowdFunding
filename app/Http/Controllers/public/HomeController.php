<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Team;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $data = [];
        $data['campaigns'] = Campaign::where('is_featured', true)
            ->whereIn('status', ['active', 'completed'])
            ->orderBy('created_at', 'desc')->latest()
            ->get();
        $data['teams'] = Team::where('status', 1)->orderBy('id', 'asc')->get();

        return view('frontend.index', $data)->render();
    }

    public function donation(Campaign $campaign)
    {
        return view('frontend.donation.donate-now', compact('campaign'));
    }

    public function campaign(Request $request)
    {
        $campaigns = Campaign::orderBy('title', 'asc')->latest()->get();
        return view('frontend.campaign', compact('campaigns'));
    }

    public function team(Request $request)
    {
        $teams = Team::orderBy('id', 'asc')->get();
        return view('frontend.team.team', compact('teams'));
    }

    public function campaign_details(Campaign $campaign)
    {
        return view('frontend.campaign-details', compact('campaign'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
