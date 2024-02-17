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

    @if (\Session::has('success'))
        <div class="alert alert-success col-md-6 mx-auto" style="padding: 5px; margin-bottom: 5px;">
            <p class="text-center">{{ session('success') }}</p>
        </div>
    @endif

    @if (\Session::has('save'))
        <div class="alert alert-success col-md-6 mx-auto" style="padding: 5px; margin-bottom: 5px;">
            <p class="text-center">{{ session('save') }}</p>
        </div>
    @endif

    <div class="site-section site-section-sm">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div>
                        <div class="slide-one-item home-slider owl-carousel">
                            @foreach ($propImages as $propImage)
                                <div><img src="{{ asset('assets/images_gallery/' . $propImage->image) }}" alt="Image"
                                        class="img-fluid">
                                </div>
                            @endforeach
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
                            @foreach ($propImages as $propImage)
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <a href="{{ asset('assets/images_gallery/' . $propImage->image) }}"
                                        class="image-popup gal-item">
                                        <img src="{{ asset('assets/images_gallery/' . $propImage->image) }}" alt="Image"
                                            class="img-fluid">
                                    </a>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">

                    <div class="bg-white widget border rounded">

                        <h3 class="h4 text-black widget-title mb-3">Contact Agent</h3>
                        @if (isset(Auth::user()->id))
                            @if ($validateFormCount > 0)
                                <p class="alert alert-success"> You already sent a request to this property</p>
                            @else
                                <form method="POST" action="{{ route('insert.request', $singleProp->id) }}"
                                    class="form-contact-agent">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">prop_id</label>
                                        <input type="text" value="{{ $singleProp->id }}" id="name" name="prop_id"
                                            type="hidden" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Agent Name</label>
                                        <input type="text" id="name" name="agent_name" type="hidden"
                                            value="{{ $singleProp->agent_name }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" id="name" name="name" class="form-control">
                                    </div>
                                    @error('name')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" class="form-control">
                                    </div>
                                    @error('email')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" id="phone" name="phone" class="form-control">
                                    </div>
                                    @error('phone')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="form-group">
                                        <input type="submit" id="phone" name="submit" class="btn btn-primary"
                                            value="Send Request">
                                    </div>
                                </form>
                            @endif
                        @else
                            <div class="form-group">
                                <a class="alert alert-success" href="{{ route('login') }}">Login </a>
                                <p class="alert alert-success mt-2">to send e request to
                                    this property</p>
                            </div>
                        @endif

                    </div>

                    <div class="bg-white widget border rounded">
                        <form method="POST" action="{{ route('save.prop', $singleProp->id) }}"
                            class="form-contact-agent">
                            @csrf
                            <h3 class="h4 text-black widget-title mb-3">Save Properties</h3>
                            @if (isset(Auth::user()->id))
                                @if ($validateSavingPropsCount > 0)
                                    <p class="alert alert-warning">
                                        You already saved properties this property
                                    </p>
                                @else
                                    <div class="form-group">
                                        <input type="hidden" value="{{ $singleProp->id }}" id="name"
                                            name="prop_id" type="hidden" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" id="title" name="title" type="hidden"
                                            value="{{ $singleProp->title }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" value="{{ $singleProp->image }}" id="name"
                                            name="image" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" value="{{ $singleProp->location }}" id="email"
                                            name="location" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" value="{{ $singleProp->price }}" id="email"
                                            name="price" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" id="phone" name="submit" class="btn btn-primary"
                                            value="Save Property">
                                    </div>
                                @endif
                            @else
                                <div class="form-group">
                                    <a class="alert alert-success" href="{{ route('login') }}">Login </a>
                                    <p class="alert alert-success mt-2">to send e request to
                                        this property</p>
                                </div>
                            @endif

                        </form>

                    </div>

                    <div class="bg-white widget border rounded">
                        <h3 class="h4 text-black widget-title mb-3 ml-0">Share</h3>
                        <div class="px-3" style="margin-left: -15px;">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ $singleProp->id }}&quote={{ $singleProp->title }}"
                                class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                            <a href="https://twitter.com/intent/tweet?text={{ $singleProp->title }}&url={{ $singleProp->id }}"
                                class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ $singleProp->id }}"
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
                @if ($relatedProps->count() > 0)
                    @foreach ($relatedProps as $relatedProp)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="property-entry h-100">
                                <a href="{{ route('single.prop', $relatedProp->id) }}" class="property-thumbnail">
                                    <div class="offer-type-wrap">
                                        <span class="offer-type bg-danger">Sale</span>
                                        <span class="offer-type bg-success">{{ $relatedProp->type }}</span>
                                    </div>
                                    <img src="{{ asset('assets/images/' . $relatedProp->image . '') }}" alt="Image"
                                        class="img-fluid">
                                </a>
                                <div class="p-4 property-body">
                                    <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
                                    <h2 class="property-title"><a
                                            href="{{ route('single.prop', $relatedProp->id) }}">{{ $relatedProp->title }}</a>
                                    </h2>
                                    <span class="property-location d-block mb-3"><span
                                            class="property-icon icon-room"></span>
                                        {{ $relatedProp->location }}</span>
                                    <strong
                                        class="property-price text-primary mb-3 d-block text-success">${{ $relatedProp->price }}</strong>
                                    <ul class="property-specs-wrap mb-3 mb-lg-0">
                                        <li>
                                            <span class="property-specs">Beds</span>
                                            <span
                                                class="property-specs-number">{{ $relatedProp->beds }}<sup>+</sup></span>

                                        </li>
                                        <li>
                                            <span class="property-specs">Baths</span>
                                            <span class="property-specs-number">{{ $relatedProp->baths }}</span>

                                        </li>
                                        <li>
                                            <span class="property-specs">SQ FT</span>
                                            <span class="property-specs-number">{{ $relatedProp->sq_ft }}</span>

                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h3 class="alert-danger col-md-6">There are not related properties for now</h3>
                @endif
            </div>
        </div>
    </div>

@endsection
