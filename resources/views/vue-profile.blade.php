@extends('layouts.app')
@section('content')
<div class="card m-auto my-5">
    <div class="card-body d-md-flex justify-content-evenly">
        <div class="">
            <h1 class="">{{$user->name}}</h1>
            <ul class="list-group list-group-flush my-4">
              <li class="list-group-item"><span>Email : </span>{{ $user->email}}</li>
              <li class="list-group-item"><span>Address : </span> {{$user->address}} </li>
              <li class="list-group-item"><span>Cin : </span> {{$user->CIN}}</li>
            </ul>
        </div>  
        <div class=" d-flex justify-content-around flex-md-column align-items-center">
            <p><span> Driver Licence </span></p>
            <img src="{{asset('driving_license_photos')}}/{{$user->driving_license_photo}}" alt="Driving Licence" class="" style="width: 200px;">
        </div>
    </div>
    <a class="nav-link fw-bold text-center text-light w-50 w-md-25 btn btn-primary p-1 mt-3" href="{{ route('Update Profile') }}">{{ __('Update Profile') }}</a>
  </div>
  <style>
  body {
      background-color: rgb(230 230 230);
  }
  .card {
    width: 90%;
  }
  span {
    font-weight: bold;
  }
  img{
    border-radius: 7px;
  }
  </style>
@endsection

