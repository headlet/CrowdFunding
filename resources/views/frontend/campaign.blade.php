@extends('frontend.master')
@section('title')
    Campaigns
@endsection

@section('content')
    <div class="breadcumb-wrapper " data-bg-src="{{ asset('img/bg/breadcumb-bg.jpg') }}" data-overlay="theme">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Campaigns</h1>
                <ul class="breadcumb-menu">
                    <li><a href="index.html">Home</a></li>
                    <li>Campaigns</li>
                </ul>
            </div>
        </div>
    </div>

    <section class="space" id="donation-sec">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center title-area">
                        <span class="sub-title before-none after-none"><i class="far fa-heart text-theme"></i> Lets Start
                            Donating</span>
                        <h2 class="sec-title">See Your Impact: Transparent
                            Donation Causes</h2>
                    </div>
                </div>
            </div>
            <div class="row gy-30">
                @forelse ($campaigns as $campaign)
                    <div class="col-xl-6">
                        <div class="donation-card style3">
                            <div class="box-thumb">
                                <img src="{{ asset('uploads/campaigns/' . $campaign->image) }}" alt="image">
                                <div class="donation-card-tag">
                                    {{ number_format(($campaign->raised_amount / $campaign->goal_amount) * 100, 2) }}%
                                </div>
                                <div class="donation-card-shape"
                                    data-mask-src="{{ asset('img/donation/donation-card-shape2-1.png') }}"></div>
                            </div>
                            <div class="box-content">
                                <h3 class="box-title"><a href="blog-details.html">{{ $campaign->short_description }}</a>
                                </h3>
                                <p>
                                <p>
                                    {{ Str::limit($campaign->description, 50) }}

                                </p>

                                </p>
                                <div class="donation-card_progress-wrap">

                                    <div class="progress">
                                        <div class="progress-bar"
                                            style="width:   {{ number_format(($campaign->raised_amount / $campaign->goal_amount) * 100, 2) }}%;">
                                        </div>
                                    </div>
                                    <div class="donation-card_progress-content">
                                        <span class="donation-card_raise">Raised <span
                                                class="donation-card_raise-number">{{ $campaign->raised_amount }}</span></span>
                                        <span class="donation-card_goal">Goal <span
                                                class="donation-card_goal-number">{{ $campaign->goal_amount }}</span></span>
                                    </div>
                                </div>
                                <a href="{{ route('campaign-details', $campaign->id) }}" class="th-btn style6">Donate Now <i
                                        class="fas fa-arrow-up-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>

                @empty
                    <div class="col-xl-6">
                        <div class="donation-card style3">
                            <div class="box-thumb">
                                <img src="{{ asset('img/donation/donation2-1.png') }}" alt="image">
                                <div class="donation-card-tag">85%</div>
                                <div class="donation-card-shape"
                                    data-mask-src="{{ asset('img/donation/donation-card-shape2-1.png') }}"></div>
                            </div>
                            <div class="box-content">
                                <h3 class="box-title"><a href="blog-details.html">Your Little Help Can Heal Their Helps</a>
                                </h3>
                                <p>Join our community of dedicated supporter by becoming member. Enjoy exclusive benefit.
                                </p>
                                <div class="donation-card_progress-wrap">

                                    <div class="progress">
                                        <div class="progress-bar" style="width: 85%;">
                                        </div>
                                    </div>
                                    <div class="donation-card_progress-content">
                                        <span class="donation-card_raise">Raised <span
                                                class="donation-card_raise-number">$45,000.00</span></span>
                                        <span class="donation-card_goal">Goal <span
                                                class="donation-card_goal-number">$60,000.00</span></span>
                                    </div>
                                </div>
                                <a href="blog-details.html" class="th-btn style6">Donate Now <i
                                        class="fas fa-arrow-up-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Brand Area --}}

    <div class="overflow-hidden space-bottom brand-area-1">
        <div class="container">
            <div class="p-0 m-0 text-center brand-wrap1">
                <h3 class="brand-wrap-title">Trusted by over <span class="text-theme2"><span
                            class="counter-number">90</span>K+</span> companies worldwide</h3>
                <div class="swiper th-slider" id="brandSlider1"
                    data-slider-options='{"breakpoints":{"0":{"slidesPerView":2},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"},"1400":{"slidesPerView":"5", "spaceBetween": "90"}}}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a href="blog.html" class="brand-box">
                                <img src="{{ asset('img/brand/brand1-1.svg') }}" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="blog.html" class="brand-box">
                                <img src="{{ asset('img/brand/brand1-2.svg') }}" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="blog.html" class="brand-box">
                                <img src="{{ asset('img/brand/brand1-3.svg') }}" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="blog.html" class="brand-box">
                                <img src="{{ asset('img/brand/brand1-4.svg') }}" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="blog.html" class="brand-box">
                                <img src="{{ asset('img/brand/brand1-5.svg') }}" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="blog.html" class="brand-box">
                                <img src="{{ asset('img/brand/brand1-1.svg') }}" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="blog.html" class="brand-box">
                                <img src="{{ asset('img/brand/brand1-2.svg') }}" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="blog.html" class="brand-box">
                                <img src="{{ asset('img/brand/brand1-3.svg') }}" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="blog.html" class="brand-box">
                                <img src="{{ asset('img/brand/brand1-4.svg') }}" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="blog.html" class="brand-box">
                                <img src="{{ asset('img/brand/brand1-5.svg') }}" alt="Brand Logo">
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
