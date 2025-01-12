<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    // Define the table
    protected $table = 'hotels';

    // Add fillable fields
    protected $fillable = ['name', 'location', 'price', 'description', 'image', 'check_in', 'check_out'];

    public function rooms()
    {
        return $this->hasMany(HotelRoom::class);
    }

    public function isAvailable($check_in, $check_out)
    {
        // Ensure that the hotel is not booked for the desired range
        if ($this->check_in && $this->check_out) {
            // Compare the check-in and check-out dates
            return !(
                ($this->check_in <= $check_out && $this->check_in >= $check_in) ||
                ($this->check_out >= $check_in && $this->check_out <= $check_out)
            );
        }

        return true; // If no booking exists, the hotel is available
    }
}
