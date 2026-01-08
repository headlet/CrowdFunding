@extends('frontend.master')
@section('title')
    Donate Now
@endsection


@section('content')
    {{-- Breadcumb --}}
    <div class="breadcumb-wrapper " data-bg-src="{{ asset('img/bg/breadcumb-bg.jpg') }}" data-overlay="theme">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Donate Now</h1>
                <ul class="breadcumb-menu">
                    <li><a href="index.html">Home</a></li>
                    <li>Donation</li>
                </ul>
            </div>
        </div>
    </div>
    {{-- Blog Area --}}

    <section class="donation-details space-top space-extra2-bottom">
        <div class="container">
            <div class="row gx-40">
                <div class="col-xxl-8 col-lg-7">
                    <div class="donation-form-v1">
                        <p class="donation-form-notice"><i class="fa-solid fa-triangle-exclamation"></i><span
                                class="text-title">Notice:</span> Test mode is enabled. While in test mode no live donations
                            are processed.</p>
                        <form action="{{ route('donation.store') }}" method="POST" class="contact-form">
                            @csrf

                            <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">

                            <div class="form-group donate-input">
                                <input type="number" required class="donate_amount" name="amount" min="1"
                                    placeholder="Enter the amount">
                                <span class="icon">$</span>
                            </div>

                            <h5 class="title">Select Payment Method</h5>
                            <ul class="donate-payment-method list-unstyled">
                                <li>
                                    <input type="radio" id="test_donation" name="donate_method" value="test">
                                    <label for="test_donation">Test Donation</label>
                                </li>
                                <li>
                                    <input type="radio" id="offline_donation" name="donate_method" value="offline"
                                        checked>
                                    <label for="offline_donation">Offline Donation</label>
                                </li>
                                <li>
                                    <input type="radio" id="credit_card" name="donate_method" value="card">
                                    <label for="credit_card">Credit Card</label>
                                </li>
                            </ul>

                            <h5 class="title mb-25">Personal Info</h5>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="donor_name" required
                                        placeholder="Donor Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="phone_number"
                                        placeholder="Phone Number">
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="email" class="form-control" name="donor_email" required
                                        placeholder="Email">
                                </div>
                                <div class="form-btn col-12">
                                    <button class="th-btn" type="submit">
                                        <i class="fas fa-heart me-2"></i> Donate Now
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="col-xxl-4 col-lg-5">
                    <aside class="sidebar-area donation-sidebar">
                        <div class="widget ">
                            <div class="widget-donation-card">
                                <div class="box-content">
                                    <div class="box-thumb">
                                        <a href="blog-details.html"><img
                                                src="{{ asset('img/widget/widget-donation_card1_1.jpg') }}"
                                                alt="Blog Image"></a>
                                    </div>
                                    <h4 class="box-title"><a class="text-inherit" href="blog-details.html">Give health
                                            support for every
                                            homeless poor children</a></h4>
                                    <p class="box-text">Join our community of dedicated supporters by
                                        becoming a member.</p>
                                </div>
                                <div class="donation-progress-wrap">
                                    <div class="media-left">
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 85%;">
                                                <div class="progress-value">85%</div>
                                            </div>
                                        </div>
                                        <div class="donation-progress-content">
                                            <span class="donation-card_raise text-title">Raised<span
                                                    class="ms-1 me-1">-</span>5M</span>
                                            <span class="donation-card_goal text-theme">Goal<span
                                                    class="ms-1 me-1">-</span>$10M</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget " data-bg-src="{{ asset('img/bg/gray-bg2.png') }}" data-overlay="gray"
                            data-opacity="5">
                            <div class="author-widget-wrap">
                                <div class="author-tag">Organizer:</div>
                                <div class="avater">
                                    <img src="{{ asset('img/blog/blog-author.jpg') }}" alt="avater">
                                </div>
                                <div class="author-info">
                                    <h4 class="name"><a class="text-inherit" href="blog.html">Emanuel Marko</a></h4>
                                    <span class="meta">
                                        <a href="blog.html"><i class="fas fa-tags"></i>Education</a>
                                    </span>
                                    <span class="meta">
                                        <a href="blog.html"><i class="fas fa-map-marker-alt"></i>New Jersey, USA</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection
