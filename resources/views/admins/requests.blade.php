@extends('layouts.admins')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 d-inline">Requests</h5>

                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">email</th>
                                <th scope="col">phone</th>
                                <th scope="col">agent name</th>
                                <th scope="col">go to this property</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($requests as $request)
                                <tr>
                                    <th scope="row">{{$request->id}}</th>
                                    <td>{{$request->name}}</td>
                                    <td>{{$request->email}}</td>
                                    <td>{{$request->phone}}</td>
                                    <td>{{$request->agent_name}}</td>
                                    <td><a href="{{route('single.prop', $request->prop_id)}}" class="btn btn-success  text-center ">go</a></td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
