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
        
        $data['teams'] = Team::where('status', 1)->orderBy('id', 'asc')->get();
        $data['blogs'] = Blog::where('status', 'published')->with('blogCategory')
            ->latest()
            ->get();
        $data['marqueeItems'] = ['Medical', 'Education', 'Foods', 'Health', 'Support', 'Donation', 'Medical', 'Education', 'Foods', 'Health', 'Support', 'Donation',];
        $data['services'] = [
            [
                'image' => 'img/service/service_card_3_1.png',
                'icon' => 'img/icon/service-icon/service-card-icon1-1.svg',
                'title' => 'Fund Poor Raised',
                'desc' => 'Share stories and experiences from current volunteers to inspire others to join.'
            ],
            [
                'image' => 'img/service/service_card_3_2.png',
                'icon' => 'img/icon/service-icon/service-card-icon1-3.svg',
                'title' => 'Money This Treatment',
                'desc' => 'Share stories and experiences from current volunteers to inspire others to join.'
            ],
            [
                'image' => 'img/service/service_card_3_3.png',
                'icon' => 'img/icon/service-icon/service-card-icon1-2.svg',
                'title' => 'Child Education Raised',
                'desc' => 'Share stories and experiences from current volunteers to inspire others to join.'
            ]
        ];

        return view('frontend.index', $data)->render();
    }

    public function contact()
    {
        $data['contact'] = Contact::first();
        return view('frontend.contact', $data)->render();
    }

    public function about()
    {
        
        $data['about'] = About_us::first();
        $data['teams'] = Team::orderBy('id', 'asc')->get();
        
        return view('frontend.about', $data)->render();
    }

    public function blog(Blog $blog)
    {
        $blogs = $blog->where('status', 'published')->latest()->get();
        return view('frontend.blog', compact("blogs"));
    }

    public function gallery(Gallery $gallerys)
    {
  
        $gallerys = $gallerys->where('status', 1)->latest()->get();
        return view('frontend.gallery', compact("gallerys"));
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

    public function blog_details(Blog $blog)
    {
        
        $blogs = $blog->where('status', 'published')->latest()->get();
        return view('frontend.blog-detail', compact('blogs' , 'blog'));
    }
}
