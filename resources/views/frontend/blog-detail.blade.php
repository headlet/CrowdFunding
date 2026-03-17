@extends('frontend.master')

@section('title')
    Blog Details
@endsection

@section('content')
    <!--==============================
                    Breadcumb
                ============================== -->
    <div class="breadcumb-wrapper " data-bg-src="{{ asset('img/bg/breadcumb-bg.jpg') }}" data-overlay="theme">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Blog Details</h1>
                <ul class="breadcumb-menu">
                    <li><a href="index.html">Home</a></li>
                    <li>Blog Details</li>
                </ul>
            </div>
        </div>
    </div><!--==============================
                    Blog Area
                ==============================-->
    <section class="th-blog-wrapper blog-details space-top space-extra2-bottom">
        <div class="container">
            <div class="row gx-40">
                <div class="col-xxl-8 col-lg-7">
                    <div class="th-blog blog-single">
                        <div class="blog-img">
                            <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image"
                                style="width: 100%; height: 460px; object-fit: cover; border-radius: 20px;">
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="blog.html"><i class="fas fa-calendar-days"></i>{{ $blog->published_at }}</a>
                                <a href="blog.html"><i class="fas fa-tags"></i>{{ $blog->blogCategory->name }}</a>
                                <a href="blog.html"><i class="fas fa-comments"></i>Comments (03)</a>
                            </div>
                            <h2 class="blog-title">{{ $blog->title }}</h2>
                            <blockquote class="bg-white">
                                <p>{{ $blog->excerpt }}</p>
                                <cite></cite>
                            </blockquote>
                            <p>{!! $blog->content !!}</p>
                            <div class="share-links clearfix ">
                                <div class="row justify-content-between">
                                    <div class="col-md-auto">
                                        <span class="share-links-title">Tags:</span>
                                        <div class="tagcloud">
                                            <a href="blog.html">Donations</a>
                                            <a href="blog.html">{{ $blog->blogCategory->name }}</a>
                                        </div>
                                    </div>
                                    <div class="col-md-auto text-xl-end">
                                        <span class="share-links-title">Share:</span>
                                        <div class="th-social align-items-center">
                                            <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                            <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
                                            <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                                            <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                        </div>
                                    </div><!-- Share Links Area end -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="th-comments-wrap ">
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
                    </div> <!-- Comment end --> <!-- Comment Form -->
                    <div class="th-comment-form ">
                        <div class="form-title">
                            <h3 class="blog-inner-title h4 mb-2">Leave a Reply</h3>
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
                            <div class="col-12 form-group mb-0">
                                <button class="th-btn btn-fw">SUBMIT COMMENT</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-lg-5">
                    <aside class="sidebar-area">
                        <div class="widget widget_search  ">
                            <form class="search-form">
                                <input type="text" placeholder="Enter Keyword">
                                <button type="submit"><i class="far fa-search"></i></button>
                            </form>
                        </div>
                        <div class="widget widget_categories  ">
                            <h3 class="widget_title">Category</h3>
                            <ul>
                                @foreach ($blogs->pluck('blogCategory')->unique('id') as $category)
                                    <li>
                                        <a href="blog.html">{{ $category->name }}</a>
                                        <span><i class="fas fa-arrow-right"></i></span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget  ">
                            <h3 class="widget_title">Recent Posts</h3>
                            <div class="recent-post-wrap">
                                <div class="recent-post">
                                    <div class="media-img">
                                        <a href="blog-details.html"><img
                                                src="{{ asset('img/blog/recent-post-1-1.jpg') }}" alt="Blog Image"></a>
                                    </div>
                                    <div class="media-body">
                                        <div class="recent-post-meta">
                                            <a href="blog.html"><i class="fas fa-calendar-days"></i>21 June, 2025</a>
                                        </div>
                                        <h4 class="post-title"><a class="text-inherit" href="blog-details.html">Charity
                                                Of The Month Golden Futures…</a></h4>
                                    </div>
                                </div>
                                <div class="recent-post">
                                    <div class="media-img">
                                        <a href="blog-details.html"><img
                                                src="{{ asset('img/blog/recent-post-1-2.jpg') }}" alt="Blog Image"></a>
                                    </div>
                                    <div class="media-body">
                                        <div class="recent-post-meta">
                                            <a href="blog.html"><i class="fas fa-calendar-days"></i>22 June, 2025</a>
                                        </div>
                                        <h4 class="post-title"><a class="text-inherit" href="blog-details.html">Partner
                                                for Good Corporate Sponsor</a></h4>
                                    </div>
                                </div>
                                <div class="recent-post">
                                    <div class="media-img">
                                        <a href="blog-details.html"><img
                                                src="{{ asset('img/blog/recent-post-1-3.jpg') }}" alt="Blog Image"></a>
                                    </div>
                                    <div class="media-body">
                                        <div class="recent-post-meta">
                                            <a href="blog.html"><i class="fas fa-calendar-days"></i>23 June, 2025</a>
                                        </div>
                                        <h4 class="post-title"><a class="text-inherit" href="blog-details.html">Every
                                                Contribution Counts Difference</a></h4>
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
