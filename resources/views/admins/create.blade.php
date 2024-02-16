@extends('layouts.admins')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Create Admins</h5>
                    <form method="POST" action="{{route('admins.store')}}" enctype="multipart/form-data">
                        @csrf
                        <!-- Email input -->

                        <div class="form-outline mb-4 mt-4">
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="email" />
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="name" />
                        </div>
                        <div class="form-outline mb-4">
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="password" />
                        </div>
                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
