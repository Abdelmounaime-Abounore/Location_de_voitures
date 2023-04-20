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

    
    <!-- Delete modal -->

    {{-- <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Profile Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete your profile?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" form="delete-form" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <script>
        const deleteButton = document.getElementById('delete-profile');
        const deleteModal = document.getElementById('deleteModal');
        deleteButton.addEventListener('click', () => {
            deleteModal.addEventListener('shown.bs.modal', () => {
                document.activeElement.blur();
            });
    });
      </script> --}}

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
