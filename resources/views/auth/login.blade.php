@extends('layouts.app')

@section('content')
    <div class="site-blocks-cover overlay" style="background-image: url({{ asset('assets/images/hero_bg_1.jpg') }});"
        data-aos="fade" >
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    <h1 class="mb-2">LOG IN</h1>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="card-header">{{ __('Login') }}</div> --}}

                <div class="col-md-12 " data-aos="fade-up" data-aos-delay="100">
                    <h3 class="h4 text-black widget-title mb-3">Login</h3>
                    <form method="POST" action="{{ route('login') }}" class="form-contact-agent">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" id="phone" name="submit" class="btn btn-primary" value="Login">
                        </div>
                    </form>
    </div>
@endsection
