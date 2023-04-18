<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Car;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($car_id)
    {
        $car = Car::find($car_id);
        return view('reserve-car', ['car' => $car]);
    }

    public function index2()
    {
        $reservations = Reservation::all();
        $reservations = Reservation::with('car', 'user')->get();    
        return view('vue-reservation', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_mobile_number' => 'required|numeric|regex:/^[0-9]{10}$/',
            'date_out' => 'required',
            'date_back' => 'required',
            'trip_description' => 'required|string'
        ]);

        $carId = $request->input('car_id');
        $userMobileNumber = $validatedData['user_mobile_number'];
        $dateOut = $validatedData['date_out'];
        $dateBack = $validatedData['date_back'];
        $tripDescription = $validatedData['trip_description'];
        $userId = auth()->user()->id;

        $reservation = new Reservation();
        $reservation->car_id = $carId;
        $reservation->user_mobile_number = $userMobileNumber;
        $reservation->date_out = $dateOut;
        $reservation->date_back = $dateBack;
        $reservation->trip_description = $tripDescription;
        $reservation->user_id = $userId;
        $reservation->save();

        return redirect()->route('Vue reseravtion');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    
     public function edit($id)
    {
        $reservation = Reservation::find($id);
        return view('edit-reservation', compact('reservation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'user_mobile_number' => 'required|numeric|regex:/^[0-9]{10}$/',
            'date_out' => 'required',
            'date_back' => 'required',
            'trip_description' => 'required|string'
        ]);

        $reservation = Reservation::find($id);
        $reservation->user_mobile_number = $validatedData['user_mobile_number'];
        $reservation->date_out = $validatedData['date_out'];
        $reservation->date_back = $validatedData['date_back'];
        $reservation->trip_description = $validatedData['trip_description'];

        $reservation->save();

        return redirect()->route('Vue reseravtion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        
        $reservation->delete();

        return redirect()->route('Vue reseravtion');
    }
}
