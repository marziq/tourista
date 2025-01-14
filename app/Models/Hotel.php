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

}
