@extends('layouts.app')
@section('content')
<section class="project-banner">
    <img src="https://edison-properties.com/static/media/project-banner.885cda22.jpg" alt="" loading="lazy">
    <div class="project-banner__inner">
        <h3 class=" sub-title">projects</h3>
        <h1>{{$category->name}} </h1>
        <ul>
            <li class="" id="all"><a href="{{route('project',$category->slug)}}">all</a></li>
            <li class="" id="residential"><a href="{{ route('project.status', ['slug' => $category->slug, 'status' => 'residential']) }}">Residential</a></li>
            <li class="" id="commercial"><a href="{{ route('project.status', ['slug' => $category->slug, 'status' => 'commercial']) }}">Commercial</a></li>
        </ul>
    </div>
</section>

<section class="ic-section-space">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <div class="project-desc">
                    <p> Through sound design principles and utmost conformity to quality, each of our projects are
                        delivered with complete satisfaction to customers. With a team of professional architects,
                        engineers, licensed contractors and other support officials, we ensure sustainable, high
                        standard and visually refined development practices.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class='OurProject p-0'>
    <div class="row">
        @foreach ($projects as $data)
        <div class='col-sm-6 OurProject__single p-0 position-relative'>
            <div class="OurProject__single__img">
                <img src="{{asset('images/page/project/')}}/{{$data->image}}" alt="" loading="lazy" />
            </div>
            <div class="OurProject__single__content">
                <div class="OurProject__single__content__inner">
                    <h2>{{$data->title}}</h2>
                    <p>{{$data->content['project_address']}}</p>
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
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#residential').click(function () {
            $('#all').removeClass("active");  // Remove "active" class from the "all" element
            $('#residential').addClass("active");  // Add "active" class to the "residential" element
        });
    });
</script>