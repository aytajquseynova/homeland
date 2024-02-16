@extends('layouts.admins')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Create Categories</h5>
                    <form method="POST" action="{{ route('admins.create.hometypes') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="hometypes" id="form2Example1" class="form-control"
                                placeholder="name" />
                        </div>

                        @error('hometypes')
                            <span class="text-danger" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>


                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
