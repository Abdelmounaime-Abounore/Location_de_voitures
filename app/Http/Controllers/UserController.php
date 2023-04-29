<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('all-users', compact('users'));
    }

    public function indexVueProfile()
    {
        $user = auth()->user();
        return view('vue-profile', compact('user'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = auth()->user();
        return view('update-profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id,
            'password' => 'required|string|min:8|confirmed',
            'driving_license_photo' => 'mimes:jpeg,png,jpg,svg',
            'address' => 'required|string|max:255',
            'CIN' => 'required|string|max:6',
        ]);

        $user = Auth::user();
      
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);

        if($request->file('driving_license_photo')) {
            $imgName = $request['driving_license_photo']->getClientOriginalName();
            $request['driving_license_photo']->move(public_path('driving_license_photos'), $imgName);
            $user->driving_license_photo = $imgName;
        }

        $user->address = $validatedData['address'];
        $user->CIN = $validatedData['CIN'];
        $user->save();

        return redirect()->route('Vue Profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('all users');
    }

    public function destroyProfile($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/');
    }
}
