<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaneFlight extends Model
{
    use HasFactory;

    protected $table = 'plane_flight';

    public $timestamps = false;

    protected $fillable = [
        'plane_id',
        'flight_id',
    ];
}
