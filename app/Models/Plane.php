<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{
    use HasFactory;


    protected $fillable = [
        'assemble_date',
        'manufacturer',
        'max_speed',
        'model',
        'plane_name',
        'total_seats',
    ];

    public function flights()
    {
        return $this->belongsToMany(Flight::class, 'plane_flight', 'flight_id', 'plane_id');
    }
}
