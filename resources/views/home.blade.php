@extends('layouts.app')
    @section('content')

    <!--Banner Start-->
    <div class="banner-slider">
        @foreach ($pages as $page)
        <div class="banner-slider__single-item">
            <div class="banner-slider__single-item__bg"
                style="background-image:url('{{asset('images/page/home/')}}/{{$page->image}}')"></div>
            <div class="container container-width">
                <div class="banner-slider__single-item__content">
                    <div class="banner-slider__single-item__content__inner">
                        <h4>{{$page->title_one}}</h4>
                        <h4>{{$page->title_two}}</h4>
                        <!-- <h2>{item.short_desc_2}</h2> -->
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <section class="ic-section-space overflow-hidden">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="our-project-heading">
                        <h2>SERENE ABODES WITH CONTEMPORARY SOLUTIONS</h2>
                        <p>Edison Properties specializes in the provision of exceptional residential and commercial
                            spaces. Each of our projects remarkably preserve warmth, luxury and visual refinement. By
                            committing to the deliverance of the declared finishing and quality, we have established
                            trust among our customers.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class='OurProject p-0'>
            <div class="row">
                @foreach ($projects as $data)
                <div class='col-sm-6 OurProject__single p-0 position-relative'>
                    <div class="OurProject__single__img">
                        <img src="{{asset('images/page/project/')}}/{{$data->image}}" loading="lazy" alt="" />
                    </div>
                    <div class="OurProject__single__content">
                        <div class="OurProject__single__content__inner">
                            <h2>{{$data->category->name}}</h2>
                            <p>{{$data->title}}</p>
                            <div class="on-hover">
                                <ul></ul>
                                <div class="title-link">
                                    <a href="{{route('project.details',$data->slug)}}"> <span>Explore</span> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach               
            </div>
        </div>
    </section>

    <section class="ic-section-space-bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="about-content">
                        <h4>ABOUT US</h4>
                        <h2>EPITOME OF INTEGRITY</h2>
                        <div class="description">
                            <p>Edison Properties Ltd.(EPL) is a concern of Edison group, one of the enthusiastic and
                                embryonic business groups in the country offering influential brands, and superior
                                quality products and services. As part of the group’s quick diversification plan, it
                                entered the property business in 2010 to provide optimum standard housing support.</p>
                            <p>EPL started its journey with the extensive commitment to the provision of finest quality
                                products and services, and assurance to rightfully cater the living needs of
                                individuals. With the aim to adequately solve daily housing problems and support the
                                growth of companies, it focuses on space development for both residential and commercial
                                segments.</p>
                            <a href="#" class="ic-btn">
                                <span>Explore</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="service-area  ic-section-space position-relative">
        <img src="./assets/images/section-bgjpg.jpg" loading="lazy" alt="" />
        <div class="container">
            <div class="slider-wrap">
                <div class="service-slider">
                    <div class="services-slider-single">
                        <div class="services-slider-single__inner">
                            <div class="services-slider-single__inner__content">
                                <h4>“CLEVER DESIGN CONVERTS AND CHANGES ACCORDING TO NEED.”</h4>
                                <div class="team-slider-single">
                                    <p>Amanda Talbot</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="services-slider-single">
                        <div class="services-slider-single__inner">
                            <div class="services-slider-single__inner__content">
                                <h4>“CLEVER DESIGN CONVERTS AND CHANGES ACCORDING TO NEED.”</h4>
                                <div class="team-slider-single">
                                    <p>Amanda Talbot</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="services-slider-single">
                        <div class="services-slider-single__inner">
                            <div class="services-slider-single__inner__content">
                                <h4>“CLEVER DESIGN CONVERTS AND CHANGES ACCORDING TO NEED.”</h4>
                                <div class="team-slider-single">
                                    <p>Amanda Talbot</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="services-slider-single">
                        <div class="services-slider-single__inner">
                            <div class="services-slider-single__inner__content">
                                <h4>“CLEVER DESIGN CONVERTS AND CHANGES ACCORDING TO NEED.”</h4>
                                <div class="team-slider-single">
                                    <p>Amanda Talbot</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ic-section-space testimonial-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h3 class="sub-title">Testimonials</h3>
                    <div class="testimonial-slider">
                        <div class="testimonial-single text-center">
                            <div>
                                <p>EPL is a reliable developer, working with whom has preserved our preferences and
                                    exceeded
                                    all our expectations.</p>
                            </div>
                            <div>
                                <img src="https://edison-properties.com/dev/admin/uploads/page/home-testimonial/1623050530SylkS.jpg"
                                    alt="">
                                <h4>Mr. Aslam Parvez</h4>
                                <h5>Flat Owner Edison Jahanara Garden, Banani</h5>
                            </div>
                        </div>
                        <div class="testimonial-single text-center">
                            <div>
                                <p>EPL is a reliable developer, working with whom has preserved our preferences and
                                    exceeded
                                    all our expectations.</p>
                            </div>
                            <div>
                                <img src="https://edison-properties.com/dev/admin/uploads/page/home-testimonial/1623050530SylkS.jpg"
                                    alt="">
                                <h4>Mr. Aslam Parvez</h4>
                                <h5>Flat Owner Edison Jahanara Garden, Banani</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<!-- logo end -->

