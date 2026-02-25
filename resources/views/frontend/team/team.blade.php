@extends('frontend.master')

@section('title')
    Teams
@endsection

@section('content')
    {{-- Breadcumb --}}

    <div class="breadcumb-wrapper " data-bg-src="{{ asset('img/bg/breadcumb-bg.jpg') }}" data-overlay="theme">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Volunteers</h1>
                <ul class="breadcumb-menu">
                    <li><a href="index.html">Home</a></li>
                    <li>Volunteers</li>
                </ul>
            </div>
        </div>
    </div>
    {{-- Team Area --}}
    <section class="space" id="team-sec">
        <div class="container">
            <div class="text-center title-area">
                <span class="sub-title after-none before-none"><i class="far fa-heart text-theme"></i> Our Volunteer</span>
                <h2 class="sec-title">Meet The Optimistic Volunteer</h2>
            </div>
            <div class="row gy-40">
                @forelse ($teams as $team)
                    <div class="col-lg-3 col-md-6">
                        <div class="th-team team-card3">
                            <div class="team-img">
                                <img src="{{ asset('storage/' .  $team->image) }}"
                                    alt="Team">
                            </div>
                            <div class="team-card-content">
                                <h3 class="box-title"><a href="team-details.html">{{ $team->name }}</a></h3>
                                <span class="team-desig">Volunteer</span>
                                <div class="th-social style2">
                                    <a target="_blank" href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                    <a target="_blank" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                                    <a target="_blank" href="https://instagram.com/"><i class="fab fa-instagram"></i></a>
                                    <a target="_blank" href="https://behance.com/"><i class="fab fa-behance"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </section>
@endsection
