@extends('layouts.app')
@section('content')

<div class="container">
    <h1 class="text-light text-center my-4 bg-info w-50 p-2 rounded">Select Your Rental Period</h1>
    <form class="bg-light py-4 my-3" style="border-radius:7px; opacity: 90%">
        @csrf
        <div class="row mb-3 my-3">
            <label for="mobile number" class="col-md-4 col-form-label text-md-end">{{ __('Mobile number') }}</label>
            <div class="col-md-6">
                <input id="mobile number" type="tel" class="form-control @error('mobile number') is-invalid @enderror" name="mobile number" value="" required autocomplete="mobile number" autofocus>
                @error('mobile number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        
        <div class="row mb-3 my-3">
            <label for="dateout" class="col-md-4 col-form-label text-md-end">{{ __('When Do You Want To Borrow The Car?') }}</label>
            <div class="col-md-6">
                <input id="dateout" type="date" class="form-control @error('dateout') is-invalid @enderror" name="dateout" value="" required autocomplete="dateout" autofocus>
                    <script>
                        var today = new Date();
                        var dd = String(today.getDate()).padStart(2, '0');
                        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                        var yyyy = today.getFullYear();

                        today = yyyy + '-' + mm + '-' + dd;
                        document.getElementById("dateout").setAttribute("min", today);
                    </script>
                @error('dateout')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3 my-3">
            <label for="dateback" class="col-md-4 col-form-label text-md-end">{{ __('When do you want to return the car?') }}</label>
            <div class="col-md-6">
                <input id="dateback" type="date" class="form-control @error('dateback') is-invalid @enderror" name="dateback" value="" required autocomplete="dateback" autofocus>
                    <script>
                        var today = new Date();
                        var dd = String(today.getDate()).padStart(2, '0');
                        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                        var yyyy = today.getFullYear();

                        today = yyyy + '-' + mm + '-' + dd;
                        document.getElementById("dateback").setAttribute("min", today);
                    </script>
                @error('dateback')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3 my-3">
            <label for="direction" class="col-md-4 col-form-label text-md-end">{{ __('tell us about your trip') }}</label>
            <div class="col-md-6">
                <textarea id="direction" type="date" class="form-control @error('direction') is-invalid @enderror" name="direction" value="" required autocomplete="direction" autofocus></textarea>
                @error('direction')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

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
