@extends('frontend.master')
@section('title')
    Gallery
@endsection

@section('content')
    <!--==============================
                    Breadcumb
                ============================== -->
    <div class="breadcumb-wrapper " data-bg-src="{{ asset('img/bg/breadcumb-bg.jpg') }}" data-overlay="theme">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Gallery</h1>
                <ul class="breadcumb-menu">
                    <li><a href="index.html">Home</a></li>
                    <li>Gallery</li>
                </ul>
            </div>
        </div>
    </div><!--==============================
                Gallery Area
                ==============================-->
    <div class="overflow-hidden space">
        <div class="container">
            <div class="row gy-30 gx-30 filter-active">
                @forelse ($gallerys as $gallery)
                    <div class="col-md-6 col-xxl-auto col-lg-4 filter-item">

                        <div class="gallery-card">
                            <div class="gallery-img">
                                <img src="{{ asset('storage/' . $gallery->image) }}" alt="gallery image">
                                <a href="{{ asset('storage/' . $gallery->image) }}" class="icon-btn popup-image"><i
                                        class="fas fa-eye"></i></a>
                            </div>
                        </div>

                    </div>
                @empty
                 <div class="container">
                            <div class="title-area text-center">
                                <span class="sub-title after-none before-none"></span>
                                <h5 class="sub-title">No picture in gallery......Please add it in dashboard</h5>
                            </div>
                         </div>
                @endforelse
            </div>
        </div>
    </div>

@endsection
