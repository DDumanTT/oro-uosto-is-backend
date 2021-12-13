<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;
use App\Models\PlaneFlight;

class FlightController extends Controller
{
    public function get_flights()
    {
        return Flight::all();
    }

    public function insert(Request $request)
    {
        $flight = Flight::create([
            'flight_code' => $request->flight_code,
            'departure_location' => $request->departure_location,
            'arrival_location' => $request->arrival_location,
            'status' => $request->status,
            'gate' => $request->gate,
            'boarding_time' => $request->boarding_time,
            'duration' => $request->duration,
            'ticket_price' => $request->ticket_price,
        ]);

        PlaneFlight::create([
            'plane_id' => $request->plane_id,
            'flight_id' => $flight->id,
        ]);

        return $flight;
    }

    public function edit_record()
    {
        # code...
    }

    public function update_status(Request $request)
    {
        $flight = Flight::find($request->id);
        $flight->status = $request->status;
        $flight->save();
    }

    public function search(Request $request)
    {
        // $request->validate([
        //     'from' => ''
        //     'to' => ''
        // ]);

        $from = $request->from;
        $to = $request->to;

        $flights = Flight::query()->where('departure_location', 'LIKE', "%{$from}%")->where('arrival_location', 'LIKE', "%{$to}%")->get();

        return $flights;
    }

    public function book(Request $request)
    {
    }
}
