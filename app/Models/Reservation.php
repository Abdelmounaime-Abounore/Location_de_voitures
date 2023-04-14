<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'user_id',
        'user_mobile_number',
        'date_out',
        'date_back',
        'trip_description',
        'operation_confirmed'
    ];
}
