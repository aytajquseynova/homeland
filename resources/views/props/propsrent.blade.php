@extends('layouts.app')
@section('content')
    <div class="site-blocks-cover inner-page-cover overlay"
        style="background-image: url({{ asset('assets/images/hero_bg_2.jpg') }});" data-aos="fade">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    <h1 class="mb-2"> Rent Properties
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section site-section-sm bg-light">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <div class="site-section-title mb-5">
                        <h2>rent</h2>
                    </div>
                </div>
            </div>

            <div class="row mb-5">

                @foreach ($propsrents as $propsrent)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="property-entry h-100">
                            <a href="{{ route('single.prop', $propsrent->id) }}" class="property-thumbnail">
                                <div class="offer-type-wrap">
                             
                                    <span class="offer-type bg-success">{{ $propsrent->type }}</span>
                                </div>
                                <img src="{{ asset('assets/images/' . $propsrent->image . '') }}" alt="Image"
                                    class="img-fluid">
                            </a>
                            <div class="p-4 property-body">
                                <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
                                <h2 class="property-title"><a
                                        href="{{ route('single.prop', $propsrent->id) }}">{{ $propsrent->title }}</a>
                                </h2>
                                <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span>
                                    {{ $propsrent->location }}</span>
                                <strong
                                    class="property-price text-primary mb-3 d-block text-success">${{ $propsrent->price }}</strong>
                                <ul class="property-specs-wrap mb-3 mb-lg-0">
                                    <li>
                                        <span class="property-specs">Beds</span>
                                        <span class="property-specs-number">{{ $propsrent->beds }}<sup>+</sup></span>

                                    </li>
                                    <li>
                                        <span class="property-specs">Baths</span>
                                        <span class="property-specs-number">{{ $propsrent->baths }}</span>

                                    </li>
                                    <li>
                                        <span class="property-specs">SQ FT</span>
                                        <span class="property-specs-number">{{ $propsrent->sq_ft }}</span>

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
