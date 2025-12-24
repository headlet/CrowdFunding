@extends('frontend.master')
@section('title')
Contact Us
@endsection


@section('content')
<!--==============================
    Breadcumb
============================== -->
<div class="breadcumb-wrapper " data-bg-src="assets/img/bg/breadcumb-bg.jpg" data-overlay="theme">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Contact us</h1>
            <ul class="breadcumb-menu">
                <li><a href="index.html">Home</a></li>
                <li>Contact us</li>
            </ul>
        </div>
    </div>
</div><!--==============================
Contact Area   
==============================-->
<div class="space overflow-hidden contact-area-1 position-relative z-index-common" id="contact-sec">
    <div class="container">
        <div class="contact-wrap1">
            <div class="row gx-60 gy-40">
                <div class="col-xl-4 col-lg-5">
                    <div class="contact-feature">
                        <div class="box-icon">
                            <i class="fas fa-map-location-dot"></i>
                        </div>
                        <div class="media-body">
                            <h3 class="box-title">Address</h3>
                            <p class="box-text">
                                Kathmandu, Nepal
                            </p>
                        </div>
                    </div>
                    <div class="contact-feature">
                        <div class="box-icon" data-theme-color="#FFAC00">
                            <i class="fas fa-phone-volume"></i>
                        </div>
                        <div class="media-body">
                            <h3 class="box-title">Phone</h3>
                            <p class="box-text"><a href="tel:16363599852">(+58-125) 25-3158</a></p>
                            <p class="box-text"><a href="tel:16363599852">+163-524-4521</a></p>
                        </div>
                    </div>
                    <div class="contact-feature">
                        <div class="box-icon" data-theme-color="#122F2A">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="media-body">
                            <h3 class="box-title">Email</h3>
                            <p class="box-text"><a href="mailto:info@donet.com">info@donet.com</a></p>
                            <p class="box-text"><a href="mailto:allinfo@donet.com">allinfo@donet.com</a></p>
                        </div>
                    </div>
                    <div class="contact-feature" data-theme-color="#FF5528">
                        <div class="box-icon">
                            <i class="fas fa-comment-question"></i>
                        </div>
                        <div class="media-body">
                            <h3 class="box-title">Have Questions?</h3>
                            <p class="box-text">Discover more by visiting us or joining our community</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7">
                    <div class="contact-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d27191.32753121778!2d85.34788046263006!3d27.684205181113366!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sen!2snp!4v1766548639629!5m2!1sen!2snp" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-page-form-wrap space-top">
            <div class="row gy-40">
                <div class="col-xl-6 align-self-end">
                    <div class="contact-thumb1-1">
                        <img src="assets/img/normal/contact_1_1.png" alt="img">
                    </div>
                </div>
                <div class="col-xl-6">
                    <!--==============================
Contact Area  
==============================-->
                    <div class="contact-form-v1 contact-page-form">
                        <form action="https://html.themehour.net/donat/demo/mail.php" method="POST" class="contact-form style-border ajax-contact">
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
                                <div class="form-group style-border col-12">
                                    <textarea name="message" id="message" cols="30" rows="3" class="form-control" placeholder="Type Your Message"></textarea>
                                </div>
                                <div class="form-btn col-12">
                                    <button class="th-btn">Send a Message</button>
                                </div>
                            </div>
                            <p class="form-messages mb-0 mt-3"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection