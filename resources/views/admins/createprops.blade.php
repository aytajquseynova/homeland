@extends('layouts.admins')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Create Properties</h5>
                    <form method="POST" action="{{ route('admins.storeProps') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="title" id="form2Example1" class="form-control"
                                placeholder="title" />
                        </div>
                        @error('title')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="price" id="form2Example1" class="form-control"
                                placeholder="price" />
                        </div>
                        @error('price')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Property image</label>
                            <input name="image" class="form-control" type="file" id="formFile">
                        </div>
                        @error('image')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror


                        <div class="form-outline mb-4 mt-4">
                            <input type="number" name="beds" id="form2Example1" class="form-control"
                                placeholder="beds" />
                        </div>
                        @error('beds')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-outline mb-4 mt-4">
                            <input type="number" name="baths" id="form2Example1" class="form-control"
                                placeholder="baths" />
                        </div>
                        @error('baths')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-outline mb-4 mt-4">
                            <input type="number" name="sq_ft" id="form2Example1" class="form-control"
                                placeholder="SQ/FT" />
                        </div>
                        @error('sq_ft')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-outline mb-4 mt-4">
                            <input type="number" name="year_built" id="form2Example1" class="form-control"
                                placeholder="Year Build" />
                        </div>
                        @error('year_built')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-outline mb-4 mt-4">
                            <input type="number" name="price_sqft" id="form2Example1" class="form-control"
                                placeholder="Price Per SQ FT" />
                        </div>
                        @error('price_sqft')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="location" id="form2Example1" class="form-control"
                                placeholder="location" />
                        </div>
                        @error('location')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <select name="type" class="form-control mt-3 mb-4 form-select"
                            aria-label="Default select example">
                            <option selected>Select Type</option>
                            <option value="Buy">For Buy</option>
                            <option value="Rent">For Rent</option>
                            <option value="Lease">For Lease</option>
                        </select>
                        @error('type')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <select name="city" class="form-control mt-3 mb-4 form-select"
                            aria-label="Default select example">
                            <option selected>Select City</option>
                            <option value="New York">New York</option>
                            <option value="Brooklyn">Brooklyn</option>
                            <option value="London">London</option>
                            <option value="Tokyo">Tokyo</option>
                            <option value="Cairo">Cairo</option>
                        </select>
                        @error('city')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">More Info</label>
                            <textarea placeholder="More Info" name="more_info" class="form-control" id="exampleFormControlTextarea1"
                                rows="3"></textarea>
                        </div>
                        @error('more_info')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="agent_name" id="form2Example1" class="form-control"
                                placeholder="agent name" />
                        </div>
                        @error('agent_name')
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
