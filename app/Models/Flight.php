<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        'flight_code',
        'departure_location',
        'arrival_location',
        'status',
        'gate',
        'boarding_time',
        'duration',
        'ticket_price',
    ];
}
