@extends('layouts.app')
@section('content')
<div class="inquiry-inner-banner"><img
    src="https://edison-properties.com/dev/admin/uploads/page/contact/1632636608dwPvH.jpg" alt="" loading="lazy">
<div class="container h-100">
    <div class="row h-100">
        <div class="col-12">
            <div class="inner-banner__content text-center">
                <h3 class="sub-title">contact us</h3>
                <h1>get in touch</h1>
            </div>
        </div>
    </div>
</div>
</div>



<section>
<div class="container-fluid">
    <div class="row">
        <div class="contact-from-left col-md-6">
            <form class="" action="{{route('user.contact')}}" method="POST" >
                @csrf

                <h3 class="sub-title">contact us</h3>
                <div class="form-group">
                    <select class="form-control select-here" name="type" aria-label="Default select example">
                        <option selected>Select Type</option>
                        <option value="1000sft">Landowners</option>
                        <option value="2000sft">Buyers</option>
                        <option value="3000sft">Design consultancy</option>
                    </select>
                </div>
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
