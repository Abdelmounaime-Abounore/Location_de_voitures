@extends('layouts.app')
@section('content')

<div class="row row-cols-1 row-cols-lg-2 g-3 m-3">
    @foreach($reservations as $reservation)
        @if(auth()->user()->name == $reservation->user->name)
            <div class="col my-4 opacity-75" style="height:420px">
            <div class="card bg-light w-75 m-auto p-3 h-100">
                <div>
                    <h4> <span> User name: </span> {{$reservation->user->name}}</h4>
                    <p><span> Phone Number : </span>0{{$reservation->user_mobile_number}} </p>
                    <p> <span> Car: </span>{{$reservation->car->brand}} </p>
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
                @if(Auth()->user()->can('update or delete reservation'))
                    <div class="d-flex justify-content-between w-25" style="height: 37px">
                    <form id="delete-form" action="{{route('reservation destroy', $reservation->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" id="delete-reservation" class="btn btn-danger mx-2">Delete</button>
                    </form>
                    <a href="{{route('update reservation vue', $reservation->id)}}" class="btn btn-primary">Update</a>
                    </div>
                @endif
            </div>
            </div>
        {{-- @else 
        <p>not found</p> --}}
        @endif   
    @endforeach    
</div>

<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        let deleteButton = document.getElementById("delete-reservation");
        deleteButton.addEventListener("click", function(event){
            event.preventDefault(); // Prevent the form from submitting
            if (confirm("Are you sure you want cancel you reservation")) {
                document.getElementById("delete-form").submit(); // Submit the form
            }
        });
    });
</script>

@endsection

<style>
body  {
    background-image: url(../images/reservation-bg.jpg);
    background-size: cover;
    background-repeat: no-repeat;
}

span {
    font-weight: bold;
}
</style>
