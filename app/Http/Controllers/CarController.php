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
    public function edit($id)
    {
        $car = Car::find($id);
        return view('update-car', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|integer|min:1',
            'description' => 'required|string|max:255',
            'price' => 'required|integer|min:1',
            'photo1' => 'required|mimes:jpeg,png,jpg,svg',
            'photo2' => 'required|mimes:jpeg,png,jpg,svg',
        ]);

        $car = Car::find($id);
        $car->brand = $validatedData['brand'];
        $car->model = $validatedData['model'];
        $car->description = $validatedData['description'];
        $car->price = $validatedData['price'];

        $car->save();

        $photos = $car->photos;

        $img1Name = time().'.'. $validatedData['photo1']->getClientOriginalName();
        $validatedData['photo1']->move(public_path('car-photos'), $img1Name);
        $photos[0]->name = $img1Name;
        $photos[0]->car_id = $car->id;
        $photos[0]->save();

        $img2Name = time().'.'. $validatedData['photo2']->getClientOriginalName();
        $validatedData['photo2']->move(public_path('car-photos'), $img2Name);
        $photos[1]->name = $img2Name;
        $photos[1]->car_id = $car->id;
        $photos[1]->save();

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('home');
    }
}
