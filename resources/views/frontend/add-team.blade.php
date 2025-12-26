@extends('frontend.master')

@section('title')
Add Team
@endsection

@section('content')

    <!--==============================
    Breadcumb
============================== -->
    <div class="breadcumb-wrapper " data-bg-src="{{asset('img/bg/breadcumb-bg.jpg')}}" data-overlay="theme">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Become A Volunteer</h1>
                <ul class="breadcumb-menu">
                    <li><a href="index.html">Home</a></li>
                    <li>Become A Volunteer</li>
                </ul>
            </div>
        </div>
    </div><!--==============================
Team Area  
==============================-->
    <section class="space">
        <div class="container">
            <div class="row gy-40 gx-80">
                <div class="col-xl-6">
                    <h2 class="title mt-n2 mb-25">Let’s join our community
                        to become a volunteer</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="page-img">
                                <img src="{{asset('img/team/add_team_1_1.png')}}" alt="team">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="page-img">
                                <img src="{{asset('img/team/add_team_1_2.png')}}" alt="team">
                            </div>
                        </div>
                    </div>
                    <h3 class="h5 mt-n2">Volunteer Requirements</h3>
                    <p class="mb-30">Discover the inspiring stories of individuals and communities transformed by our programs. Our success stories highlight the real-life impact of your donations and the resilience of those we help. These narratives showcase the power of compassion and generosity.</p>
                    <div class="checklist">
                        <ul>
                            <li><i class="fas fa-check-circle"></i>Making this first true generator simply text</li>
                            <li><i class="fas fa-check-circle"></i>Many desktop publish packages nothing</li>
                            <li><i class="fas fa-check-circle"></i>If you are going to passage</li>
                            <li><i class="fas fa-check-circle"></i>It has roots in a piece</li>
                            <li><i class="fas fa-check-circle"></i>Sed ut perspiciatis unde iste natus</li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="add-team-form">
                        <form action="https://html.themehour.net/donat/demo/mail.php" method="POST" class="contact-form ajax-contact">
                            <div class="row">
                                <div class="form-group style-border col-12">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Your Name">
                                </div>
                                <div class="form-group style-border col-12">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
                                </div>
                                <div class="form-group style-border col-12">
                                    <input type="number" class="form-control" name="number" id="number" placeholder="Phone Number">
                                </div>
                                <div class="form-group style-border col-md-6">
                                    <input type="text" class="form-control" name="address" id="address" placeholder="Address">
                                </div>
                                <div class="form-group style-border col-md-6">
                                    <select name="subject" id="subject" class="form-select">
                                        <option value="" disabled selected hidden>Occupation</option>
                                        <option value="Volunteer">Volunteer</option>
                                        <option value="Health Advisor">Health Advisor</option>
                                        <option value="Supervisor">Supervisor</option>
                                    </select>
                                </div>
                                <div class="form-group style-border col-12">
                                    <textarea name="message" id="message" cols="30" rows="3" class="form-control" placeholder="Type Your Message"></textarea>
                                </div>
                                <div class="form-btn col-12">
                                    <button class="th-btn style3">Send Request</button>
                                </div>
                            </div>
                            <p class="form-messages mb-0 mt-3"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==============================
Brand Area  
==============================-->
    <div class="space-bottom overflow-hidden brand-area-1">
        <div class="container">
            <div class="brand-wrap1 p-0 m-0 text-center">
                <h3 class="brand-wrap-title">Trusted by over <span class="text-theme2"><span class="counter-number">90</span>K+</span> companies worldwide</h3>
                <div class="swiper th-slider" id="brandSlider1" data-slider-options='{"breakpoints":{"0":{"slidesPerView":2},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"},"1400":{"slidesPerView":"5", "spaceBetween": "90"}}}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a href="blog.html" class="brand-box">
                                <img src="{{asset('img/brand/brand1-1.svg')}}" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="blog.html" class="brand-box">
                                <img src="{{asset('img/brand/brand1-2.svg')}}" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="blog.html" class="brand-box">
                                <img src="{{asset('img/brand/brand1-3.svg')}}" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="blog.html" class="brand-box">
                                <img src="{{asset('img/brand/brand1-4.svg')}}" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="blog.html" class="brand-box">
                                <img src="{{asset('img/brand/brand1-5.svg')}}" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="blog.html" class="brand-box">
                                <img src="{{asset('img/brand/brand1-1.svg')}}" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="blog.html" class="brand-box">
                                <img src="{{asset('img/brand/brand1-2.svg')}}" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="blog.html" class="brand-box">
                                <img src="{{asset('img/brand/brand1-3.svg')}}" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="blog.html" class="brand-box">
                                <img src="{{asset('img/brand/brand1-4.svg')}}" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="blog.html" class="brand-box">
                                <img src="{{asset('img/brand/brand1-5.svg')}}" alt="Brand Logo">
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection