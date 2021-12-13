<?php

namespace App\Http\Controllers;

use App\Models\Plane;
use Illuminate\Http\Request;

class PlaneController extends Controller
{
    public function get()
    {
        return Plane::all();
    }

    public function insert(Request $request)
    {
        $plane = Plane::create([
            'assemble_date' => $request->assemble_date,
            'manufacturer' => $request->manufacturer,
            'max_speed' => $request->max_speed,
            'model' => $request->model,
            'plane_name' => $request->plane_name,
            'total_seats' => $request->total_seats,
        ]);

        return $plane;
    }
}
