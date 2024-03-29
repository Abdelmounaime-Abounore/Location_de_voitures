@extends('layouts.app')
@section('content')
<div class="w-75 m-auto rounded" style="background-color: #e5e4e4; opacity: 90%">
    <h1 class="text-center py-5 my-5"> Add New Car</h1>
    <form class="p-3" method="POST" action="{{ route('car add') }}" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3 my-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Brand') }}</label>
    
            <div class="col-md-6">
                <input id="brand" type="text" class="form-control @error('brand') is-invalid @enderror" name="brand" value="{{ old('brand') }}" required autocomplete="brand" autofocus>
    
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
                <input id="model" type="number" class="form-control @error('model') is-invalid @enderror" name="model" value="{{ old('model') }}" required autocomplete="model">
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
                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="new-description"></textarea>
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
                <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" required autocomplete="price" autofocus>
        
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
                <input id="photo1" type="file" class="form-control @error('photo1') is-invalid @enderror" name="photo1" required autocomplete="photo1" autofocus>
        
                @error('photo1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="photo2" class="col-md-4 col-form-label text-md-end">{{ __('Car photo (inside image)') }}</label>
        
            <div class="col-md-6">
                <input id="photo2" type="file" class="form-control @error('photo2') is-invalid @enderror" name="photo2" required autocomplete="photo2" autofocus>
        
                @error('photo2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    
        <div class="row mb-0">
            <div class="col-md-6 offset-md-4 my-3">
                <button type="submit" class="btn btn-danger">
                    {{ __('Add New Car') }}
                </button>
            </div>
        </div>
    </form>
</div>

<style>
    body  { 
        background-image: url(../images/add-car.jpg);
        background-size: cover;
        color: brown;
        font-weight: bold;
}
</style>
@endsection

