@extends('layouts.app')
@section('content')
  
<div class="inquiry-inner-banner"><img
    src="https://edison-properties.com/dev/admin/uploads/page/buyers/1623567434DEsaz.jpg" alt="">
<div class="container h-100">
    <div class="row h-100">
        <div class="col-12">
            <div class="inner-banner__content text-center">
                <h1>Buyers</h1>
            </div>
        </div>
    </div>
</div>
</div>

<section class="ic-section-space text-section">
<div class="container">
    <div class="row justify-content-center">
        <div class=" col-sm-10">
            <div class=" desc">
                <p>Owning a piece of heaven and experiencing the upscale lifestyle delineating individualism is a
                    spectacular feeling that buyers want as they opt to accumulate funds. However, without the right
                    partner, this dream is shattered leaving a sense of void.<br><br>
                    At EPL, we cater to your every whim and make sure that you experience an unmatched lifestyle by
                    owning a state-of-the-art abode housing intricate designs and convenient facilities.</p>
            </div>
        </div>
    </div>
</div>
</section>

<section>
<div class="container-fluid">
    <div class="row">
        <div class="contact-from-left col-md-6">
            <form class="" action="{{route('user.contact')}}" method="POST" >
                @csrf
                <h3 class=" sub-title">inquiry</h3>
                <div class="inline form-group">
                    <input name="location" placeholder="Location" type="text" class="form-control" value="">
                    <select class="form-control select-here" name="size" aria-label="Default select example">
                        <option selected>Select Size</option>
                        <option value="1000sft">1000sft</option>
                        <option value="2000sft">2000sft</option>
                        <option value="3000sft">1000sft</option>
                    </select>
                </div>
                <h3 class="sub-title">contact us</h3>
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
                <img src="https://edison-properties.com/dev/admin/uploads/page/buyers/1623567434g6oZp.jpg" alt="">
            </div>
        </div>
    </div>
</div>
</section>

@endsection