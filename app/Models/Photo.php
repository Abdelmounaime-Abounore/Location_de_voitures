<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
    
    use HasFactory;
    protected $fillable = [
        'name',
        'car_id'
    ];
}
