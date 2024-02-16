@extends('layouts.admins')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        @if (\Session::has('success'))
                            <div class="alert alert-success col-md-6 mx-auto" style="padding: 5px; margin-bottom: 5px;">
                                <p class="text-center">{{ session('success') }}</p>
                            </div>
                    </div>
                    @endif
                      @if (\Session::has('update'))
                            <div class="alert alert-success col-md-6 mx-auto" style="padding: 5px; margin-bottom: 5px;">
                                <p class="text-center">{{ session('update') }}</p>
                            </div>
                    </div>
                    @endif

                      @if (\Session::has('delete'))
                            <div class="alert alert-success col-md-6 mx-auto" style="padding: 5px; margin-bottom: 5px;">
                                <p class="text-center">{{ session('delete') }}</p>
                            </div>
                    </div>
                    @endif
                    <h5 class="card-title mb-4 d-inline">Hometypes</h5>
                    <a href="{{ route('admins.create.hometypes') }}"
                        class="btn btn-primary mb-4 text-center float-right">Create Hometypes</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">update</th>
                                <th scope="col">delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hometypes as $hometype)
                                <tr>
                                    <th scope="row">{{ $hometype->id }}</th>
                                    <td>{{ $hometype->hometypes }}</td>
                                    <td><a href="{{route('admins.edit.hometypes',  $hometype->id )}}"
                                            class="btn btn-warning text-white text-center ">Update</a></td>
                                    <td><a href="{{route('admins.delete.hometypes',  $hometype->id)}}" class="btn btn-danger  text-center ">Delete</a></td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
