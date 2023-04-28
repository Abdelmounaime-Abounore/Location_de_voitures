@extends('layouts.app')
@section('content')
<div class="container">
  <h1 class="text-center text-warning w-100 my-5 m-auto p-3 fw-bold">Offer Details</h1>
    <div class="card bg-light p-3 w-75 m-auto">
        <div class="m-auto p-2 text-center">
            @foreach ($car->photos as $photo)
                <img src="{{ asset('car-photos/' . $photo->name) }}" alt="{{ $car->brand }} {{ $car->model }}">
            @endforeach
        </div>
        <div class="mt-4">
            <p class=""> <span> Description: </span> <br>
                {{$car->description}}<br><br>
            </p>
        </div>
        @livewire('comments', ['carId' => $car->id])
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
  width: 40%;
  border-radius: 10px;
  margin: 10px;
}

.card span {
  font-weight: bold;
}
</style>
