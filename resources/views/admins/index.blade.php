@extends('layouts.admins')
@section('content')
<div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Properties</h5>
              <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
              <p class="card-text">number of properties: {{$props_count}}</p>

            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Home types</h5>

              <p class="card-text">number of home types: {{$home_types_count}}</p>

            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Admins</h5>

              <p class="card-text">number of admins: {{$adminsCount}}</p>

            </div>
          </div>
        </div>
      </div>
@endsection
