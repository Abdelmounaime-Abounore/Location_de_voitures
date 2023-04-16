@extends('layouts.app')
@section('content')

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
              <a href="{{route('update reservation', $reservation->id)}}" class="btn btn-primary">Update</a>
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
