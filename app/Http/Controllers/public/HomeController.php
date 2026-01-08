<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $data = [];
        $data['campaigns'] = Campaign::where('is_featured', true)
            ->whereIn('status', ['active', 'completed'])
            ->orderBy('created_at', 'desc')
            ->get();
        return view('frontend.index', $data)->render();
    }

    public function donation(Campaign $campaign)
    {
        return view('frontend.donation.donate-now', compact('campaign'));
    }

    public function campaign(Request $request)
    {
        $campaigns = Campaign::orderBy('title', 'asc')->paginate(13);
        return view('frontend.campaign', compact('campaigns'));
    }

    public function show(Campaign $campaign)
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
