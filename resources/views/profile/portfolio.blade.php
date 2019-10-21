@extends('layouts.profile.app')

@section('title')
    Our Portfolios
@endsection

@push('head-tag')
    <link rel="stylesheet" href="{{ asset('profile/css/portfolio.css') }}"/>
@endpush

@section('content')
<!--==========================
Portfolio Section
============================-->
<section class="clearfix bg-smadia-blue page-header first-section">
    <div class="container d-flex h-100">
        <div class="row">
            <div class="col-md-12 text-white">
                <h1 class="font-weight-light font-size-48">Our <span class="font-weight-medium">Portfolio</span></h1>
                <p class="m-0 font-size-18">Enjoy some great ideas which has been turned into a great application with our commitment.</p>
            </div>
        </div>
    </div>
</section>

<section id="portfolio">
    <div class="container">

        @foreach ($portofolios as $portofolio)
        @if($loop->odd)

        <div class="row mt-7 d-flex">
            <div class="col-lg-7 col-md-7">
                <div class="portfolio-img left">
                    <img src="{{ Voyager::image($portofolio->image) }}">
                </div>
            </div>
            
            <div class="col-lg-5 col-md-5">
                <h2 class="font-weight-medium">{{ $portofolio->name }}</h2>
                <div class="font-size-18">
                    {!! $portofolio->description !!}
                </div>
            </div>
        </div>

        @else

        <div class="row mt-7 d-flex">
            <div class="col-lg-5 col-md-6 text-right order-sm-1">
                <h2 class="font-weight-medium">{{ $portofolio->name }}</h2>
                <div class="font-size-18">
                    {!! $portofolio->description !!}
                </div>
            </div>

            <div class="col-lg-7 col-md-6 order-sm-2">
                <div class="portfolio-img right">
                    <img src="{{ Voyager::image($portofolio->image) }}">
                </div>
            </div>
        </div>

        @endif
        @endforeach

        {{-- <div class="row d-flex">
            <div class="col-lg-12">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    @foreach($services as $service)
                        <li data-filter=".filter-{{ explode(' ', $service->name)[0] }}" class="">{{ explode(' ', $service->name)[0] }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row portfolio-container" style="position: relative; height: 1081.05px;">
            @foreach($portofolios as $portofolio)
                <div class="col-lg-4 col-md-6 portfolio-item @foreach($portofolio->services()->get() as $service) filter-{{ explode(' ', $service->name)[0] }} @endforeach" style="position: absolute; left: 0px; top: 0px;">
                    <div class="portfolio-wrap">
                        <img src="{{ Voyager::image($portofolio->image) }}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4><a href="#">{{ $portofolio->name }}</a></h4>
                            <div>
                                <a href="{{ Voyager::image($portofolio->image) }}" data-lightbox="portfolio" data-title="{{ $portofolio->name }}" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
                                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div> --}}
    </div>
</section>

<section id="call-to-action" class="wow fadeInUp">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 text-center text-lg-left">
                <h3 class="cta-title">{{ setting('site.tagline') }}</h3>
                {!! setting('site.tagline_desc') !!}
            </div>
            <div class="col-lg-3 cta-btn-container text-center">
            </div>
        </div>
    </div>
</section>
<!-- #portfolio -->
@endsection
