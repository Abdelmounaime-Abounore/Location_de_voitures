@extends('layouts.app')
@section('content')
<div class="w-75 m-auto rounded" style="background-color: #c1b9b9">
    <h1 class="text-center py-5"> Add New Car</h1>
    <form method="POST" action="{{ route('car add') }}">
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
    html,body {
        height: 100%;
    }

    #app{
    height: 100%;
    }
    
    main {
        background-color: #ecdede;
        color: rgb(236 236 236);
        height: 100%;
    }
</style>
@endsection

