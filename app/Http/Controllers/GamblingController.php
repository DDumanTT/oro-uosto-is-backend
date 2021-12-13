<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GamblingController extends Controller
{
    public function spin()
    {
        $user = Auth::user();
        $user->tickets -= 1;
        $user->save();
    }

    public function win()
    {
        $random_flight = Flight::inRandomOrder()->first();
        Booking::create([
            'user_id' => Auth::id(),
            'flight_id' => $random_flight->id,
        ]);

        return $random_flight;
    }
}
