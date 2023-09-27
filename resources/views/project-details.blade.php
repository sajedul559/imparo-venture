@extends('layouts.app')
@section('content')
<section class="property-inner-banner">
    <img class="banner-img"
        src="{{asset('images/page/project/')}}/{{$project->image}}" alt="">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-12">
                <div class="inner-banner__content">
                    <div class="inner-banner__content__top text-center">
                        <h1> {{$project->title}}</h1>
                        <p>{{$project->content['project_address']}}</p>
                    </div>
                    <div class="inner-banner__content__bottom">
                        <div class="box"><a href="#overview"></a>
                            <div class="box__inner"><img src="{{asset('assets/frontend/images/overview.svg')}}" alt="" loading="lazy">
                                <p>Overview</p>
                            </div>
                        </div>
                        <div class=" box"><a href="#specification"></a>
                            <div class="box__inner"><img src="{{asset('assets/frontend/images/specification.svg')}}" alt="" loading="lazy">
                                <p>Specification</p>
                            </div>
                        </div>
                        <div class=" box"><a href="#gallery"></a>
                            <div class="box__inner"><img src="{{asset('assets/frontend/images/gallery.svg')}}" alt="" loading="lazy">
                                <p>Gallery</p>
                            </div>
                        </div>
                        <div class=" box"><a href="#location"></a>
                            <div class="box__inner"><img src="{{asset('assets/frontend/images/location.svg')}}" alt="" loading="lazy">
                                <p>Location</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="overview-area ic-section-space" id="overview">
    <div class="container">
        <div class="row justify-content-center">
            <div class="text-center col-sm-10 ">
                <h3 class=" sub-title">{{$project->content['overview_text']}}</h3>
                <h2>{{$project->content['overview_title']}}</h2>
                <div class=" desc">
                    <p>{{$project->content['overview_description']}}</p>
                </div>
            </div>
        </div>
    </div>

</section>
<section class="specification-area" id="specification">
    <div class="container-fluid">
        <div class="row">
            <div class="specification-left p-0 col-md-6">
                <div class="specification-left__img">
                    <img src="{{asset('images/page/projectspecific/')}}/{{$project->content['specific_image']}}"
                        alt="" loading="lazy">
                </div>
            </div>
            <div class="anim-active fade-up specification-right col-md-6">
                <table class="table">
                    <tbody>
                        {{-- <td>{{$project->content['specification_key']}}</td> --}}
                        @foreach ($project->content['specification_key'] as $key => $data)
                            <tr>
                                <td>{{$data}}</td>
                                <td>{{$project->content['specification_value'][$key]}}</td>
                            </tr>
                       @endforeach                     
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<section class="gallery-area ic-section-space" id="gallery">
    <div class="container">
        <div class="gallery-slider">
            @foreach ($project->projectGalleries as $gallery)
            <div class="team-slider-single">
                <div class="team-slider-single__inner">
                    <img src="{{asset('images/page/projectgallery/')}}/{{$gallery->photo}}"
                        alt="" loading="lazy">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<section class="features-area ic-section-space">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-9">
                <h3 class=" sub-title">{{$project->content['feature_title']}}</h3>
                <div cclass="texts">
                    <p>{{$project->content['feature_description']}}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="features-items-area ic-section-space">
    <div class="container">
        <div class="row">
            @foreach ($project->features as $data)
            <div class="col-md-3 col-6 text-center progress-slider__single">
                <img src="{{asset('images/feature/')}}/{{$data->feature->image}}" alt="" loading="lazy">

                <p>{{$data->feature->name}}</p>
            </div>
            @endforeach
           
            
    </div>
</section>
<section class="features-area ic-section-space">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-9">
                <h3 class=" sub-title">Progress Anika Height</h3>
                <div cclass="texts">
                    <p>Anika Height is the paradigm of grandiosity, unifying all elements of comfort in one place. This
                        luxury enclave offers a grand reception area, stretcher lifts, fitness center, multipurpose
                        hall, beautiful landscaping, and many other functional facilities.</p>
                </div>
            </div>
        </div>
        <div class="ic-progress-wrapper">
            @foreach ($project->content['progress_status'] as $key => $data)
           
               
                <div class="step-item @if ($data =='completed')
                complete
                @endif @if ($data =='in_Progress')
                processing
                @endif " >
                
                    <div class="step-item__inner">
                        <div class="step-item__icon">
                            <img src="{{asset('images/page/project/progress/')}}/{{$project->content['progress_images'][$key]}}" alt="" loading="lazy">

                        </div>
                        <div class="step-item__content">
                            <h4>{{$project->content['progress_name'][$key]}}</h4>
                            <p>{{ucwords($data)}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
           
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