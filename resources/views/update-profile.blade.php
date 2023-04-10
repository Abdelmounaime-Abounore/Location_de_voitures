@extends('layouts.app')
@section('content')
<form class="w-75 m-auto my-5" method="POST" action="{{ route('update') }}" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3 my-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>
    </div>

    <div class="row mb-3">
        <label for="driving_license_photo" class="col-md-4 col-form-label text-md-end">{{ __('Driving License Photo') }}</label>
    
        <div class="col-md-6">
            <input id="driving_license_photo" type="file" class="form-control @error('driving_license_photo') is-invalid @enderror" name="driving_license_photo" value = "" required autocomplete="driving_license_photo" autofocus>
    
            @error('driving_license_photo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="license-photo m-auto my-3">
        <img class="" src="{{asset('driving_license_photos')}}/{{$user->driving_license_photo}}" alt="">
    </div>
    <div class="row mb-3">
        <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>
    
        <div class="col-md-6">
            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value = " {{ $user->address }} " required autocomplete="address" autofocus>
    
            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="CIN" class="col-md-4 col-form-label text-md-end">{{ __('CIN') }}</label>
    
        <div class="col-md-6">
            <input id="CIN" type="text" class="form-control @error('CIN') is-invalid @enderror" name="CIN" value= " {{$user->CIN}} " required autocomplete="CIN" autofocus>
    
            @error('CIN')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Update Info') }}
            </button>
        </div>
    </div>
</form>
@endsection

<style>
    main {
        background-color: #e6e6e6;
    }
    .license-photo {
        width: 25%;
    }
    .license-photo img {
        width: 100%;
        border-radius: 7%;
    }
</style>
