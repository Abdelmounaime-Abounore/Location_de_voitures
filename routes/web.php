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
    Route::get('/update-profile', [App\Http\Controllers\UserController::class, 'index'])->name('Update Profile');
    Route::get('/vue-profile', [App\Http\Controllers\UserController::class, 'indexVueProfile'])->name('Vue Profile');
    Route::post('/update', [App\Http\Controllers\UserController::class, 'update'])->name('update');
    Route::get('/add-car', [App\Http\Controllers\CarController::class, 'create'])->name('add car');
    Route::post('/add/car', [App\Http\Controllers\CarController::class, 'store'])->name('car add');
    Route::delete('/cars/{car}', [App\Http\Controllers\CarController::class, 'destroy'])->name('cars destroy');

    
});  
Route::get('/home', [App\Http\Controllers\CarController::class, 'index'])->name('home');
    