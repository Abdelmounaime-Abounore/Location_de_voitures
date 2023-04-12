@extends('layouts.app')
@section('content')
<div class="container">
  <h3 class="text-center text-light w-100 my-5 m-auto p-3 fw-bold">Welcome To <span class="text-primary">Castilla Rent Car</span>, Browse our offers and find what suits you best</h3>
  <div class="row row-cols-1 row-cols-lg-2 g-3">
      @foreach ($cars as $car)
          <div class="col p-2" style="height:460px">
            <div class="card bg-light m-1 p-3 h-100">
              <div class="w-100 justify-content-around d-flex p-2">
                @foreach ($car->photos as $photo)
                  <img src="{{ asset('car-photos/' . $photo->name) }}" alt="{{ $car->brand }} {{ $car->model }}">
                @endforeach
              </div>
              <div class="">
                  <p> <span> {{$car->brand}}, Model {{$car->model}} </p>
                  <p class="text-danger fw-bold"> Price: {{$car->price}} MAD/ Day</p>
              </div>
              <div>
                  <p class=""> <span> Description: </span> <br>
                      {{$car->description}}<br><br>
                  </p>
              </div>
              <div>
                <form action="{{route('cars destroy', $car->id)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger mx-2">Delete</button>
                </form>
                {{-- <a href="{{route('cars destroy', $car->id)}}" class="btn btn-danger mx-2">Delete</a> --}}
                <a href="" class="btn btn-primary">Update</a>
              </div>
            </div>
          </div>
      @endforeach    
  </div>
  <div class="w-50 m-auto">
      <button class="btn btn-warning w-100 my-4">
          <a class="nav-link text-light" href="{{ route('add car') }}">{{ __('Add an Other Car in Agnece') }}</a>
      </button>
  </div>
</div>  
@endsection

<style>
html, body {
  margin: 0;
  padding: 0;
  height: 100%;
}

nav {
  background-color:rgb(192, 192, 186);
  height:14%;
}
main {
  background-image: url(../images/Dashbord-bg.png);
  background-size: cover;
  /* background-position: center center; */
  background-repeat: no-repeat;
}
.container h3 {
  opacity: 75%;
  border-radius: 7px;
}

.card {
  opacity: 85%;
}

.card img {
  height: 120px;
  /* width: 90%; */
  border-radius: 10px;
  margin: 10px;
}

.card span {
  font-weight: bold;
}
</style>
