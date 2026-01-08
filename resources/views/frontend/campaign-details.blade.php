@extends('frontend.master')
@section('title')
    Donate Details
@endsection


@section('content')
    {{-- Breadcumb --}}

    <div class="breadcumb-wrapper " data-bg-src="{{ asset('img/bg/breadcumb-bg.jpg') }}" data-overlay="theme">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Campaign Detail</h1>
                <ul class="breadcumb-menu">
                    <li><a href="index.html">Home</a></li>
                    <li>Campaign</li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Blog Area --}}

    <section class="donation-details space-top space-extra2-bottom">
        <div class="container">
            <div class="row gx-40">
                <div class="col-xxl-8 col-lg-7">
                    <div class="page-img">
                        <img src="{{ asset('uploads/campaigns/' . $campaign->image) }}" alt="Blog Image">
                        <div class="tag">{{ $campaign->category->name }}</div>

                    </div>
                    <div class="blog-content">
                        <h2 class="h3 page-title mt-n2">{{ $campaign->title }}</h2>
                        <p class="mb-35">
                            {{ $campaign->short_description }}
                        </p>
                        <div class="donation-progress-wrap mb-55">
                            <div class="media-left">
                                <div class="progress">
                                    <div class="progress-bar"
                                        style="width: {{ number_format(($campaign->raised_amount / $campaign->goal_amount) * 100, 2) }}%;">
                                        <div class="progress-value">
                                            {{ number_format(($campaign->raised_amount / $campaign->goal_amount) * 100, 2) }}%
                                        </div>
                                    </div>
                                </div>
                                <div class="donation-progress-content">
                                    <span class="donation-card_raise">Raised <span
                                            class="donation-card_raise-number">{{ $campaign->raised_amount }}</span></span>
                                    <span class="donation-card_goal">Goal <span
                                            class="donation-card_goal-number">{{ $campaign->goal_amount }}</span></span>
                                </div>
                            </div>
                            <div class="btn-wrap">
                                <a class="th-btn" href="{{ route('donate-now', $campaign->id) }}">Donate Now <i
                                        class="fas fa-arrow-up-right ms-2"></i></a>
                            </div>
                        </div>
                        <h3 class="mb-15">About The Charity</h3>
                        <p class="mb-45">
                            {{ $campaign->description }}
                        </p>
                        <h3 class="mb-15">Summary</h3>
                        <p class="mb-45">Partner with us to make a greater impact. Our corporate sponsorship program offers
                            businesses the opportunity to support our mission while gaining visibility and fulfilling
                            corporate social responsibility goals. Learn about the benefits and how your company can get
                            involved.</p>
                        <h3 class="mb-15">Challenge</h3>
                        <p class="mb-35">Explore the variety of volunteer opportunities available. From event planning and
                            fundraising to fieldwork and administrative support, there are many ways to lend your talents.
                            Find the perfect fit for your skills and interests.</p>
                        <div class="row gx-40 gy-30 align-items-center">
                            <div class="col-xl-6">
                                <div class="mb-0 page-img">
                                    <img src="{{ asset('img/donation/donation-s-1-2.png') }}" alt="Blog Image">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="checklist">
                                    <ul>
                                        <li><i class="fas fa-check"></i>From the streets to safety</li>
                                        <li><i class="fas fa-check"></i>I wish to feed the orangutansy</li>
                                        <li><i class="fas fa-check"></i>Lorem ipsum dolor sit amet, adipiscing</li>
                                        <li><i class="fas fa-check"></i>Nemo enim ipsam voluptatem quia</li>
                                        <li><i class="fas fa-check"></i>Get Involved: Upcoming Events</li>
                                        <li><i class="fas fa-check"></i>Safe and Secure Donations</li>
                                        <li><i class="fas fa-check"></i>Help Us Spread the Word</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <p class="mb-40 mt-30">Amplify our message by sharing our mission with your network. Use social
                            media, word of mouth, and community engagement to raise awareness about our work. Every share
                            brings us closer to achieving our mission and reaching more people in need. From signing
                            petitions to contacting policymakers, your advocacy can drive meaningful change and amplify our
                            impact.</p>
                    </div>

                    {{-- comments --}}
                    <div class="p-0 shadow-none th-comments-wrap mt-60">
                        <h2 class="blog-inner-title h4"><i class="far fa-comments"></i> Comments (03)</h2>
                        <ul class="comment-list">
                            <li class="th-comment-item">
                                <div class="th-post-comment">
                                    <div class="comment-avater">
                                        <img src="{{ asset('img/blog/comment-author-1.jpg') }}" alt="Comment Author">
                                    </div>
                                    <div class="comment-content">
                                        <h3 class="name">Mariya Dsuza</h3>
                                        <span class="commented-on">14 March, 2025<span class="ms-2">06:30pm</span></span>
                                        <p class="text">Provide regular updates to donors and supporters through
                                            newsletters, social media, & the charity website, detailing how funds are being
                                            used and the impact achieved.</p>
                                        <div class="reply_and_edit">
                                            <a href="blog-details.html" class="reply-btn"><i
                                                    class="fas fa-reply"></i>Reply</a>
                                        </div>
                                    </div>
                                </div>
                                <ul class="children">
                                    <li class="th-comment-item">
                                        <div class="th-post-comment">
                                            <div class="comment-avater">
                                                <img src="{{ asset('img/blog/comment-author-2.jpg') }}"
                                                    alt="Comment Author">
                                            </div>
                                            <div class="comment-content">
                                                <h3 class="name">Michel Phelops</h3>
                                                <span class="commented-on">15 March, 2025<span
                                                        class="ms-2">04:30pm</span></span>
                                                <p class="text">Use metrics and feedback to assess the success of projects
                                                    and programs, and share these results with the community to demonstrate
                                                    accountability.</p>
                                                <div class="reply_and_edit">
                                                    <a href="blog-details.html" class="reply-btn"><i
                                                            class="fas fa-reply"></i>Reply</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="th-comment-item">
                                <div class="th-post-comment">
                                    <div class="comment-avater">
                                        <img src="{{ asset('img/blog/comment-author-3.jpg') }}" alt="Comment Author">
                                    </div>
                                    <div class="comment-content">
                                        <h3 class="name">Hamilton Barason</h3>
                                        <span class="commented-on">16 March, 2025<span class="ms-2">02:30pm</span></span>
                                        <p class="text">Stay updated with the latest news, events, and impact stories from
                                            our organization. Subscribe to our newsletter to receive regular updates
                                            directly in your inbox.</p>
                                        <div class="reply_and_edit">
                                            <a href="blog-details.html" class="reply-btn"><i
                                                    class="fas fa-reply"></i>Reply</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- Comment end -->
                    <!-- Comment Form -->
                    <div class="p-0 shadow-none th-comment-form mt-60">
                        <div class="form-title">
                            <h3 class="mb-2 blog-inner-title h4">Leave a Reply</h3>
                            <p class="form-text">Your email address will not be published. Required fields are marked</p>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group style-border">
                                <input type="text" placeholder="Your Name" class="form-control">
                            </div>
                            <div class="col-md-6 form-group style-border">
                                <input type="text" placeholder="Your Email" class="form-control">
                            </div>
                            <div class="col-12 form-group style-border">
                                <input type="text" placeholder="Website" class="form-control">
                            </div>
                            <div class="col-12 form-group style-border">
                                <textarea placeholder="Type Your Message" class="form-control"></textarea>
                            </div>
                            <div class="mb-0 col-12 form-group">
                                <button class="th-btn btn-fw">SUBMIT COMMENT</button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- side details --}}
                <div class="col-xxl-4 col-lg-5">
                    <aside class="sidebar-area donation-sidebar">
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
                        <div class="widget " data-bg-src="{{ asset('img/bg/gray-bg2.png') }}" data-overlay="gray"
                            data-opacity="5">
                            <div class="widget-donation-wrap">
                                <div class="donate-price">$50</div>
                                <h4 class="title">How Your Donation Makes A Difference</h4>
                                <a class="th-btn" href="donation.html">Donation $50</a>
                            </div>
                        </div>
                        <div class="widget " data-bg-src="{{ asset('img/bg/gray-bg2.png') }}" data-overlay="gray"
                            data-opacity="5">
                            <h3 class="widget_title">Recent Donors</h3>
                            <div class="recent-donate-wrap">
                                <div class="recent-post">
                                    <div class="media-img">
                                        <a href="blog-details.html"><img src="{{ asset('img/widget/donor_1_1.jpg') }}"
                                                alt="Blog Image"></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="post-title"><a class="text-inherit" href="blog-details.html">Oliver
                                                Jake</a></h4>
                                        <div class="recent-post-meta">
                                            <a href="blog.html">$60.00</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="recent-post">
                                    <div class="media-img">
                                        <a href="blog-details.html"><img src="{{ asset('img/widget/donor_1_2.jpg') }}"
                                                alt="Blog Image"></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="post-title"><a class="text-inherit" href="blog-details.html">Emily
                                                Susan</a></h4>
                                        <div class="recent-post-meta">
                                            <a href="blog.html">$60.00</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="recent-post">
                                    <div class="media-img">
                                        <a href="blog-details.html"><img src="{{ asset('img/widget/donor_1_3.jpg') }}"
                                                alt="Blog Image"></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="post-title"><a class="text-inherit" href="blog-details.html">Harry
                                                Callum</a></h4>
                                        <div class="recent-post-meta">
                                            <a href="blog.html">$60.00</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="recent-post">
                                    <div class="media-img">
                                        <a href="blog-details.html"><img src="{{ asset('img/widget/donor_1_4.jpg') }}"
                                                alt="Blog Image"></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="post-title"><a class="text-inherit" href="blog-details.html">Charlie
                                                Kyle</a></h4>
                                        <div class="recent-post-meta">
                                            <a href="blog.html">$60.00</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="recent-post">
                                    <div class="media-img">
                                        <a href="blog-details.html"><img src="{{ asset('img/widget/donor_1_5.jpg') }}"
                                                alt="Blog Image"></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="post-title"><a class="text-inherit" href="blog-details.html">Jessica
                                                Lauren</a></h4>
                                        <div class="recent-post-meta">
                                            <a href="blog.html">$60.00</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection
