<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users()
    {
        return User::all();
    }

    public function delete(Request $request)
    {
        User::find($request->id)->delete();
    }
}
