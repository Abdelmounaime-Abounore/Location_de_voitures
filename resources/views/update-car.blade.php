@extends('layouts.app')
@section('content')
<div class="bg-light w-75 m-auto rounded">
<form class="w-75 m-auto my-5 py-3" method="POST" action="{{ route('update car data', ['id' => $car->id])}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row mb-3 my-3">
        <label for="brand" class="col-md-4 col-form-label text-md-end">{{ __('Brand') }}</label>
        <div class="col-md-6">
            <input id="brand" type="text" class="form-control @error('brand') is-invalid @enderror" name="brand" value="{{ $car->brand }}" required autocomplete="brand" autofocus>
            @error('brand')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="model" class="col-md-4 col-form-label text-md-end">{{ __('Model') }}</label>
        <div class="col-md-6">
            <input id="model" type="number" class="form-control @error('model') is-invalid @enderror" name="model" value="{{ $car->model }}" required autocomplete="model">
            @error('model')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>
        <div class="col-md-6">
            <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="new-description">{{ $car->description }}</textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('Price') }}</label>
        <div class="col-md-6">
            <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value = "{{$car->price}}" required autocomplete="price" autofocus>
            @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="photo1" class="col-md-4 col-form-label text-md-end">{{ __('Car photo (external image)') }}</label>
        <div class="col-md-6">
            <input id="photo1" type="file" class="form-control @error('photo1') is-invalid @enderror" name="photo1"  autofocus>
            @error('photo1')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="image w-100 my-3">
                <img src="{{ asset('car-photos/' . $car->photos[0]->name) }}" alt="{{ $car->brand }} {{ $car->model }}">
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <label for="photo2" class="col-md-4 col-form-label text-md-end">{{ __('Car photo (inside image)') }}</label>
        <div class="col-md-6">
            <input id="photo2" type="file" class="form-control @error('photo2') is-invalid @enderror" name="photo2"  autofocus>
            @error('photo2')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="image w-100 my-3">
                <img src="{{ asset('car-photos/' . $car->photos[1]->name) }}" alt="{{ $car->brand }} {{ $car->model }}">
            </div>
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
</div>

@endsection

<style>
main {
        background-color: rgb(232, 232, 229);
    }
   .image img {
    height: 120px;
    border-radius: 5px;
   }
   
</style>
