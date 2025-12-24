@extends('frontend.master')

@section('title')
Team Detail
@endsection

@section('content')

    <!--==============================
    Breadcumb
============================== -->
    <div class="breadcumb-wrapper " data-bg-src="assets/img/bg/breadcumb-bg.jpg" data-overlay="theme">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Volunteer Details</h1>
                <ul class="breadcumb-menu">
                    <li><a href="index.html">Home</a></li>
                    <li>Volunteer Details</li>
                </ul>
            </div>
        </div>
    </div><!--==============================
Team Area  
==============================-->
    <section class="space">
        <div class="container">
            <div class="team-details-wrap mb-80">
                <div class="row gx-60 gy-40">
                    <div class="col-xl-5">
                        <div class="about-card-img">
                            <img src="assets/img/team/team_inner_1.png" alt="team image">
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <div class="about-card">
                            <div class="about-card-title-wrap">
                                <div class="media-left">
                                    <h2 class="h3 about-card_title mt-n2">Michel Connor</h2>
                                    <p class="about-card_desig">Volunteer</p>
                                </div>
                                <div class="th-social style4">
                                    <a target="_blank" href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                    <a target="_blank" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                                    <a target="_blank" href="https://instagram.com/"><i class="fab fa-instagram"></i></a>
                                    <a target="_blank" href="https://behance.com/"><i class="fab fa-behance"></i></a>
                                </div>
                            </div>

                            <p class="about-card_text">Stay updated with the latest news, events, and impact stories from our organization. Subscribe to our newsletter to receive regular updates directly in your inbox. Be the first to know about new initiatives and how you can help.</p>
                            <div class="team-details-about-info">
                                <div class="about-contact">
                                    <div class="icon">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="media-left">
                                        <h6 class="about-contact-title">Experience</h6>
                                        <p class="about-contact-text">More Than 10 Years</p>
                                    </div>
                                </div>
                                <div class="about-contact">
                                    <div class="icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div class="media-left">
                                        <h6 class="about-contact-title">Email Address</h6>
                                        <a href="mailto:michel589@gmail.com" class="about-contact-text">michel589@gmail.com</a>
                                    </div>
                                </div>
                                <div class="about-contact">
                                    <div class="icon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <div class="media-left">
                                        <h6 class="about-contact-title">Phone Number</h6>
                                        <a href="tel:2565862169581" class="about-contact-text">+(256) 58621-69581</a>
                                    </div>
                                </div>
                                <div class="about-contact">
                                    <div class="icon">
                                        <i class="fas fa-fax"></i>
                                    </div>
                                    <div class="media-left">
                                        <h6 class="about-contact-title">Fax</h6>
                                        <a href="tel:2565862169581" class="about-contact-text">+2568145632</a>
                                    </div>
                                </div>
                            </div>
                            <a href="contact.html" class="th-btn">Contact Me <i class="fas fa-arrow-up-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gy-40">
                <div class="col-xl-6">
                    <h3 class="title mt-n2 mb-25">About Me</h3>
                    <p>Volunteers are the backbone of many charitable organizations. They bring enthusiasm, skills, and time, which are crucial for driving the mission forward. Volunteers help in various capacities, from organizing events to directly assisting those in need, making them an indispensable part of the charity ecosystem. Activities may include tutoring, mentoring, serving meals, distributing supplies, or offering companionship to those in need.</p>
                    <p class="mb-n1 mt-25">Volunteering offers opportunities to develop new skills and gain valuable experience. This can include leadership, communication, project management, and teamwork skills.</p>
                </div>
                <div class="col-xl-6">
                    <h3 class="title mt-n2 mb-25">Personal Skills</h3>
                    <p class="mb-30">Use your voice to support our cause. Learn about our advocacy efforts and how you can get involved. From signing petitions to contacting policymakers.</p>
                    <div class="row gy-5">
                        <div class="col-md-4">
                            <div class="circle-progressbar">
                                <div class="circular-progress" data-target="75" data-theme-color="#FFAC00">
                                    <svg viewBox="0 0 36 36">
                                        <path class="circle-bg" d="M18 2 a16 16 0 1 1 0 32 a16 16 0 1 1 0 -32" />
                                        <path class="circle" d="M18 2 a16 16 0 1 1 0 32 a16 16 0 1 1 0 -32" />
                                    </svg>
                                    <div class="circle-progressbar-content">
                                        <div class="percentage">0%</div>
                                        <h4 class="box-title">Team Building</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="circle-progressbar">
                                <div class="circular-progress" data-target="90">
                                    <svg viewBox="0 0 36 36">
                                        <path class="circle-bg" d="M18 2 a16 16 0 1 1 0 32 a16 16 0 1 1 0 -32" />
                                        <path class="circle" d="M18 2 a16 16 0 1 1 0 32 a16 16 0 1 1 0 -32" />
                                    </svg>
                                    <div class="circle-progressbar-content">
                                        <div class="percentage">0%</div>
                                        <h4 class="box-title">Donation collect</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="circle-progressbar">
                                <div class="circular-progress" data-target="80" data-theme-color="#FF5528">
                                    <svg viewBox="0 0 36 36">
                                        <path class="circle-bg" d="M18 2 a16 16 0 1 1 0 32 a16 16 0 1 1 0 -32" />
                                        <path class="circle" d="M18 2 a16 16 0 1 1 0 32 a16 16 0 1 1 0 -32" />
                                    </svg>
                                    <div class="circle-progressbar-content">
                                        <div class="percentage">0%</div>
                                        <h4 class="box-title">Successful Events</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                <img src="assets/img/brand/brand1-1.svg" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="blog.html" class="brand-box">
                                <img src="assets/img/brand/brand1-2.svg" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="blog.html" class="brand-box">
                                <img src="assets/img/brand/brand1-3.svg" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="blog.html" class="brand-box">
                                <img src="assets/img/brand/brand1-4.svg" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="blog.html" class="brand-box">
                                <img src="assets/img/brand/brand1-5.svg" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="blog.html" class="brand-box">
                                <img src="assets/img/brand/brand1-1.svg" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="blog.html" class="brand-box">
                                <img src="assets/img/brand/brand1-2.svg" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="blog.html" class="brand-box">
                                <img src="assets/img/brand/brand1-3.svg" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="blog.html" class="brand-box">
                                <img src="assets/img/brand/brand1-4.svg" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="blog.html" class="brand-box">
                                <img src="assets/img/brand/brand1-5.svg" alt="Brand Logo">
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection