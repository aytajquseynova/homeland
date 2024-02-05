@extends('layouts.app')

@section('content')
    <div class="site-blocks-cover inner-page-cover overlay"
        style="background-image: url({{ asset('assets/images/' . $singleProp->image . '') }});" data-aos="fade">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded">Property Details
                        of</span>
                    <h1 class="mb-2">{{ $singleProp->title }}</h1>
                    <p class="mb-5"><strong class="h2 text-success font-weight-bold">${{ $singleProp->price }}</strong></p>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section site-section-sm">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div>
                        <div class="slide-one-item home-slider owl-carousel">
                            <div><img src="{{ asset('assets/images/hero_bg_1.jpg') }}" alt="Image" class="img-fluid">
                            </div>
                            <div><img src="{{ asset('assets/images/hero_bg_2.jpg') }}" alt="Image" class="img-fluid">
                            </div>
                            <div><img src="{{ asset('assets/images/hero_bg_3.jpg') }}" alt="Image" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="bg-white property-body border-bottom border-left border-right">
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <strong class="text-success h1 mb-3">${{ $singleProp->price }}</strong>
                            </div>
                            <div class="col-md-6">
                                <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
                                    <li>
                                        <span class="property-specs">Beds</span>
                                        <span class="property-specs-number">{{ $singleProp->beds }} <sup>+</sup></span>

                                    </li>
                                    <li>
                                        <span class="property-specs">Baths</span>
                                        <span class="property-specs-number">{{ $singleProp->baths }}</span>

                                    </li>
                                    <li>
                                        <span class="property-specs">SQ FT</span>
                                        <span class="property-specs-number">{{ $singleProp->sq_ft }}</span>

                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                                <span class="d-inline-block text-black mb-0 caption-text">Home Type</span>
                                <strong class="d-block">{{ $singleProp->home_type }}</strong>
                            </div>
                            <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                                <span class="d-inline-block text-black mb-0 caption-text">Year Built</span>
                                <strong class="d-block">{{ $singleProp->year_built }}</strong>
                            </div>
                            <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                                <span class="d-inline-block text-black mb-0 caption-text">Price/Sqft</span>
                                <strong class="d-block">${{ $singleProp->price_sqft }}</strong>
                            </div>
                        </div>
                        <h2 class="h4 text-black">More Info</h2>
                        <p>{{ $singleProp->more_info }}</p>
                        <div class="row no-gutters mt-5">
                            <div class="col-12">
                                <h2 class="h4 text-black mb-3">Gallery</h2>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <a href="images/img_1.jpg" class="image-popup gal-item"><img src="images/img_1.jpg"
                                        alt="Image" class="img-fluid"></a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <a href="images/img_2.jpg" class="image-popup gal-item"><img src="images/img_2.jpg"
                                        alt="Image" class="img-fluid"></a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <a href="images/img_3.jpg" class="image-popup gal-item"><img src="images/img_3.jpg"
                                        alt="Image" class="img-fluid"></a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <a href="images/img_4.jpg" class="image-popup gal-item"><img src="images/img_4.jpg"
                                        alt="Image" class="img-fluid"></a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <a href="images/img_5.jpg" class="image-popup gal-item"><img src="images/img_5.jpg"
                                        alt="Image" class="img-fluid"></a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <a href="images/img_6.jpg" class="image-popup gal-item"><img src="images/img_6.jpg"
                                        alt="Image" class="img-fluid"></a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <a href="images/img_7.jpg" class="image-popup gal-item"><img src="images/img_7.jpg"
                                        alt="Image" class="img-fluid"></a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <a href="images/img_8.jpg" class="image-popup gal-item"><img src="images/img_8.jpg"
                                        alt="Image" class="img-fluid"></a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <a href="images/img_1.jpg" class="image-popup gal-item"><img src="images/img_1.jpg"
                                        alt="Image" class="img-fluid"></a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <a href="images/img_2.jpg" class="image-popup gal-item"><img src="images/img_2.jpg"
                                        alt="Image" class="img-fluid"></a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <a href="images/img_3.jpg" class="image-popup gal-item"><img src="images/img_3.jpg"
                                        alt="Image" class="img-fluid"></a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <a href="images/img_4.jpg" class="image-popup gal-item"><img src="images/img_4.jpg"
                                        alt="Image" class="img-fluid"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">

                    <div class="bg-white widget border rounded">

                        <h3 class="h4 text-black widget-title mb-3">Contact Agent</h3>
                        <form action="" class="form-contact-agent">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" id="phone" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" id="phone" class="btn btn-primary" value="Send Message">
                            </div>
                        </form>
                    </div>

                    <div class="bg-white widget border rounded">
                        <h3 class="h4 text-black widget-title mb-3 ml-0">Share</h3>
                        <div class="px-3" style="margin-left: -15px;">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=&quote="
                                class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                            <a href="https://twitter.com/intent/tweet?text=&url=" class="pt-3 pb-3 pr-3 pl-0"><span
                                    class="icon-twitter"></span></a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url="
                                class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="site-section site-section-sm bg-light">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <div class="site-section-title mb-5">
                        <h2>Related Properties</h2>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                @foreach ($props as $prop)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="property-entry h-100">
                            <a href="property-details.html" class="property-thumbnail">
                                <div class="offer-type-wrap">
                                    <span class="offer-type bg-danger">Sale</span>
                                    <span class="offer-type bg-success">{{$prop->type}}</span>
                                </div>
                                <img src="{{asset('assets/images/img_1.jpg')}}" alt="Image" class="img-fluid">
                            </a>
                            <div class="p-4 property-body">
                                <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
                                <h2 class="property-title"><a href="property-details.html">{{$prop->title}}</a></h2>
                                <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span>
                                    {{$prop->location}}</span>
                                <strong class="property-price text-primary mb-3 d-block text-success">${{$prop->price}}</strong>
                                <ul class="property-specs-wrap mb-3 mb-lg-0">
                                    <li>
                                        <span class="property-specs">Beds</span>
                                        <span class="property-specs-number">{{$prop->beds}}<sup>+</sup></span>

                                    </li>
                                    <li>
                                        <span class="property-specs">Baths</span>
                                        <span class="property-specs-number">{{$prop->baths}}</span>

                                    </li>
                                    <li>
                                        <span class="property-specs">SQ FT</span>
                                        <span class="property-specs-number">{{$prop->sq_ft}}</span>

                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
