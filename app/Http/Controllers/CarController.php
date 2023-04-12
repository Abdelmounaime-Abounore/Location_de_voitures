<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Photo;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $cars = Car::all();
        return view('home', compact('cars'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add-car');
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
            'brand' => 'required|string|max:255',
            'model' => 'required|integer',
            'description' => 'required|string|max:255',
            'price' => 'required|integer',
            'photo1' => 'required',
            'photo2' => 'required'
        ]);
    
        $img1Name = time().'.'. $validatedData['photo1']->getClientOriginalName();
        $validatedData['photo1']->move(public_path('car-photos'), $img1Name);

        $img2Name = time().'.'. $validatedData['photo2']->getClientOriginalName();
        $validatedData['photo2']->move(public_path('car-photos'), $img2Name);

        $car = Car::create([
            'brand' => $validatedData['brand'],
            'model' => $validatedData['model'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
        ]);

        $photo1 = Photo::create([
            'name' => $img1Name,
            'car_id' => $car->id
        ]);
        $photo2 = Photo::create([
            'name' => $img2Name,
            'car_id' => $car->id
        ]);
         
    
        return redirect()->route('home');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        //
    }
}
