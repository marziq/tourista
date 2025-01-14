<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    // The table associated with the model
    protected $table = 'vehicles';  // Default table name is plural 'vehicles' unless specified

    // The primary key associated with the table
    protected $primaryKey = 'id';

    // Indicates if the model should be timestamped
    public $timestamps = true;

    // Mass assignable attributes
    protected $fillable = [
        'brand',
        'model',
        'price_per_day',
        'image',
    ];

    // One-to-Many Relationship: Vehicle has many bookings
    public function rentals()
{
    return $this->hasMany(Rental::class, 'vehicle_id', 'id');
}

}
