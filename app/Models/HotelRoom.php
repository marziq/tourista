<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelRoom extends Model
{
    use HasFactory;

    // Define the table
    protected $table = 'hotel_rooms';

    protected $fillable = ['hotel_id', 'room', 'price', 'available', 'checkin_date', 'checkout_date'];

    // Define the relationship with Hotel
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    // Check if the room is available for a given date range
    public function isAvailable($checkIn, $checkOut)
    {
        // If the 'available' flag is 0, the room is unavailable
        if (!$this->available) {
            return false;
        }

        // Check if the room is booked for overlapping dates
        return !self::where('id', $this->id)
            ->where(function ($query) use ($checkIn, $checkOut) {
                $query->whereBetween('checkin_date', [$checkIn, $checkOut])
                      ->orWhereBetween('checkout_date', [$checkIn, $checkOut])
                      ->orWhere(function ($query) use ($checkIn, $checkOut) {
                          $query->where('checkin_date', '<=', $checkIn)
                                ->where('checkout_date', '>=', $checkOut);
                      });
            })
            ->exists();
    }


}
