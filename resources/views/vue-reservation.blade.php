@extends('layouts.app')
@section('content')
{{-- <div class="d-flex flex-column flex-md-row mx-3">
    @foreach($reservations as $reservation)
        <div class="card col-md-6 w-50 m-auto mx-3 my-5">
            <h3 class="p-3"> {{$reservation->user->name}}</h3>
            <div>
                <ul class="list-group list-group-flush my-4">
                    <li class="list-group-item"><span>Car : </span>{{$reservation->car->brand}} </li>
                    <li class="list-group-item"><span>mobile : </span> {{ $reservation->user_mobile_number }}</li>
                    <li class="list-group-item"><span>date out :  </span> {{ $reservation->date_out }}</li>
                    <li class="list-group-item"><span>date back : </span> {{ $reservation->date_back }}</li>
                </ul>
            </div>
        <a class="fw-bold text-center text-light w-50 m-3 mb-2 btn btn-danger"
        href="">{{ __('Update Reservation') }}</a>
        </div>
    @endforeach
</div> --}}

<div class="row row-cols-1 row-cols-lg-2 g-3 m-3">
    @foreach($reservations as $reservation)
        <div class="col my-4" style="height:400px">
          <div class="card bg-light w-75 m-auto p-3 h-100">
            <div>
                <h4> <span> User name: </span> {{$reservation->user->name}}</h4>
                <p> <span> Car: </span>{{$reservation->car->brand}}</p>
                <p class="text-danger fw-bold"> Price: {{$reservation->car->price}} MAD/ Day</p>
            </div>
            <div>
                <p> <span> Date Out: </span> <br>
                    {{ $reservation->date_out }}<br><br>
                </p>
            </div>
            <div>
                <p> <span> Date Back: </span> <br>
                    {{ $reservation->date_back }}<br><br>
                </p>
            </div>
            <div class="d-flex justify-content-between w-25" style="height: 37px">
              <form action="" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mx-2">Delete</button>
              </form>
              <a href="" class="btn btn-primary">Update</a>
            </div>
          </div>
        </div>
    @endforeach    
</div>
@endsection

<style>
main {
    background-color: #e6e6e6;
}
span {
    font-weight: bold;
}
</style>
