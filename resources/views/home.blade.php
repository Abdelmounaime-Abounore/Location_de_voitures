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
              <div class="d-flex justify-content-between w-100" style="height: 37px">
                <form action="{{route('cars destroy', $car->id)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger mx-2">Delete</button>
                </form>
                <a href="{{route('update car vue', $car->id )}}" class="btn btn-primary">Update</a>
                <a href="{{ route('reserve car', ['car_id' => $car->id]) }}" class="btn btn-primary mx-2 w-100">Reserve Car</a>
              </div>
            </div>
          </div>
      @endforeach    
  </div>
  <div class="w-50 m-auto">
      <button class="btn btn-warning w-100 my-4">
          <a class="nav-link text-light" href="{{ route('add car'), $car->id }}">{{ __('Add an Other Car in Agnece') }}</a>
      </button>
  </div>
</div>  
@endsection

<style>
body  {
  background-image: url(../images/Dashbord-bg.png);
  background-size: cover;
  background-repeat: no-repeat;
}

nav {
  background-color:rgb(192, 192, 186);
  height:14%;
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
  border-radius: 10px;
  margin: 10px;
}

.card span {
  font-weight: bold;
}
</style>
