<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;
    protected $fillable = [
        'pick_up_loc',
        'brand',
        'model',       // Brand of the vehicle
        'price_per_day',
        'pick_up_date',
        'return_date',
        'total',
        'available',   // Availability status
    ];
}
