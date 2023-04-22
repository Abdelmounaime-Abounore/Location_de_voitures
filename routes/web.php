<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {

    Route::get('/all-users', [App\Http\Controllers\UserController::class, 'index'])->name('all users')->middleware(['permission:view all users']);
    Route::get('/vue-profile', [App\Http\Controllers\UserController::class, 'indexVueProfile'])->name('Vue Profile')->middleware(['permission:view profile']);
    Route::get('/update-profile', [App\Http\Controllers\UserController::class, 'edit'])->name('Update Profile')->middleware(['permission:fetch profile info to edit']);
    Route::post('/update', [App\Http\Controllers\UserController::class, 'update'])->name('update')->middleware(['permission:update profile']);
    Route::delete('/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('destroy user')->middleware(['permission:delete users']);
    Route::delete('/delete/{id}/profile', [App\Http\Controllers\UserController::class, 'destroyProfile'])->name('delete profile')->middleware(['permission:delete profile']);

    Route::get('/offer-details/{car_id}', [App\Http\Controllers\CarController::class, 'viewDetails'])->name('offer-details');
    Route::get('/add-car', [App\Http\Controllers\CarController::class, 'create'])->name('add car')->middleware(['permission:form to add car']);
    Route::post('/add/car', [App\Http\Controllers\CarController::class, 'store'])->name('car add')->middleware(['permission:add cars']);
    Route::delete('/cars/{car}', [App\Http\Controllers\CarController::class, 'destroy'])->name('cars destroy')->middleware(['permission:update or delete cars']);
    Route::get('/edit/{id}', [App\Http\Controllers\CarController::class, 'edit'])->name('update car vue')->middleware(['permission:form to update car']);
    Route::put('/cars/{id}', [App\Http\Controllers\CarController::class, 'update'])->name('update car data')->middleware(['permission:update or delete cars']);

    Route::get('/reserve-car/{car_id}', [App\Http\Controllers\ReservationController::class, 'index'])->name('reserve car')->middleware(['permission:form to reserve car']);
    Route::post('/reseve-car', [App\Http\Controllers\ReservationController::class, 'store'])->name('car_reservation')->middleware(['permission:create reservations']);
    Route::get('/car-reservation', [App\Http\Controllers\ReservationController::class, 'index2'])->name('Vue reseravtion')->middleware(['permission:view all reservations']);
    Route::get('/reservation/{id}/edit', [App\Http\Controllers\ReservationController::class, 'edit'])->name('update reservation vue')->middleware(['permission:form to update reservation']);
    Route::put('/reservation/{id}', [App\Http\Controllers\ReservationController::class, 'update'])->name('update reservation info')->middleware(['permission:update or delete reservation']);
    Route::delete('/reservation/{id}', [App\Http\Controllers\ReservationController::class, 'destroy'])->name('reservation destroy')->middleware(['permission:update or delete reservation']); 

});  
Route::get('/home', [App\Http\Controllers\CarController::class, 'index'])->name('home')->middleware(['permission:view cars']);
    