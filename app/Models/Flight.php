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
        'departure_time',
        'arrival_time',
        'price',
        'airline',
        'image',
    ];
}
