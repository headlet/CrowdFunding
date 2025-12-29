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
            <a href="{{ route('index') }}"><img src="{{ asset('img/logo.svg') }}" alt="Donat"></a>
        </div>
        <div class="th-mobile-menu">
            <ul>
                <li>
                    <a href="{{ route('index') }}">Home</a>
                </li>

                <li><a href="{{ route('about') }}">About Us</a></li>
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
                        <li><a href="{{ route('team') }}">Volunteers</a></ <li><a href="{{ route('add-team') }}">Become
                                A Volunteer</a></li>
                        <li><a href="{{ route('gallery') }}">Gallery</a></li>
                        <li><a href="{{ route('faq') }}">FAQS</a></li>
                        <li><a href="{{ route('testimonial') }}">Testimonials</a></li>

                    </ul>
                </li>
                <li>
                    <a href="{{ route('blog') }}">Blog</a>
                </li>
                <li>
                    <a href="{{ route('contact') }}">Contact Us</a>
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
                    <a href="{{ route('index') }}"><img src="{{ asset('img/logo.svg') }}" alt="Donat"></a>
                </div>
                <div class="menu-area-wrap">
                    <nav class="main-menu d-none d-lg-block">
                        <ul>
                            <li>
                                <a href="{{ route('index') }}">Home</a>
                            </li>
                            <li><a href="{{ route('about') }}">About Us</a></li>
                            <li>
                                <a href="{{ route('donation') }}">Donations</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="home-4.html#">Pages</a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('team') }}">Volunteers</a></li>
                                    <li><a href="{{ route('add-team') }}">Become A Volunteer</a></li>
                                    <li><a href="{{ route('gallery') }}">Gallery</a></li>
                                    <li><a href="{{ route('faq') }}">FAQS</a></li>
                                    <li><a href="{{ route('testimonial') }}">Testimonials</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('blog') }}">Blog</a>
                            </li>
                            <li>
                                <a href="{{ route('contact') }}">Contact Us</a>
                            </li>
                        </ul>
                    </nav>
                    <p class="header-notice"><img class="me-1" src="{{ asset('img/icon/heart-icon.svg') }}"
                            alt="img">Are you ready to help them? Let’s become a volunteers...</p>
                </div>
                <div class="header-button">
                    <button type="button" class="icon-btn style2 searchBoxToggler d-lg-block d-none"><i
                            class="far fa-search"></i></button>
                    @guest
                        <a href="{{ route('login') }}" class="th-btn style3 d-xl-block d-none"><i
                                class="fas fa-sign-in me-2"></i> Login</a>
                    @endguest

                    @auth

                        <a href="{{ route('logout') }}"class="th-btn style3 d-xl-block d-none">
                            <i class="fas fa-sign-in me-2"></i>
                            Logout
                        </a>

                    @endauth
                </div>
            </div>
        </div>
    </div>
</header>
