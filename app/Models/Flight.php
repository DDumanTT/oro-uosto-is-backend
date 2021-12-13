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

    public function planes()
    {
        return $this->belongsToMany(Plane::class, 'plane_flight', 'plane_id', 'flight_id');
    }

    public function users()
    {
        // return $this->hasMany(Booking::class);
        return $this->belongsToMany(User::class, 'bookings', 'flight_id', 'user_id');
    }
}
