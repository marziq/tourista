<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    use HasFactory;

    // Optional: Define the table name if it is not 'payment_histories'
    protected $table = 'payment_histories';

    // Define fillable fields to allow mass assignment
    protected $fillable = [
        'username',
        'quantity',
        'total_price',
        'payment_method',
    ];
}

