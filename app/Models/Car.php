<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Photo;

class Car extends Model
{
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    use HasFactory;
    protected $fillable = [
        'brand',
        'model',
        'description',
        'price'
    ];
}
