<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\About_us;
use App\Models\AboutCharity;
use App\Models\Blog;
use App\Models\Campaign;
use App\Models\Contact;
use App\Models\Donation;
use App\Models\Gallery;
use App\Models\Slider;
use App\Models\SuccessStory;
use App\Models\Team;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $data['about_charity'] = AboutCharity::first();
        $data['slider'] = Slider::where('is_active', 1)->get();
        $data['campaigns'] = Campaign::where('is_featured', true)
            ->whereIn('status', ['active', 'completed'])
            ->orderBy('created_at', 'desc')->latest()
            ->get();
        $data['campaign_count'] = Campaign::count();
         $data['donor_count'] = Donation::count();
         $data['team_count'] = Team::count();
        $data['success_story'] = SuccessStory::first();
        $data['contact'] = Contact::first();
        $data['teams'] = Team::where('status', 1)->orderBy('id', 'asc')->get();
        $data['blogs'] = Blog::where('status', 'published')->with('blogCategory')
            ->latest()
            ->get();

        return view('frontend.index', $data)->render();
    }

    public function contact()
    {
        $data['contact'] = Contact::first();
        return view('frontend.contact', $data)->render();
    }

    public function about()
    {
        $data['contact'] = Contact::first();
        $data['about'] = About_us::first();
        $data['teams'] = Team::orderBy('id', 'asc')->get();
        return view('frontend.about', $data)->render();
    }

    public function blog(Blog $blog)
    {
        $contact = Contact::first();
        $blogs = $blog->where('status', 'published')->latest()->get();
        return view('frontend.blog', compact("blogs", 'contact'));
    }

    public function gallery(Gallery $gallerys)
    {
        $contact = Contact::first();
        $gallerys = $gallerys->where('status', 1)->latest()->get();
        return view('frontend.gallery', compact("gallerys", 'contact'));
    }

    public function donation(Campaign $campaign)
    {
        $contact = Contact::first();
        return view('frontend.donation.donate-now', compact('campaign', 'contact'));
    }

    public function campaign(Request $request)
    {
        $contact = Contact::first();
        $campaigns = Campaign::orderBy('title', 'asc')->latest()->get();
        return view('frontend.campaign', compact('campaigns', 'contact'));
    }

    public function team(Request $request)
    {
        $contact = Contact::first();
        $teams = Team::orderBy('id', 'asc')->get();
        return view('frontend.team.team', compact('teams', 'contact'));
    }

    public function campaign_details(Campaign $campaign)
    {
        $contact = Contact::first();
        return view('frontend.campaign-details', compact('campaign', 'contact'));
    }

    public function blog_details(Blog $blog)
    {
        $contact = Contact::first();
        $blogs = Blog::where('status', 'published')->with('blogCategory')
            ->latest()
            ->get();
        return view('frontend.blog-detail', compact('blogs', 'contact'));
    }
}
