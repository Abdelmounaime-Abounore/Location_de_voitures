@extends('layouts.app')
@section('content')
    <div class="card w-75 m-auto my-5">
        <div class="card-body d-md-flex justify-content-evenly">
            <div class="">
                <h1 class="">{{ $user->name }}</h1>
                <ul class="list-group list-group-flush my-4">
                    <li class="list-group-item"><span>Email : </span>{{ $user->email }}</li>
                    <li class="list-group-item"><span>Address : </span> {{ $user->address }} </li>
                    <li class="list-group-item"><span>Cin : </span> {{ $user->CIN }}</li>
                </ul>
            </div>
            <div class=" d-flex justify-content-around flex-md-column align-items-center">
                <p><span> Driver Licence </span></p>
                <img src="{{ asset('driving_license_photos') }}/{{ $user->driving_license_photo }}" alt="Driving Licence"
                    class="" style="width: 200px;">
            </div>
        </div>
        <div class="d-flex justify-content-center my-3 ">
            <a class="btn btn-primary mx-2"
            href="{{ route('Update Profile') }}">{{ __('Update Profile') }}</a>
            @if(Auth()->user()->can('delete profile'))
                <form id="delete-form" method="POST" action="{{ route('delete profile', $user->id) }}">
                    @csrf
                    @method('DELETE')
                    <button id="delete-profile" type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete Profile</button>
                </form>  
            @endif            
        </div>
    </div>

    <script>
        let deleteButton = document.getElementById("delete-profile");
        deleteButton.addEventListener("click", function(event){
            event.preventDefault();
            if (confirm("Are you sure you want delete your Profile")) {
                document.getElementById("delete-form").submit(); 
            }
        });
    </script>

    <style>
        body  {
        background-image: url(../images/profile-bg.jpg);
        background-size: cover;
        }
        .card {
            width: 90%;
        }

        span {
            font-weight: bold;
        }

        img {
            border-radius: 7px;
        }

        .updateBtn:hover {
            background-color: #0056b3;
        }
    </style>
@endsection
