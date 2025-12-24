<div class="popup-search-box d-none d-lg-block">
    <button class="searchClose"><i class="far fa-times"></i></button>
    <form action="home-4.html#">
        <input type="text" placeholder="What are you looking for?">
        <button type="submit"><i class="fal fa-search"></i></button>
    </form>
</div>


<!--==============================
    Mobile Menu
  ============================== -->
<div class="th-menu-wrapper">
    <div class="th-menu-area text-center">
        <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
        <div class="mobile-logo">
            <a href="index.html"><img src="{{asset('img/logo.svg')}}" alt="Donat"></a>
        </div>
        <div class="th-mobile-menu">
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>

                <li><a href="{{route('about')}}">About Us</a></li>
                <li class="menu-item-has-children">
                    <a href="home-4.html#">Donations</a>
                    <ul class="sub-menu">
                        <li><a href="donation.html">Donations</a></li>
                        <li><a href="donation-details.html">Donation Details</a></li>
                        <li><a href="donate-now.html">Donate Now</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="home-4.html#">Pages</a>
                    <ul class="sub-menu">
                        <li class="menu-item-has-children">
                            <a href="home-4.html#">Shop</a>
                            <ul class="sub-menu">
                                <li><a href="shop.html">Shop</a></li>
                                <li><a href="shop-details.html">Shop Details</a></li>
                                <li><a href="cart.html">Cart Page</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="wishlist.html">Wishlist</a></li>
                            </ul>
                        </li>
                        <li><a href="team.html">Volunteers</a></li>
                        <li><a href="team-details.html">Volunteer Details</a></li>
                        <li><a href="add-team.html">Become A Volunteer</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="pricing.html">Pricing</a></li>
                        <li><a href="faq.html">FAQS</a></li>
                        <li><a href="testimonial.html">Testimonials</a></li>
                        <li><a href="error.html">Error Page</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="home-4.html#">Blog</a>
                    <ul class="sub-menu">
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li>
                    <a href="contact.html">Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="color-scheme-wrap active">
    <button class="switchIcon"><i class="fa-solid fa-palette"></i></button>
    <h3 class="color-scheme-wrap-title text-center">Color Switcher</h3>
    <h4 class="color-scheme-wrap-subtitle text-center">Theme Color</h4>
    <div class="color-switch-btns">
        <button data-color="#1A685B"><i class="fa-solid fa-droplet"></i></button>
        <button data-color="#f34e3a"><i class="fa-solid fa-droplet"></i></button>
        <button data-color="#FF4857"><i class="fa-solid fa-droplet"></i></button>
        <button data-color="#3843C1"><i class="fa-solid fa-droplet"></i></button>
        <button data-color="#FF7E02"><i class="fa-solid fa-droplet"></i></button>
    </div>
    <h4 class="color-scheme-wrap-subtitle mt-20 text-center">Secondary Color</h4>
    <div class="secondary-color-switch-btns">
        <button data-secondary-color="#FFAC00"><i class="fa-solid fa-droplet"></i></button>
        <button data-secondary-color="#F41E1E"><i class="fa-solid fa-droplet"></i></button>
        <button data-secondary-color="#f34e3a"><i class="fa-solid fa-droplet"></i></button>
        <button data-secondary-color="#FF4857"><i class="fa-solid fa-droplet"></i></button>
        <button data-secondary-color="#3843C1"><i class="fa-solid fa-droplet"></i></button>
    </div>
</div><!--==============================
	Header Area
==============================-->
<header class="th-header header-layout3">
    <div class="sticky-wrapper">
        <!-- Main Menu Area -->
        <div class="container">
            <div class="menu-area">
                <div class="header-logo">
                    <a href="index.html"><img src="{{asset('img/logo.svg')}}" alt="Donat"></a>
                </div>
                <div class="menu-area-wrap">
                    <nav class="main-menu d-none d-lg-block">
                        <ul>
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li><a href="{{route('about')}}">About Us</a></li>
                            <li>
                                <a href="{{route('donation')}}">Donations</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="home-4.html#">Pages</a>
                                <ul class="sub-menu">
                                    <li><a href="team.html">Volunteers</a></li>
                                    <li><a href="team-details.html">Volunteer Details</a></li>
                                    <li><a href="add-team.html">Become A Volunteer</a></li>
                                    <li><a href="gallery.html">Gallery</a></li>
                                    <li><a href="faq.html">FAQS</a></li>
                                    <li><a href="testimonial.html">Testimonials</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="home-4.html#">Blog</a>
                                <ul class="sub-menu">
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="contact.html">Contact Us</a>
                            </li>
                        </ul>
                    </nav>
                    <p class="header-notice"><img class="me-1" src="assets/img/icon/heart-icon.svg" alt="img">Are you ready to help them? Let’s become a volunteers...</p>
                </div>
                <div class="header-button">
                    <button type="button" class="icon-btn style2 searchBoxToggler d-lg-block d-none"><i class="far fa-search"></i></button>
                    <a href="contact.html" class="th-btn style3 d-xl-block d-none"><i class="fas fa-heart me-2"></i> Donate Now</a>
                    <button type="button" class="icon-btn th-menu-toggle d-lg-none"><i class="far fa-bars"></i></button>
                </div>
            </div>
        </div>
    </div>
</header>