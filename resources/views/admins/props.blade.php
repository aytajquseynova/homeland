@extends('layouts.admins')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (\Session::has('success_gallery'))
                        <div class="alert alert-success">
                            <p>{!! \Session::get('success_gallery') !!}</p>
                        </div>
                    @endif
                    @if (\Session::has('error_gallery'))
                        <div class="alert alert-danger">
                            <p>{!! \Session::get('error_gallery') !!}</p>
                        </div>
                    @endif
                    @if (\Session::has('delete'))
                        <div class="alert alert-danger">
                            <p>{!! \Session::get('error_gallery') !!}</p>
                        </div>
                    @endif
                      @if (\Session::has('error_delete'))
                        <div class="alert alert-danger">
                            <p>{!! \Session::get('error_gallery') !!}</p>
                        </div>
                    @endif
                    <h5 class="card-title mb-4 d-inline">Properties</h5>
                    <a href="{{ route('admins.createProps') }}" class="btn btn-primary mb-4 text-center float-right ">Create
                        Properties</a>
                    <a href="{{ route('admins.createGallery') }}"
                        class="btn btn-primary mb-4 text-center float-right mr-5">Create Gallery</a>

                    <div class="table-responsive">
                        <table class="table mt-4">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">#</th>
                                    <th scope="col" width="5%">name</th>
                                    <th scope="col" width="5%">price</th>
                                    <th scope="col" width="5%">beds</th>
                                    <th scope="col" width="5%">baths</th>
                                    <th scope="col" width="5%">sq_ft</th>

                                    <th scope="col" width="5%">year_built</th>
                                    <th scope="col" width="5%"> price_sqft</th>
                                    <th scope="col" width="200px">more_info</th>
                                    <th scope="col" width="5%"> location</th>
                                    <th scope="col" width="5%">agent_name</th>
                                    <th scope="col" width="5%">type</th>
                                    <th scope="col" width="5%">city</th>
                                    <th scope="col" width="5%">delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($props as $prop)
                                    <tr>
                                        <th scope="row">{{ $prop->id }}</th>
                                        <td>{{ $prop->title }}</td>
                                        <td>{{ $prop->price }}</td>
                                        <td>{{ $prop->beds }}</td>
                                        <td>{{ $prop->baths }}</td>
                                        <td>{{ $prop->sq_ft }}</td>
                                        <td>{{ $prop->year_built }}</td>
                                        <td>{{ $prop->price_sqft }}</td>
                                        <td>{{ $prop->more_info }}</td>
                                        <td>{{ $prop->location }}</td>
                                        <td>{{ $prop->agent_name }}</td>
                                        <td>{{ $prop->type }}</td>
                                        <td>{{ $prop->city }}</td>

                                        <td>
                                            <a href="{{ route('admins.propsDelete', ['id' => $prop->id]) }}"
                                                class="btn btn-danger text-center">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
