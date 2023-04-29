@extends('layouts.app')
@section('content')
<div class="container">
  @if(Auth()->user()->can('add cars'))
    <h3 class="text-center text-light w-100 my-5 m-auto p-3 fw-bold">Welcome To <span class="text-primary">Castilla Rent Car</span>, Browse Your offers and Add More Cars</h3>
  @elseif(Auth()->user()->can('create reservations'))
    <h3 class="text-center text-light w-100 my-5 m-auto p-3 fw-bold">Welcome To <span class="text-primary">Castilla Rent Car</span>, Browse Our Offers And Find What Suits You Best</h3>
  @endif
  <div class="row row-cols-1 row-cols-lg-2 g-3">
      @foreach ($cars as $car)
          <div class="col p-2" style="height:370px">
            <div class="card bg-light m-1 p-3 h-100">
              <div class="w-100 justify-content-around d-flex p-2">
                @foreach ($car->photos as $photo)
                  <img src="{{ asset('car-photos/' . $photo->name) }}" alt="{{ $car->brand }} {{ $car->model }}">
                @endforeach
              </div>
              <div class="">
                  <p> <span> {{$car->brand}}, Model {{$car->model}} </span></p>
                  <p class="text-danger fw-bold"> Price: {{$car->price}} MAD/ Day</p>
              </div>
              @if ($car->reservation)
                  <p>This car is reserved from <span class="text-danger"> {{$car->reservation->date_out}} </span> to <span class="text-danger"> {{$car->reservation->date_back}}</span> </p>
              @endif
              <div class="d-flex justify-content-between">
                <div class="d-flex justify-content-between w-25" style="height: 37px">
                  @if(Auth()->user()->can('update or delete cars'))
                    <form id="delete-form" action="{{route('cars destroy', $car->id)}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger mx-2" id="delete-car">Delete</button>
                    </form>
                    <a href="{{route('update car vue', $car->id )}}" class="btn btn-primary">Update</a>
                  @endif
                  @if(Auth()->user()->can('form to reserve car'))
                    <a href="{{ route('reserve car', ['car_id' => $car->id]) }}" class="btn btn-primary mx-2 w-100">Reserve</a>
                  @endif
                </div>
                <div>
                  <a href="{{route('offer-details', ['car_id' => $car->id]) }}" class="btn btn-secondary mx-2">View more Details</a>
                </div>
              </div>
            </div>
          </div>
      @endforeach    
  </div>
  @if(Auth()->user()->can('add cars'))
  <div class="w-50 m-auto">
      <button class="btn btn-warning w-100 my-4">
          <a class="nav-link text-light" href="{{ route('add car')}}">{{ __('Add an Other Car in Agnece') }}</a>
      </button>
  </div>
  @endif

</div>  
{{-- <script>
  window.addEventListener('DOMContentLoaded', (event) => {
      let deleteButton = document.getElementById("delete-car");
      deleteButton.addEventListener("click", function(event){
          event.preventDefault(); // Prevent the form from submitting
          if (confirm("Are you sure you want to delete this car?")) {
              document.getElementById("delete-form").submit(); // Submit the form
          }
      });
  });
</script> --}}
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
