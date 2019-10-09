@extends('layouts.profile.app')

@section('title')

@endsection

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
        <div class="row d-flex">
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
{{--                            {!! $portofolio->description !!}--}}
                            <div>
                                <a href="{{ Voyager::image($portofolio->image) }}" data-lightbox="portfolio" data-title="{{ $portofolio->name }}" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
                                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- #portfolio -->
@endsection
