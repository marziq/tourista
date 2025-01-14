<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand',
        'model',
        'pickup_date',
        'return_date',
        'price_per_day',
        'number_of_days',
        'total_payment',
        'location',
        'username',
        'card_number',
    ];



    public static function isAvailable($vehicleId, $pickupDate, $returnDate)
    {
        return !self::where('vehicle_id', $vehicleId)
            ->where(function ($query) use ($pickupDate, $returnDate) {
                $query->whereBetween('pickup_date', [$pickupDate, $returnDate])
                      ->orWhereBetween('return_date', [$pickupDate, $returnDate])
                      ->orWhereRaw('? BETWEEN pickup_date AND return_date', [$pickupDate])
                      ->orWhereRaw('? BETWEEN pickup_date AND return_date', [$returnDate]);
            })
            ->exists();
    }
}
