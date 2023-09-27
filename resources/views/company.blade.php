@extends('layouts.app')
@section('content')
<div class="inquiry-inner-banner"><img
    src="{{asset('images/company/')}}/{{$company->image}}" alt="">
<div class="container h-100">
    <div class="row h-100">
        <div class="col-12">
            <div class="inner-banner__content text-center">
                <h3 class="sub-title">Company</h3>
                <h1>{{$company->title}}</h1>
            </div>
        </div>
    </div>
</div>
</div>

<section class="company-area">
<div class="container-fluid">
    <div class="row">
        <div class="mission-vision-right col-md-6">
            <div class="mission-vision-right__inner company-sub-title">
                <h3 class="sub-title">{{$company->content['intro_title']}}</h3>
                <div class=" texts">
                    <p>{!!$company->content['intro_description']!!}</p>
                </div>
            </div>
        </div>
        <div class="mission-vision-left p-0 col-md-6">
            <div class="mission-vision-left__img">
                <img src="{{asset('images/company/intruduction/')}}/{{$company->content['intro_image']}}"
                    alt="" loading="lazy">
            </div>
        </div>
    </div>
</div>
</section>

<section class="team-slider ic-section-space">
<div class="container">

    <div class="team-slider__inner row">
        @foreach ($company->content['gallery_title'] as $key => $title)
        <div class="col-md-4">
            <div class="team-slider-single">

                <div class="team-slider-single__inner">
                  

                        @if (isset($company->content['gallery_images'][$key]))
                        <img src="{{asset('images/company/gallery/')}}/{{$company->content['gallery_images'][$key]}}"
                        style="width: 100%;" loading="lazy">
                        @endif
                    <div class="team-slider-single__inner__content">
                        <p>{{$title}}</p>
                        @if (isset($company->content['gallery_description'][$key]))
                        <h4>{{$company->content['gallery_description'][$key]}}</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        
       
    </div>

</div>
</section>

<section>
<div class="container-fluid">
    <div class="row">
        <div class="contact-from-left col-md-6">
            <form class="">

                <h3 class="sub-title">Keep Talking</h3>

                <div class="form-group">
                    <input name="name" placeholder="Full name" type="text" class="form-control" value="">
                </div>
                <div class="form-group">
                    <input name="phone" placeholder="Phone number" type="number" class="form-control" value="">
                </div>
                <div class="form-group">
                    <input name="email" placeholder="Email address" type="email" class="form-control" value="">
                </div>
                <div class="form-group">
                    <textarea name="message" placeholder="Message" rows="1" class="form-control"></textarea>
                </div>
                <div>
                    <button class=" ic-btn" type="submit"><span>Explore</span></button>
                </div>
            </form>
        </div>
        <div class="contact-from-right p-0 col-md-6">
            <div class="contact-from-right__inner">
                <img src="https://edison-properties.com/static/media/beside-map-image.5b6f095c.jpg" alt="" loading="lazy">
            </div>
        </div>
    </div>
</div>
</section>

@endsection