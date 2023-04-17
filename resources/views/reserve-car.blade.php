@extends('layouts.app')
@section('content')

<div class="container">
    <h1 class="text-light text-center my-4 bg-info w-50 p-2 mx-3 rounded">Select Your Rental Period</h1>
    <form class="bg-light p-4 mx-3" method="POST" action="{{ route('car_reservation') }} "  style="border-radius:7px; opacity: 90%;">
        @csrf
        <div class="row mb-3 my-3">
            <label for="mobile number" class="col-md-4 col-form-label text-md-end">{{ __('Mobile number') }}</label>
            <div class="col-md-6">
                <input id="mobile number" type="tel" class="form-control @error('user_mobile_number') is-invalid @enderror" name="user_mobile_number" value="" required autocomplete="mobile number" autofocus>
                @error('user_mobile_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        
        <div class="row mb-3 my-3">
            <label for="date-out" class="col-md-4 col-form-label text-md-end">{{ __('When Do You Want To Borrow The Car?') }}</label>
            <div class="col-md-6">
                <input id="date-out" type="date" class="form-control @error('date_out') is-invalid @enderror" name="date_out" value="" required autocomplete="date-out" autofocus>
                    <script>
                        var today = new Date();
                        var dd = String(today.getDate()).padStart(2, '0');
                        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                        var yyyy = today.getFullYear();

                        today = yyyy + '-' + mm + '-' + dd;
                        document.getElementById("date-out").setAttribute("min", today);
                    </script>
                @error('date_out')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3 my-3">
            <label for="date-back" class="col-md-4 col-form-label text-md-end">{{ __('When do you want to return the car?') }}</label>
            <div class="col-md-6">
                <input id="date-back" type="date" class="form-control @error('date_back') is-invalid @enderror" name="date_back" value="" required autocomplete="date-back" autofocus>
                    <script>
                        var today = new Date();
                        var dd = String(today.getDate()).padStart(2, '0');
                        var mm = String(today.getMonth() + 1).padStart(2, '0'); 
                        var yyyy = today.getFullYear();

                        today = yyyy + '-' + mm + '-' + dd;
                        document.getElementById("date-back").setAttribute("min", today);
                    </script>
                @error('date_back')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3 my-3">
            <label for="direction" class="col-md-4 col-form-label text-md-end">{{ __('tell us about your trip') }}</label>
            <div class="col-md-6">
                <textarea id="direction" type="date" class="form-control @error('trip_description') is-invalid @enderror" name="trip_description" value="" required autocomplete="direction" autofocus></textarea>
                @error('trip_description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        
        <input type="hidden" name="car_id" value="{{ $car->id }}">
        
        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Save') }}
                </button>
            </div>
        </div>

    </form>
    
</div>

<style>
    body {
        background-image: url(../images/reserve-bg.jpg);
        background-size: cover;
        background-repeat: no-repeat;
    }
</style>
@endsection
