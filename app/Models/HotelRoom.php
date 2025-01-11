<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelRoom extends Model
{
    use HasFactory;

    // Define the table
    protected $table = 'hotel_rooms';

    protected $fillable = ['hotel_id', 'room', 'price', 'available'];

    // Define the relationship with Hotel
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

}
