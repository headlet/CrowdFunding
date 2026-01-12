@extends('frontend.master')

@section('title')
    Donat - Charity
@endsection

@section('content')
    @php
        $des =
            ' Explore the variety of volunteer opportunities available. From event planning and fundraising to fieldwork and administrative support';
        $heroSlides = [
            (object) [
                'bg' => 'img/hero/hero_bg_4_1.jpg',
                'subtitle' => 'Making a Difference',
                'title1' => 'Changing Lives, One',
                'title2' => 'Donation at a Time',
            ],
            (object) [
                'bg' => 'img/hero/hero_bg_4_2.jpg',
                'subtitle' => 'Give Hope For Homeless',
                'title1' => 'Helping Each Other',
                'title2' => 'Make World Better',
            ],
            (object) [
                'bg' => 'img/hero/hero_bg_4_3.jpg',
                'subtitle' => 'Making a Difference',
                'title1' => 'Every Donation Counts',
                'title2' => 'Help Us Change Lives',
            ],
        ];
    @endphp

    {{-- Hero Area --}}
    <div class="th-hero-wrapper hero-4" id="hero">
        {{-- Slider --}}
        <div class="swiper th-slider hero-slider4" id="heroSlider4"
            data-slider-options='{"effect":"fade","autoHeight": "true"}'>
            <div class="swiper-wrapper">

                @foreach ($heroSlides as $slide)
                    <div class="swiper-slide">
                        <div class="hero-inner" data-bg-src="{{ asset($slide->bg) }}">

                            {{-- Shapes --}}
                            <div class="hero-bg-shape4-1">
                                <img src="{{ asset('img/hero/hero-bg-shape4-1.png') }}" alt="img">
                            </div>
                            <div class="hero-bg-shape4-2 shake">
                                <img src="{{ asset('img/hero/hero-bg-shape4-2.png') }}" alt="img">
                            </div>
                            <div class="hero-bg-shape4-3 jump d-xl-inline-block d-none">
                                <img src="{{ asset('img/hero/hero-bg-shape4-3.png') }}" alt="img">
                            </div>
                            <div class="hero-bg-shape4-4 jump-reverse">
                                <img src="{{ asset('img/hero/hero-bg-shape4-4.png') }}" alt="img">
                            </div>
                            <div class="hero-bg-shape4-5">
                                <img src="{{ asset('img/hero/hero-bg-shape4-5.png') }}" alt="img">
                            </div>

                            {{-- Content --}}
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-9">
                                        <div class="hero-style4">
                                            <span class="sub-title after-none" data-ani="slideinup" data-ani-delay="0.2s">
                                                {{ $slide->subtitle }}
                                            </span>
                                            <h1 class="text-white hero-title">
                                                <span class="title1" data-ani="slideinup" data-ani-delay="0.4s">
                                                    {{ $slide->title1 }}
                                                </span>
                                                <span class="title1" data-ani="slideinup" data-ani-delay="0.4s">
                                                    {{ $slide->title2 }}
                                                </span>
                                            </h1>
                                            <p class="text-white hero-text" data-ani="slideinup" data-ani-delay="0.6s">
                                                {{ __($des) }}
                                            </p>
                                            <div class="btn-wrap" data-ani="slideinup" data-ani-delay="0.7s">
                                                <a href="about.html" class="th-btn">Discover Now<i
                                                        class="fa-solid fa-arrow-up-right ms-2"></i></a>
                                                <a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk"
                                                    class="play-btn style3 popup-video"><i class="fas fa-play"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        {{-- Thumbnails --}}
        <div class="hero-thumb-tab" data-slider-tab=".hero-slider4">
            @foreach ($heroSlides as $index => $slide)
                <div class="tab-btn {{ $index === 0 ? 'active' : '' }}">
                    <img src="{{ asset($slide->bg) }}" alt="thumb">
                </div>
            @endforeach
        </div>

    </div>
    {{-- Hero Section --}}

    {{-- Counter Area --}}

    <div class="bg-smoke2 pt-80 pb-80">
        <div class="container">
            <div class="counter-wrap">
                <div class="counter-card">
                    <div class="media-body">
                        <h2 class="box-number text-theme"><span class="counter-number">15</span>k<span
                                class="fw-light">+</span></h2>
                        <p class="box-text">Incredible Volunteers</p>
                    </div>
                </div>
                <div class="divider"></div>
                <div class="counter-card">
                    <div class="media-body">
                        <h2 class="box-number text-theme2"><span class="counter-number">1</span>k<span
                                class="fw-light">+</span></h2>
                        <p class="box-text">Successful Campaigns</p>
                    </div>
                </div>
                <div class="divider"></div>
                <div class="counter-card">
                    <div class="media-body">
                        <h2 class="box-number text-theme"><span class="counter-number">400</span><span
                                class="fw-light">+</span></h2>
                        <p class="box-text">Monthly Donors</p>
                    </div>
                </div>
                <div class="divider"></div>
                <div class="counter-card">
                    <div class="media-body">
                        <h2 class="box-number text-theme2"><span class="counter-number">35</span>k<span
                                class="fw-light">+</span></h2>
                        <p class="box-text">Team Support</p>
                    </div>
                </div>
                <div class="divider"></div>
            </div>
        </div>
    </div>

    {{-- About Area --}}

    <div class="overflow-hidden space" id="about-sec">
        <div class="shape-mockup about-bg-shape4-1 d-xxl-block d-none jump-reverse" data-bottom="0" data-left="0%">
            <img src="{{ asset('img/shape/about_shape4_1.png') }}" alt="shape">
        </div>

        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 mb-50 mb-xl-0">
                    <div class="img-box4">
                        <div class="img1">
                            <img src="{{ asset('img/normal/about_4_1.png') }}" alt="About">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="about-wrap4">
                        <div class="title-area mb-30">
                            <span class="sub-title before-none">About Us Charity</span>
                            <h2 class="sec-title">Making a Difference, One Life at a Time</h2>
                            <p class="sec-text">Our secure online donation platform allows you to make contributions
                                quickly and safely. Choose from various payment methods and set up one-time or recurring
                                donations with ease. Your support helps us continue our mission.</p>
                        </div>
                        <div class="about-feature-grid-wrap">
                            <div class="mb-0 about-feature-grid style2">
                                <div class="box-icon">
                                    <img src="{{ asset('img/icon/about-icon4-1.svg') }}" alt="icon">
                                </div>
                                <div class="media-body">
                                    <h4 class="box-title">Be a Hero, Contribute Now</h4>
                                </div>
                            </div>
                            <div class="mb-0 about-feature-grid style2">
                                <div class="box-icon" data-theme-color="var(--theme-color2)">
                                    <img src="{{ asset('img/icon/about-icon4-2.svg') }}" alt="icon">
                                </div>
                                <div class="media-body">
                                    <h4 class="box-title">Help Children with Donations</h4>
                                </div>
                            </div>
                        </div>
                        <div class="checklist mt-30">
                            <ul>
                                <li><img src="{{ asset('img/icon/checklist-icon.svg') }}" alt="icon">Providing
                                    essential resources to underserved communities.</li>
                                <li><img src="{{ asset('img/icon/checklist-icon.svg') }}" alt="icon">Offering support
                                    through educational and health programs.</li>
                                <li><img src="{{ asset('img/icon/checklist-icon.svg') }}" alt="icon">Facilitating
                                    volunteer opportunities for community involvement.</li>
                            </ul>
                        </div>
                        <div class="mt-40 btn-wrap style2">
                            <a href="about.html" class="th-btn">About More<div class="icon"><i
                                        class="fa-solid fa-arrow-up-right ms-2"></i></div></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Donation Area --}}

    <section class="overflow-hidden " data-bg-src="{{ asset('img/bg/gray-bg3.png') }}" id="donation-sec">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="text-center title-area">
                        <span class="sub-title">Start donating poor people</span>
                        <h2 class="sec-title">Give Now to Help Locate the Well-liked Cause</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container th-container2">
            <div class="slider-area">
                <div class="swiper th-slider has-shadow" id="donationSlider4"
                    data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"},"1400":{"slidesPerView":"4"}}, "autoHeight": "true"}'>
                    <div class="swiper-wrapper">

                        @forelse ($campaigns as $campaign)
                            <div class="swiper-slide">
                                <div class="donation-card style4"
                                    data-theme-color="{{ $campaign->theme_color ?? 'var(--theme-color2)' }}">
                                    <div class="box-thumb">
                                        <img src="{{ asset('uploads/campaigns/' . $campaign->image) }}" alt="image">
                                    </div>
                                    <h3 class="box-title"><a href="blog-details.html">{{ $campaign->title }}</a></h3>
                                    <div class="box-content">
                                        <h4 class="subtitle">Donation</h4>
                                        <div class="donation-card_progress-wrap">

                                            <div class="progress">
                                                <div class="progress-bar"
                                                    style="width: {{ number_format(($campaign->raised_amount / $campaign->goal_amount) * 100, 2) }}%;">
                                                    <div class="progress-value">
                                                        {{ number_format(($campaign->raised_amount / $campaign->goal_amount) * 100, 2) }}%

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="donation-card_progress-content">
                                                <span class="donation-card_raise">Raised
                                                    -{{ __($campaign->raised_amount) }}</span>
                                                <span class="donation-card_goal">Goal -
                                                    {{ __($campaign->goal_amount) }}</span>
                                            </div>
                                        </div>
                                        <a href="{{ route('campaign-details', $campaign->id) }}"
                                            class="th-btn style6">Donate Now <i
                                                class="fas fa-arrow-up-right ms-2"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="donation4-btn-wrap mt-60">
                <div class="thumb">
                    <img src="{{ asset('img/donation/donation4-btn-wrap-thumb.png') }}" alt="img">
                </div>
                <h4 class="title">We are supporting over 10+ additional causes to aid people worldwide.</h4>
                <a href="{{ route('campaign') }}" class="th-btn">More Cause <i
                        class="fas fa-arrow-up-right ms-2"></i></a>
            </div>
        </div>
    </section>

    {{-- Service Area --}}
    <section class="service-area-3 space" id="service-sec">
        <div class="shape-mockup service-shape-3-1 jump d-lg-block d-none" data-left="3%" data-top="15%">
            <div class="color-masking">
                <div class="masking-src bg-mask" data-mask-src="{{ asset('img/hero/hero-bg-shape2-1.png') }}"></div>
                <img src="{{ asset('img/hero/hero-bg-shape2-1.png') }}" alt="shape">
            </div>
        </div>

        <div class="shape-mockup service-shape-3-2 jump-reverse d-lg-block d-none" data-right="3%" data-bottom="5%">
            <img src="{{ asset('img/shape/service_bg_shape4_1.png') }}" alt="shape">
        </div>
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-7">
                    <div class="text-center title-area">
                        <span class="sub-title">Our Best Services</span>
                        <h2 class="sec-title">We provide this life's service to the poor.</h2>
                    </div>
                </div>
            </div>
            <div class="row gy-30 gx-30 justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="service-card style3">
                        <div class="box-thumb">
                            <img src="{{ asset('img/service/service_card_3_1.png') }}" alt="icon">
                        </div>
                        <div class="box-icon">
                            <img src="{{ asset('img/icon/service-icon/service-card-icon1-1.svg') }}" alt="Icon">
                        </div>
                        <div class="box-content">
                            <h3 class="box-title"><a href="about.html">Fund Poor Raised</a></h3>
                            <p class="box-text">Share stories and experiences from current volunteers to inspire others to
                                join.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card style3">
                        <div class="box-thumb">
                            <img src="{{ asset('img/service/service_card_3_2.png') }}" alt="icon">
                        </div>
                        <div class="box-icon">
                            <img src="{{ asset('img/icon/service-icon/service-card-icon1-3.svg') }}" alt="Icon">
                        </div>
                        <div class="box-content">
                            <h3 class="box-title"><a href="about.html">Money This Treatment</a></h3>
                            <p class="box-text">Share stories and experiences from current volunteers to inspire others to
                                join.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card style3">
                        <div class="box-thumb">
                            <img src="{{ asset('img/service/service_card_3_3.png') }}" alt="icon">
                        </div>
                        <div class="box-icon">
                            <img src="{{ asset('img/icon/service-icon/service-card-icon1-2.svg') }}" alt="Icon">
                        </div>
                        <div class="box-content">
                            <h3 class="box-title"><a href="about.html">Child Education Raised</a></h3>
                            <p class="box-text">Share stories and experiences from current volunteers to inspire others to
                                join.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Marquee Area --}}

    <div class="overflow-hidden space-bottom">
        <div class="p-0 container-fluid">
            <div class="swiper th-slider marquee-slider1"
                data-slider-options='{"breakpoints":{"0":{"slidesPerView":"auto"}},"autoplay":{"delay":0,"disableOnInteraction":false},"noSwiping":"true","speed":10000,"spaceBetween":20}'>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="marquee-card">
                            <a target="_blank" href="home-4.html#"><span class="text-stroke">Medical</span></a>
                            <span><img src="{{ asset('img/icon/marquee-circle-icon.svg') }}" alt="img"></span>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="marquee-card">
                            <a target="_blank" href="home-4.html#"><span class="text-theme">Education</span></a>
                            <span><img src="{{ asset('img/icon/marquee-circle-icon.svg') }}" alt="img"></span>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="marquee-card">
                            <a target="_blank" href="home-4.html#"><span class="text-stroke">Foods</span></a>
                            <span><img src="{{ asset('img/icon/marquee-circle-icon.svg') }}" alt="img"></span>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="marquee-card">
                            <a target="_blank" href="home-4.html#"><span class="text-theme">Health</span></a>
                            <span><img src="{{ asset('img/icon/marquee-circle-icon.svg') }}" alt="img"></span>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="marquee-card">
                            <a target="_blank" href="home-4.html#"><span class="text-stroke">Support</span></a>
                            <span><img src="{{ asset('img/icon/marquee-circle-icon.svg') }}" alt="img"></span>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="marquee-card">
                            <a target="_blank" href="home-4.html#"><span class="text-theme">Donation</span></a>
                            <span><img src="{{ asset('img/icon/marquee-circle-icon.svg') }}" alt="img"></span>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="marquee-card">
                            <a target="_blank" href="home-4.html#"><span class="text-stroke">Medical</span></a>
                            <span><img src="{{ asset('img/icon/marquee-circle-icon.svg') }}" alt="img"></span>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="marquee-card">
                            <a target="_blank" href="home-4.html#"><span class="text-theme">Education</span></a>
                            <span><img src="{{ asset('img/icon/marquee-circle-icon.svg') }}" alt="img"></span>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="marquee-card">
                            <a target="_blank" href="home-4.html#"><span class="text-stroke">Foods</span></a>
                            <span><img src="{{ asset('img/icon/marquee-circle-icon.svg') }}" alt="img"></span>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="marquee-card">
                            <a target="_blank" href="home-4.html#"><span class="text-theme">Health</span></a>
                            <span><img src="{{ asset('img/icon/marquee-circle-icon.svg') }}" alt="img"></span>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="marquee-card">
                            <a target="_blank" href="home-4.html#"><span class="text-stroke">Support</span></a>
                            <span><img src="{{ asset('img/icon/marquee-circle-icon.svg') }}" alt="img"></span>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="marquee-card">
                            <a target="_blank" href="home-4.html#"><span class="text-theme">Donation</span></a>
                            <span><img src="{{ asset('img/icon/marquee-circle-icon.svg') }}" alt="img"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Campaign Area --}}

    <div class="overflow-hidden campaign-area-1 space-top bg-gray" data-bg-src="{{ asset('img/bg/gray-bg4.png') }}">
        <div class="shape-mockup d-xl-block d-none campaign-bg-shape1-1 jump-reverse" data-bottom="10%" data-right="0">
            <img src="{{ asset('img/shape/campaign-shape1-1.png') }}" alt="shape">
        </div>
        <div class="shape-mockup d-xl-block d-none campaign-bg-shape1-2" data-top="0" data-right="0">
            <img src="{{ asset('img/shape/campaign-bg-shape1-1.png') }}" alt="shape">
        </div>
        <div class="shape-mockup d-xl-block d-none campaign-bg-shape1-3" data-bottom="0" data-right="0" data-left="0">
            <img class="w-100" src="{{ asset('img/shape/campaign-bg-shape1-2.png') }}" alt="shape">
        </div>
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6">
                    <div class="title-area">
                        <span class="sub-title before-none">Fundraising Campaigns</span>
                        <h2 class="sec-title">Save the Children, One Donation at the Time</h2>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="sec-btn">
                        <a href="contact.html" class="th-btn">Contact Us Now<i
                                class="fas fa-arrow-up-right ms-2"></i></a>
                    </div>
                </div>
            </div>
            <div class="campaign-wrap1">
                <div class="campaign-thumb">
                    <div class="campaign-thumb-bg" data-bg-src="{{ asset('img/shape/campaign-thumb-shape1-1.png') }}">
                    </div>
                    <img src="{{ asset('img/normal/campaign-thumb1-1.png') }}" alt="img">
                </div>
                <div class="donation-form-v1">
                    <h3 class="mb-10 title">Help Children by Collecting Priceless Contributions</h3>
                    <p>Our secure online donation platform allows you to make contributions quickly and safely. Choose from
                        various payment methods and set up one-time.exactly.</p>
                    <div class="donation-card_progress-wrap">
                        <div class="progress">
                            <div class="progress-bar" style="width: 85%;">
                            </div>
                        </div>
                        <div class="donation-card_progress-content">
                            <span class="donation-card_raise">Raised Money <span class="box-number">$70,000</span></span>
                            <span class="donation-card_goal">Goals <span class="box-number">$100,000</span></span>
                        </div>
                    </div>
                    <form action="https://html.themehour.net/donat/demo/mail.php" method="POST"
                        class="contact-form ajax-contact">

                        <ul class="donate-amount-button-list list-unstyled">
                            <li class="donate-amount-button active" data-amount="$10">
                                $10
                            </li>

                            <li class="donate-amount-button" data-amount="$30">
                                $30
                            </li>

                            <li class="donate-amount-button" data-amount="$50">
                                $50
                            </li>

                            <li class="donate-amount-button" data-amount="$100">
                                $100
                            </li>

                            <li class="donate-amount-button" data-amount="$200">
                                $200
                            </li>
                        </ul>
                        <div class="btn-wrap">
                            <div class="form-group donate-input">
                                <input type="text" placeholder="$ Custom Amount" required class="donate_amount">
                            </div>
                            <div class="form-btn">
                                <button class="th-btn btn-sm">Donate Now <i class="fas fa-heart ms-2"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Team Area --}}

    <section class="space team-area-2">
        <div class="shape-mockup team-bg-shape2-1 spin d-xxl-block d-none" data-top="20%" data-right="3%"><img
                src="{{ asset('img/shape/hand-group-shape1.png') }}" alt="img"></div>
        <div class="container">
            <div class="text-center title-area">
                <span class="sub-title after-none before-none">Our Volunteer</span>
                <h2 class="sec-title">Meet The Optimistic Volunteer</h2>
            </div>
            <div class="slider-area">
                <div class="swiper th-slider has-shadow team-slider2" id="teamSlider2"
                    data-slider-options='{"spaceBetween": "30","breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"3"}}}'>
                    <div class="swiper-wrapper">

                        @forelse ($teams as $team)
                            <div class="swiper-slide">
                                <div class="th-team team-card2">
                                    <div class="img-wrap">
                                        <div class="team-img">
                                            <img src="{{ asset('uploads/teams/' . '1768121542_829459_man_512x512.png' ?? $team->image) }}"
                                                alt="Team">
                                        </div>
                                        <div class="team-social-hover">
                                            <a href="home-4.html#" class="team-social-hover_btn">
                                                <i class="far fa-plus"></i>
                                            </a>
                                            <div class="th-social">
                                                <a target="_blank" href="https://twitter.com/"><i
                                                        class="fab fa-twitter"></i></a>
                                                <a target="_blank" href="https://facebook.com/"><i
                                                        class="fab fa-facebook-f"></i></a>
                                                <a target="_blank" href="https://instagram.com/"><i
                                                        class="fab fa-instagram"></i></a>
                                                <a target="_blank" href="https://behance.com/"><i
                                                        class="fab fa-behance"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="team-card-content">
                                        <h3 class="box-title"><a href="team-details.html">{{ $team->name }}</a></h3>
                                        <span class="team-desig">Volunteer</span>
                                    </div>
                                </div>
                            </div>
                        @empty

                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    {{-- Story Area --}}

    <div class="overflow-hidden story-area-1 space bg-smoke2">
        <div class="container">
            <div class="flex-row-reverse row gy-40 justify-content-between align-items-center">
                <div class="col-xl-7">
                    <div class="story-img-box1">
                        <div class="box-wrap d-inline-block">
                            <div class="img1">
                                <img src="{{ asset('img/normal/story_1_1.png') }}" alt="img">
                            </div>
                            <div class="story-shape1-1 jump-reverse">
                                <img src="{{ asset('img/shape/story_shape1_1.png') }}" alt="img">
                            </div>
                            <div class="story-card movingX">
                                <h5 class="box-title">Adam Cruz</h5>
                                <p class="box-text">Our success stories highlight the
                                    real life impact of your donations &
                                    the resilience of those we help.
                                    These narratives showcase the
                                    power of compassion.</p>
                                <div class="quote-icon" data-mask-src="{{ asset('img/icon/quote.svg') }}"></div>
                            </div>
                            <div class="year-counter">
                                <p class="year-counter_text">Years of <span>Experience</span></p>
                                <div class="year-counter_number"><span class="counter-number">16</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="story-wrap1">
                        <div class="mb-0 title-area">
                            <span class="sub-title before-none">Success Story</span>
                            <h2 class="sec-title">We Help Fellow Nonprofits Access the Funding Tools, Training</h2>
                            <p class="mt-30">Our secure online donation platform allows you to make contributions quickly
                                and safely. Choose from various payment methods and set up one-time.exactly.</p>
                            <div class="btn-wrap mt-35">
                                <a href="about.html" class="th-btn style-border">Our Success Story <i
                                        class="fas fa-arrow-up-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Testimonial Area --}}

    <section class="overflow-hidden testi-area-4 space bg-theme-dark">
        <div class="shape-mockup testi-bg-shape4-1 jump-reverse d-xl-block d-none" data-top="5%" data-left="3%">
            <img src="{{ asset('img/hero/hero-bg-shape4-4.png') }}" alt="img">
        </div>
        <div class="shape-mockup shake testi-bg-shape4-2 d-xl-block d-none" data-top="7%" data-right="5%">
            <img src="{{ asset('img/shape/team_bg_shape3_4.png') }}" alt="img">
        </div>
        <div class="shape-mockup shake testi-bg-shape4-3 d-xl-block d-none" data-bottom="7%" data-left="4%">
            <img src="{{ asset('img/shape/team_bg_shape3_5.png') }}" alt="img">
        </div>
        <div class="container">
            <div class="row gy-40 gx-80">
                <div class="col-lg-4 align-self-end">
                    <div class="swiper th-slider testi-thumb-slider4"
                        data-slider-options='{"effect":"fade","loop":false}'>
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="testi-box-img">
                                    <img class="testi-img" src="{{ asset('img/testimonial/testi_4_1.png') }}"
                                        alt="img">
                                    <div class="testi-card_review">
                                        <i class="fas fa-star"></i>
                                        5.0
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testi-box-img">
                                    <img class="testi-img" src="{{ asset('img/testimonial/testi_4_2.png') }}"
                                        alt="img">
                                    <div class="testi-card_review">
                                        <i class="fas fa-star"></i>
                                        5.0
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testi-box-img">
                                    <img class="testi-img" src="{{ asset('img/testimonial/testi_4_3.png') }}"
                                        alt="img">
                                    <div class="testi-card_review">
                                        <i class="fas fa-star"></i>
                                        5.0
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="testi-wrap4">
                        <div class="title-area">
                            <span class="sub-title after-none">Testimonials</span>
                            <h2 class="text-white sec-title">What People Say About Our Charity</h2>
                        </div>
                        <div class="testi-slider4">
                            <div class="swiper th-slider testimonial-slider4" id="testiSlide4"
                                data-slider-options='{"loop":false,"paginationType":"progressbar","effect":"fade", "autoHeight": "true", "thumbs":{"swiper":".testi-thumb-slider4"}}'>
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="testi-card4">
                                            <p class="box-text">“Stay informed about our upcoming events and campaigns.
                                                Whether it's a fundraising gala, a charity run, or a community outreach
                                                program, there are plenty of ways to get involved and support our cause.
                                                Check our event calendar for details. We prioritize your security. Our
                                                donation process uses the latest encryption technology to protect your
                                                personal and financial information. Donate with confidence knowing.”</p>
                                            <h3 class="box-title">Emily Johnson</h3>
                                            <p class="box-desig">CEO, Founder</p>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="testi-card4">
                                            <p class="box-text">“Our donation process uses the latest encryption technology
                                                to protect your personal and financial information. Donate with confidence
                                                knowing Stay informed about our upcoming events and campaigns. Whether it's
                                                a fundraising gala, a charity run, or a community outreach program, there
                                                are plenty of ways to get involved and support our cause. Check our event
                                                calendar for details. We prioritize your security.”</p>
                                            <h3 class="box-title">Brandon Dixon</h3>
                                            <p class="box-desig">CEO, Founder</p>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="testi-card4">
                                            <p class="box-text">“Stay informed about our upcoming events and campaigns.
                                                Whether it's a fundraising gala, a charity run, or a community outreach
                                                program, there are plenty of ways to get involved and support our cause.
                                                Check our event calendar for details. We prioritize your security. Our
                                                donation process uses the latest encryption technology to protect your
                                                personal and financial information. Donate with confidence knowing.”</p>
                                            <h3 class="box-title">Alex Furnandes</h3>
                                            <p class="box-desig">CEO, Founder</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="slider-pagination"></div>
                                <div class="slider-pagination2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Event Area --}}

    <section class="overflow-hidden space">
        <div class="container">
            <div class="text-center title-area">
                <span class="sub-title">Our Events</span>
                <h2 class="sec-title">Join our latest upcoming events</h2>
            </div>
            <div class="row gy-30">
                <div class="col-12">
                    <div class="event-card2">
                        <div class="box-thumb">
                            <img src="{{ asset('img/event/event2-1.png') }}" alt="event">
                        </div>
                        <div class="box-content">
                            <div class="event-card-meta">
                                <span><i class="far fa-calendar-days"></i>24, Jun - 2025</span>
                                <span class="event-card_time"><i class="far fa-clock"></i>10:00 AM – 2.00 PM</span>
                            </div>
                            <h3 class="box-title"><a href="https://html.themehour.net/donat/demo/event-details.html">Give
                                    the blessings of your hun boa to children's</a></h3>
                            <p class="box-text">Our secure online donation platform allows you to make contributions
                                quickly and safely. Choose from various payment methods and set up one-time.exactly.</p>
                            <div class="event-content">
                                <div class="media-left">
                                    <h5 class="event-box-subtitle">Venue</h5>
                                    <p class="event-location">350 5th AveNew York, NY 118 United States</p>
                                    <a href="https://html.themehour.net/donat/demo/event-details.html"
                                        class="th-btn">Event Details<i class="fas fa-arrow-up-right ms-2"></i></a>
                                </div>
                                <div class="event-speakers">
                                    <div class="thumb">
                                        <img src="{{ asset('img/event/event-speakers.png') }}" alt="img">
                                    </div>
                                    <span class="event-speaker-text"><span>Spe</span>akers</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="event-card2">
                        <div class="box-thumb">
                            <img src="{{ asset('img/event/event2-2.png') }}" alt="event">
                        </div>
                        <div class="box-content">
                            <div class="event-card-meta">
                                <span><i class="far fa-calendar-days"></i>24, Jul - 2025</span>
                                <span class="event-card_time"><i class="far fa-clock"></i>10:00 AM – 2.00 PM</span>
                            </div>
                            <h3 class="box-title"><a
                                    href="https://html.themehour.net/donat/demo/event-details.html">Providing Access to
                                    safe water, sanitation</a></h3>
                            <p class="box-text">Our secure online donation platform allows you to make contributions
                                quickly and safely. Choose from various payment methods and set up one-time.exactly.</p>
                            <div class="event-content">
                                <div class="media-left">
                                    <h5 class="event-box-subtitle">Venue</h5>
                                    <p class="event-location">350 5th AveNew York, NY 118 United States</p>
                                    <a href="https://html.themehour.net/donat/demo/event-details.html"
                                        class="th-btn">Event Details<i class="fas fa-arrow-up-right ms-2"></i></a>
                                </div>
                                <div class="event-speakers">
                                    <div class="thumb">
                                        <img src="{{ asset('img/event/event-speakers.png') }}" alt="img">
                                    </div>
                                    <span class="event-speaker-text"><span>Spe</span>akers</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    {{-- Cta Area --}}

    <section class="" id="contact-sec">
        <div class="cta-wrap3 style2 bg-theme-dark">
            <div class="row gx-0">
                <div class="col-xl-7">
                    <div class="cta-content-wrap">
                        <div class="mb-40 text-center title-area text-xl-start">
                            <span
                                class="sub-title after-none before-none justify-content-xl-start justify-content-center">Call
                                To Action</span>
                            <h2 class="text-white sec-title">Give Your Big Hand Forever</h2>
                        </div>
                        <form action="https://html.themehour.net/donat/demo/mail.php" method="POST"
                            class="contact-form ajax-contact">
                            <div class="row">
                                <div class="form-group col-md-6 style-dark">
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Your name">
                                </div>
                                <div class="form-group col-md-6 style-dark">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email Address...">
                                </div>
                                <div class="form-group col-xxl-4 col-md-6 style-dark">
                                    <input type="number" class="form-control" name="number" id="number"
                                        placeholder="Phone Number...">
                                </div>
                                <div class="form-group col-xxl-4 col-md-6 style-dark">
                                    <input type="number" class="form-control" name="zip" id="zip"
                                        placeholder="Zip Code...">
                                </div>
                                <div class="form-group col-xxl-4 col-xl-12">
                                    <button class="th-btn style3 w-100">Get Involved Today</button>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 form-messages"></p>
                        </form>
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="contact-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d27191.32753121778!2d85.34788046263006!3d27.684205181113366!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sen!2snp!4v1766548639629!5m2!1sen!2snp"
                            allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Blog Area --}}

    <section class="space" id="blog-sec">
        <div class="container">
            <div class="text-center title-area">
                <span class="sub-title">News & Articles</span>
                <h2 class="sec-title">Our Latest News & Articles</h2>
            </div>
            <div class="slider-area">
                <div class="swiper th-slider has-shadow" id="blogSlider1"
                    data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}, "autoHeight": "true"}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="blog-card">
                                <div class="blog-img">
                                    <a href="blog-details.html">
                                        <img src="{{ asset('img/blog/blog_1_1.jpg') }}" alt="blog image">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <a href="blog.html"><i class="fas fa-calendar"></i>July 16, 2025</a>
                                        <a href="blog.html"><i class="fas fa-tags"></i>Education</a>
                                    </div>
                                    <h3 class="box-title"><a href="blog-details.html">See Your Impact: Transparent
                                            Donation Tracking</a></h3>
                                    <a href="blog-details.html" class="th-btn">Read More <i
                                            class="fas fa-arrow-up-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="blog-card">
                                <div class="blog-img">
                                    <a href="blog-details.html">
                                        <img src="{{ asset('img/blog/blog_1_2.jpg') }}" alt="blog image">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-card-shape"
                                        data-mask-src="{{ asset('img/blog/blog-card-bg-shape1-1.png') }}"></div>
                                    <div class="blog-meta">
                                        <a href="blog.html"><i class="fas fa-calendar"></i>March 24, 2025</a>
                                        <a href="blog.html"><i class="fas fa-tags"></i>Education</a>
                                    </div>
                                    <h3 class="box-title"><a href="blog-details.html">Every Contribution Counts: Make a
                                            Difference</a></h3>
                                    <a href="blog-details.html" class="th-btn">Read More <i
                                            class="fas fa-arrow-up-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="blog-card">
                                <div class="blog-img">
                                    <a href="blog-details.html">
                                        <img src="{{ asset('img/blog/blog_1_3.jpg') }}" alt="blog image">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-card-shape"
                                        data-mask-src="{{ asset('img/blog/blog-card-bg-shape1-1.png') }}"></div>
                                    <div class="blog-meta">
                                        <a href="blog.html"><i class="fas fa-calendar"></i>June 30, 2025</a>
                                        <a href="blog.html"><i class="fas fa-tags"></i>Education</a>
                                    </div>
                                    <h3 class="box-title"><a href="blog-details.html">Real Stories, Real Impact: Your
                                            Donations at Work</a></h3>
                                    <a href="blog-details.html" class="th-btn">Read More <i
                                            class="fas fa-arrow-up-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="blog-card">
                                <div class="blog-img">
                                    <a href="blog-details.html">

                                        <img src="{{ asset('img/blog/blog_1_1.jpg') }}" alt="blog image">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-card-shape"
                                        data-mask-src="{{ asset('img/blog/blog-card-bg-shape1-1.png') }}"></div>
                                    <div class="blog-meta">
                                        <a href="blog.html"><i class="fas fa-calendar"></i>July 16, 2025</a>
                                        <a href="blog.html"><i class="fas fa-tags"></i>Education</a>
                                    </div>
                                    <h3 class="box-title"><a href="blog-details.html">See Your Impact: Transparent
                                            Donation Tracking</a></h3>
                                    <a href="blog-details.html" class="th-btn">Read More <i
                                            class="fas fa-arrow-up-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="blog-card">
                                <div class="blog-img">
                                    <a href="blog-details.html">

                                        <img src="{{ asset('img/blog/blog_1_2.jpg') }}" alt="blog image">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-card-shape"
                                        data-mask-src="{{ asset('img/blog/blog-card-bg-shape1-1.png') }}"></div>
                                    <div class="blog-meta">
                                        <a href="blog.html"><i class="fas fa-calendar"></i>March 24, 2025</a>
                                        <a href="blog.html"><i class="fas fa-tags"></i>Education</a>
                                    </div>
                                    <h3 class="box-title"><a href="blog-details.html">Every Contribution Counts: Make a
                                            Difference</a></h3>
                                    <a href="blog-details.html" class="th-btn">Read More <i
                                            class="fas fa-arrow-up-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="blog-card">
                                <div class="blog-img">
                                    <a href="blog-details.html">

                                        <img src="{{ asset('img/blog/blog_1_3.jpg') }}" alt="blog image">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-card-shape"
                                        data-mask-src="{{ asset('img/blog/blog-card-bg-shape1-1.png') }}"></div>
                                    <div class="blog-meta">
                                        <a href="blog.html"><i class="fas fa-calendar"></i>June 30, 2025</a>
                                        <a href="blog.html"><i class="fas fa-tags"></i>Education</a>
                                    </div>
                                    <h3 class="box-title"><a href="blog-details.html">Real Stories, Real Impact: Your
                                            Donations at Work</a></h3>
                                    <a href="blog-details.html" class="th-btn">Read More <i
                                            class="fas fa-arrow-up-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <button data-slider-prev="#blogSlider1" class="slider-arrow slider-prev"><i
                        class="far fa-arrow-left"></i></button>
                <button data-slider-next="#blogSlider1" class="slider-arrow slider-next"><i
                        class="far fa-arrow-right"></i></button>
            </div>
        </div>
    </section>
@endsection
