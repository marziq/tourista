<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourPackage extends Model
{
    use HasFactory;

    // Define the table if it's not the plural of the model name
    protected $table = 'tour_packages';

    // Define the fillable fields
    protected $fillable = [
        'package_name',
        'price',
        'description',
        'image',
    ];
}
