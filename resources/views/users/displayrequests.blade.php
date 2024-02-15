@extends('layouts.app')
@section('content')
    <div class="site-blocks-cover inner-page-cover overlay"
        style="background-image: url({{ asset('assets/images/hero_bg_4.jpg') }});" data-aos="fade">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    <h1 class="mb-2"> Display requests
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
                        <h2>Display all requests</h2>
                    </div>
                </div>
            </div>

            <div class="row mb-5">

                @foreach ($allRequests as $allRequest)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="property-entry h-100">
                            <a class="btn btn-success" href="{{ route('single.prop', $allRequest->prop_id) }}" class="property-thumbnail">
                                Go to this property
                            </a>

                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
