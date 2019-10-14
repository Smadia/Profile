@extends('layouts.profile.app')

@section('title')

@endsection

@section('content')
<!--==========================
Intro Section
============================-->
<section id="intro" class="clearfix">
    <div class="container d-flex h-100">
        <div class="row justify-content-center align-self-center">
            <div class="col-md-6 intro-info order-md-first order-last">
                <h2 class="font-weight-light mb-1 text-color-black">The New Standard <br>For Building <span class="text-color-smadia-blue">A Great Idea.</span></h2>
                <p class="mt-4">Through the capabilities we have and the amazing ideas you created, let's collaborate to realize your dreams with technology</p>
                <div class="mt-5">
                    <a href="#about" class="btn-get-started scrollto">Get Started</a>
                </div>
            </div>

            <div class="col-md-6 intro-img order-md-last order-first">
                <img src="img/Aset/4.png" alt="" class="img-fluid">
            </div>
        </div>

    </div>
</section>
<!-- #intro -->

<main id="main">

    <!--==========================
    About Us Section
    ============================-->
    <section id="about">

        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-6">
                    <!-- <div class="about-img"> -->
                        <img src="img/Aset/3.png" width="90%">
                    <!-- </div> -->
                </div>

                <div class="col-lg-6 col-md-6">
                    <!-- <div class="about-content"> -->
                        <h2 class="font-weight-medium">About Us</h2>
                        {!! setting('site.about_us') !!}
                    <!-- </div> -->
                </div>
            </div>
        </div>

    </section>
    <!-- #about -->

    <!--==========================
    Services Section
    ============================-->
    <section id="services" class="bg-smadia-blue">
        <div class="container">
            <header class="section-header">
                <h3 class="text-white">Services</h3>
                <p class="font-size-18 text-white-tr-7">We will readily assist in the various types of technology needed</p>
            </header>
            <div class="row">
                @foreach($services as $service)
                    <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1.4s">
                        <div class="box">
                            {!! $service->image !!}
                            <h4 class="title">{{ $service->name }}</h4>
                            <p class="description">{{ $service->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- #services -->

    <!--==========================
    Why Us Section
    ============================-->
    <!-- <section id="why-us" class="wow fadeIn">
        <div class="container">

            <header class="section-header">
                <h3>Why choose us?</h3>
                <p>Laudem latine persequeris id sed, ex fabulas delectus quo. No vel partiendo abhorreant vituperatoribus.</p>
            </header>

            <div class="row">

                <div class="col-lg-6">
                    <div class="why-us-img">
                        <img src="img/Aset/6.png" alt="" class="img-fluid">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="why-us-content">

                        <div class="features wow bounceInUp clearfix">
                            <i class="fa fa-diamond" style="color: #f058dc;"></i>
                            <h4>Corporis dolorem</h4>
                            <p>Commodi quia voluptatum. Est cupiditate voluptas quaerat officiis ex alias dignissimos et ipsum. Soluta at enim modi ut incidunt dolor et.</p>
                        </div>

                        <div class="features wow bounceInUp clearfix">
                            <i class="fa fa-object-group" style="color: #ffb774;"></i>
                            <h4>Eum ut aspernatur</h4>
                            <p>Molestias eius rerum iusto voluptas et ab cupiditate aut enim. Assumenda animi occaecati. Quo dolore fuga quasi autem aliquid ipsum odit. Perferendis doloremque iure nulla aut.</p>
                        </div>

                        <div class="features wow bounceInUp clearfix">
                            <i class="fa fa-language" style="color: #589af1;"></i>
                            <h4>Voluptates dolores</h4>
                            <p>Voluptates nihil et quis omnis et eaque omnis sint aut. Ducimus dolorum aspernatur. Totam dolores ut enim ullam voluptas distinctio aut.</p>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section> -->

    <!--==========================
    Call To Action Section
    ============================-->
    <section id="call-to-action" class="wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 text-center text-lg-left">
                    <h3 class="cta-title">{{ setting('site.tagline') }}</h3>
                    {!! setting('site.tagline_desc') !!}
                </div>
                <div class="col-lg-3 cta-btn-container text-center">
                    <a class="cta-btn align-middle" href="#">Contact Us Now</a>
                </div>
            </div>
        </div>
    </section>
    <!-- #call-to-action -->

    <!--==========================
    Features Section
    ============================-->
    <!-- <section id="features">
        <div class="container">

            <div class="row feature-item">
                <div class="col-lg-6 wow fadeInUp">
                    <img src="img/Aset/1.png" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 wow fadeInUp pt-5 pt-lg-0">
                    <h4>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h4>
                    <p>
                        Ipsum in aspernatur ut possimus sint. Quia omnis est occaecati possimus ea. Quas molestiae perspiciatis occaecati qui rerum. Deleniti quod porro sed quisquam saepe. Numquam mollitia recusandae non ad at et a.
                    </p>
                    <p>
                        Ad vitae recusandae odit possimus. Quaerat cum ipsum corrupti. Odit qui asperiores ea corporis deserunt veritatis quidem expedita perferendis. Qui rerum eligendi ex doloribus quia sit. Porro rerum eum eum.
                    </p>
                </div>
            </div>

        </div>
    </section> -->
    <!-- #about -->

    <!--==========================
    Clients Section
    ============================-->
    <!-- <section id="testimonials">
        <div class="container">

            <header class="section-header">
                <h3>Testimonials</h3>
            </header>

            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <div class="owl-carousel testimonials-carousel wow fadeInUp">

                        <div class="testimonial-item">
                            <img src="img/testimonial-1.jpg" class="testimonial-img" alt="">
                            <h3>Saul Goodman</h3>
                            <h4>Ceo &amp; Founder</h4>
                            <p>
                                Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                            </p>
                        </div>

                        <div class="testimonial-item">
                            <img src="img/testimonial-2.jpg" class="testimonial-img" alt="">
                            <h3>Sara Wilsson</h3>
                            <h4>Designer</h4>
                            <p>
                                Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                            </p>
                        </div>

                        <div class="testimonial-item">
                            <img src="img/testimonial-3.jpg" class="testimonial-img" alt="">
                            <h3>Jena Karlis</h3>
                            <h4>Store Owner</h4>
                            <p>
                                Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                            </p>
                        </div>

                        <div class="testimonial-item">
                            <img src="img/testimonial-4.jpg" class="testimonial-img" alt="">
                            <h3>Matt Brandon</h3>
                            <h4>Freelancer</h4>
                            <p>
                                Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                            </p>
                        </div>

                    </div>

                </div>
            </div>


        </div>
    </section> -->
    <!-- #testimonials -->

    <!--==========================
    Team Section
    ============================-->
    <section id="team" class="section-bg">
        <div class="container">
            <div class="section-header">
                <h3>Team</h3>
                <p class="font-size-18">Meet our great team</p>
            </div>
            <div class="row">
                @foreach($team as $person)
                    <div class="col-lg-3 col-md-6 wow fadeInUp">
                        <div class="member">
                            <img src="{{ Voyager::image($person->avatar) }}" class="img-fluid" alt="">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4>{{ $person->name }}</h4>
                                    <span>{{ $person->roles()->first()->name }}</span>
                                    <div class="social">
                                        <a href="mailto: {{ $person->email }}">{{ $person->email }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- #team -->

    <!--==========================
    Clients Section
    ============================-->
    <section id="clients" class="wow fadeInUp">
        <div class="container">

            <header class="section-header">
                <h3>Our Clients</h3>
            </header>

            <div class="row justify-content-center">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    @foreach ($clients->chunk(4) as $clients_row)
                        <div class="row justify-content-center">
                        @foreach($clients_row as $client)
                            <div class="col-md-3 d-flex justify-content-center align-items-center">
                                <div>
                                    <img style="width: auto;max-height: 150px;" class="mr-3" src="{{ Voyager::image($client->image) }}" alt="{{ $client->name }}">
                                </div>
                            </div>
                        @endforeach
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>
    <!-- #clients -->
</main>
@endsection
