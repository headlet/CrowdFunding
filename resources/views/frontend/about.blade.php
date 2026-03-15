@extends('frontend.master')
@section('title')
    About Us
@endsection


@section('content')
    <!--==============================
                                            Breadcumb
                                        ============================== -->
    <div class="breadcumb-wrapper " data-overlay="theme">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">About Us</h1>
                <ul class="breadcumb-menu">
                    <li><a href="index.html">Home</a></li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
    </div>
    <!--==============================
                                        About Area
                                        ==============================-->

    <div class="overflow-hidden space" id="about-sec">
        <div class="shape-mockup about-bg-shape1-1 jump-reverse" data-top="10%" data-right="5%">
            <img src="{{ asset('img/shape/heart-shape1.png') }}" alt="shape">
        </div>
        <div class="container">
            <div class="row gy-4 align-items-center">
                <div class="col-xl-7">
                    <div class="img-box1">
                        <div class="img1">
                            <img src="{{ asset(!empty($about->about_image) ? 'storage/' . $about->about_image : 'img/normal/about_1_1.png') }}"
                                alt="About">

                        </div>
                        <div class="about-shape1-1 jump">
                            <img src="{{ asset('img/shape/about_shape1_1.png') }}" alt="img">
                        </div>
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="about-wrap1">
                        <div class="title-area mb-30">
                            <span class="sub-title before-none">About Us Fund</span>

                            <h2 class="sec-title">{{ $about->title ?? 'Please Add title in dashboard' }}</h2>
                            <p class="">{!! $about->description ??
                                'Donet is the largest global crowdfunding community connecting nonprofits, donors, and companies in nearly every country. We help nonprofits from Afghanistan to Zimbabwe (and hundreds of places in between) access the tools, training, and support they need to be more effective and make our world a better place.' !!}</p>

                        </div>
                        {{-- <div class="checklist style2 list-two-column">
                            <ul>
                                <li>Charity For Foods</li>
                                <li data-theme-color="var(--theme-color2)">Charity For Water</li>
                                <li data-theme-color="#FF5528">Charity For Education</li>
                                <li data-theme-color="#122F2A">Charity For Medical</li>
                            </ul>
                        </div> --}}
                        <div class="btn-wrap mt-40">
                            <a href="about.html" class="th-btn">For More<i class="fas fa-arrow-up-right ms-2"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--==============================
                                        Feature Area
                                        ==============================-->
    <section class="">
        <div class="container">
            <div class="row gy-4 justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card">
                        <div class="feature-card-bg-shape">
                            <img src="{{ asset('img/shape/feature-card-bg-shape1-1.png') }}" alt="img">
                        </div>
                        <div class="box-icon">
                            <img src="{{ asset('img/icon/feature-icon1-2.svg') }}" alt="icon">
                        </div>
                        <h3 class="box-title">Donor Friendly</h3>
                        <p class="box-text">Stay updated with the latest news, events, and impact stories from our
                            organization. Subscribe to our newsletter.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card">
                        <div class="feature-card-bg-shape">
                            <img src="{{ asset('img/shape/feature-card-bg-shape1-1.png') }}" alt="img">
                        </div>
                        <div class="box-icon">
                            <img src="{{ asset('img/icon/feature-icon1-1.svg') }}" alt="icon">
                        </div>
                        <h3 class="box-title">Fundraising Trust</h3>
                        <p class="box-text">Stay updated with the latest news, events, and impact stories from our
                            organization. Subscribe to our newsletter.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card">
                        <div class="feature-card-bg-shape">
                            <img src="{{ asset('img/shape/feature-card-bg-shape1-1.png') }}" alt="img">
                        </div>
                        <div class="box-icon">
                            <img src="{{ asset('img/icon/feature-icon1-2.svg') }}" alt="icon">
                        </div>
                        <h3 class="box-title">Charity Donate</h3>
                        <p class="box-text">Stay updated with the latest news, events, and impact stories from our
                            organization. Subscribe to our newsletter.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card">
                        <div class="feature-card-bg-shape">
                            <img src="{{ asset('img/shape/feature-card-bg-shape1-1.png') }}" alt="img">
                        </div>
                        <div class="box-icon">
                            <img src="{{ asset('img/icon/feature-icon1-1.svg') }}" alt="icon">
                        </div>
                        <h3 class="box-title">Treatment Help</h3>
                        <p class="box-text">Stay updated with the latest news, events, and impact stories from our
                            organization. Subscribe to our newsletter.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--==============================
        Video Area
     ==============================-->
     @if (isset($about))
    <div class="video-area-3 space-top">
        <div class="shape-mockup video-bg-shape3-1" data-top="0" data-left="0" data-bottom="0">
            <img src="{{ asset('img/shape/video_bg_shape3_1.png') }}" alt="img">
        </div>
        <div class="shape-mockup video-bg-shape3-2" data-top="0" data-right="0" data-bottom="0">
            <img src="{{ asset('img/shape/video_bg_shape3_2.png') }}" alt="img">
        </div>
        <div class="video-thumb3-1 video-box-center">
            
                <img src="{{ asset('storage/' . $about->bg_image) }}" alt="img">
                <a href="{{ $about->video_link }}" class="play-btn style7 popup-video"><i
                        class="fa-sharp fa-solid fa-play"></i></a>
           
        </div>
    </div>
     @endif
    <!--==============================
                                        Process Area
                                        ==============================-->
    <section class="">
        <div class="shape-mockup process-shape1-1 jump-reverse d-xxl-block d-none" data-top="20%" data-left="0"><img
                src="{{ asset('img/shape/hand-bg-shape2-1.png') }}" alt="img"></div>
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title after-none before-none">Work Process</span>
                <h2 class="sec-title">Our Donating Work Process</h2>
            </div>
            <div class="row gy-40 justify-content-center">
                <div class="col-lg-4 col-md-6 process-card-wrap">
                    <div class="process-card">
                        <div class="process-card-thumb-wrap">
                            <div class="process-card-thumb">
                                <img src="{{ asset('img/process/process-card-1-1.png') }}" alt="img">
                            </div>
                            <div class="process-card-icon">
                                <img src="{{ asset('img/icon/process-icon1-1.svg') }}" alt="img">
                            </div>
                            <div class="process-card-shape">
                                <img src="{{ asset('img/process/process-card-shape2.png') }}" alt="img">
                            </div>
                        </div>
                        <div class="box-content">
                            <h3 class="box-title">Awareness & Engagement</h3>
                            <p class="box-text">To inform and engage potential donors and supporters about the
                                charity’s
                                mission and the cause it supports. Utilize various channels such as social media.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 process-card-wrap">
                    <div class="process-card">
                        <div class="process-card-thumb-wrap">
                            <div class="process-card-thumb">
                                <img src="{{ asset('img/process/process-card-1-1.png') }}" alt="img">
                            </div>
                            <div class="process-card-icon">
                                <img src="{{ asset('img/icon/process-icon1-2.svg') }}" alt="img">
                            </div>
                            <div class="process-card-shape">
                                <img src="{{ asset('img/process/process-card-shape2.png') }}" alt="img">
                            </div>
                        </div>
                        <div class="box-content">
                            <h3 class="box-title">Donation Collection</h3>
                            <p class="box-text">Set up a secure and user-friendly online donation platform that accepts
                                multiple payment methods and allows for both one-time and recurring donations.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 process-card-wrap">
                    <div class="process-card">
                        <div class="process-card-thumb-wrap">
                            <div class="process-card-thumb">
                                <img src="{{ asset('img/process/process-card-1-1.png') }}" alt="img">
                            </div>
                            <div class="process-card-icon">
                                <img src="{{ asset('img/icon/process-icon1-3.svg') }}" alt="img">
                            </div>
                            <div class="process-card-shape">
                                <img src="{{ asset('img/process/process-card-shape2.png') }}" alt="img">
                            </div>
                        </div>
                        <div class="box-content">
                            <h3 class="box-title">Impact and Accountability</h3>
                            <p class="box-text">Allocate funds to specific projects and initiatives that align with the
                                charity’s mission, ensuring that resources are used efficiently and effectively.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--==============================
                                        Team Area
                                        ==============================-->
    <section class="space" id="team-sec">
        <div class="shape-mockup team-bg-shape3-1 d-xxl-block d-none" data-top="0%" data-left="0%" data-bottom="0">
            <img src="{{ asset('img/shape/team_bg_shape3_1.png') }}" alt="img">
        </div>
        <div class="shape-mockup team-bg-shape3-2 d-xxl-block d-none" data-top="0%" data-right="0%" data-bottom="0">
            <img src="{{ asset('img/shape/team_bg_shape3_2.png') }}" alt="img">
        </div>
        <div class="shape-mockup team-bg-shape3-3 spin d-xxl-block d-none" data-top="15%" data-left="20%">
            <div class="color-masking2">
                <div class="masking-src" data-mask-src="{{ asset('img/shape/team_bg_shape3_3.png') }}"></div>
                <img src="{{ asset('img/shape/team_bg_shape3_3.png') }}" alt="img">
            </div>
        </div>
        <div class="shape-mockup team-bg-shape3-4 jump d-xxl-block d-none" data-top="18%" data-right="10%">
            <img src="{{ asset('img/shape/team_bg_shape3_4.png') }}" alt="img">
        </div>
        <div class="shape-mockup team-bg-shape3-5 spin d-xxl-block d-none" data-bottom="18%" data-left="10%">
            <img src="{{ asset('img/shape/team_bg_shape3_5.png') }}" alt="img">
        </div>
        <div class="shape-mockup team-bg-shape3-6 spin d-xxl-block d-none" data-bottom="10%" data-right="10%">
            <div class="color-masking">
                <div class="masking-src" data-mask-src="{{ asset('img/shape/team_bg_shape3_6.png') }}"></div>
                <img src="{{ asset('img/shape/team_bg_shape3_6.png') }}" alt="img">
            </div>
        </div>
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title after-none before-none"><i class="far fa-heart text-theme"></i> Our
                    Volunteer</span>
                <h2 class="sec-title">Meet The Optimistic Volunteer</h2>
            </div>
            <div class="slider-area">
                <div class="swiper th-slider has-shadow" id="teamSlider3"
                    data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"}}}'>
                    <div class="swiper-wrapper">

                        @forelse($teams as $team)
                            <!-- Single Item -->
                            <div class="swiper-slide">
                                <div class="th-team team-card3">
                                    <div class="team-img">
                                        <img src="{{ asset('storage/' . $team->image) }}" alt="Team">
                                    </div>
                                    <div class="team-card-content">
                                        <h3 class="box-title"><a href="team-details.html">{{ $team->name }}</a>
                                        </h3>
                                        <span class="team-desig">Volunteer</span>
                                        <div class="th-social style2">
                                            <a target="_blank" href="https://facebook.com/"><i
                                                    class="fab fa-facebook-f"></i></a>
                                            <a target="_blank" href="https://twitter.com/"><i
                                                    class="fab fa-twitter"></i></a>
                                            <a target="_blank" href="https://instagram.com/"><i
                                                    class="fab fa-instagram"></i></a>
                                            <a target="_blank" href="https://behance.com/"><i
                                                    class="fab fa-behance"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @empty
                            <div class="container">
                                <div class="title-area text-center">
                                    <span class="sub-title after-none before-none"></span>
                                    <h5 class="sub-title">No Volunteer......Please add it in dashboard</h5>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
