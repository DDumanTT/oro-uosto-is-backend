<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Plane;
use App\Models\Flight;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatsController extends Controller
{
    public function get()
    {
        $flights = Flight::all();
        $flight_count = $flights->count();
        $plane_count = Plane::all()->count();
        $user_count = User::all()->count();
        $total_spins = User::sum('tickets');
        $popular_destinations = Flight::select(DB::raw('arrival_location, count(*) as count'))->groupBy('arrival_location')->orderByDesc('count')->limit(5)->get();
        $earnings = 0;
        foreach ($flights as $flight) {
            $earnings += $flight->users()->count() * $flight->ticket_price;
        }

        return [
            'flight_count' => $flight_count,
            'plane_count' => $plane_count,
            'user_count' => $user_count,
            'total_spins' => $total_spins,
            'earnings' => $earnings,
            'popular_destinations' => $popular_destinations,
        ];
    }
}
