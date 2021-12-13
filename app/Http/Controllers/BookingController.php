<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function get()
    {
        // $user = User::find($request->id);
        // return $user->bookings();
        $user = Auth::User();
        $roll = rand(0, 100);
        $ticket_received = false;
        if ($roll <= 29) {
            $user->tickets += 1;
            $user->save();
            $ticket_received = true;
        }
        return ["flights" => $user->flights()->get(), "ticket_received" => $ticket_received];
    }

    public function insert(Request $request)
    {
        $booking = Booking::create([
            'user_id' => $request->user_id,
            'flight_id' => $request->flight_id,
        ]);

        return $booking;
    }

    public function delete(Request $request)
    {
        Auth::User()->flights()->detach($request->flight_id);
    }
}
