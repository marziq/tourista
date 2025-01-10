<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;
    protected $fillable = [
        'vehicle_id',
        'pickup_date',
        'return_date',
        'price_per_day',
        'number_of_days',
        'total_payment'  // Availability status
    ];
}
