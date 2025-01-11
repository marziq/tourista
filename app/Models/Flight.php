<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        'departure',
        'arrival',
        'travel_date',
        'price',
        'airline',
        'image',
        'passenger_count',
        
    ];
}
