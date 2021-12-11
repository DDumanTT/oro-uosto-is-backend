<?php

namespace App\Http\Controllers;

use App\Models\User;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json([
            "message" => "Registration successful",
        ], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only(['email', 'password']);
        //Alternatively
        /*$credentials = [
        'email' => $request->email,
        'password' => $request->password
        ];
        */
        $token = auth()->attempt($credentials);
        return response()->json([
            "message" => "Login Successful",
            "token" => $token
        ], 201);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json([
            "message" => "Logout Successful",
        ], 201);
    }
}
