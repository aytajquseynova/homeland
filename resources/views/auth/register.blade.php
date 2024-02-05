@extends('layouts.app')

@section('content')

        <div class="site-blocks-cover overlay" style="background-image: url({{ asset('assets/images/hero_bg_2.jpg') }});"
        data-aos="fade" >
            <div class="container">
                <div class="row align-items-center justify-content-center text-center">
                    <div class="col-md-10">
                        <h1 class="mb-2">REGISTER</h1>
                    </div>
                </div>
            </div>
        </div>
        {{-- Register form --}}
                    <div class="col-md-12 " data-aos="fade-up" data-aos-delay="100">
                        <h3 class="h4 text-black widget-title mb-3">Register</h3>
                        <form method="POST" action="{{ route('register') }}" class="form-contact-agent">
                            @csrf
                            <div class="form-group">
                                <label for="name">Username</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">
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
                                    autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input id="password_confirmation" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <div class="form-group">
                                <input type="submit" id="phone" name="submit" class="btn btn-primary"
                                    value="Register">
                            </div>
                        </form>
                    </div>

@endsection
