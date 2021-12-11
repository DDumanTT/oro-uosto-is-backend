<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,20',
            'surname' => 'required|string|between:2,20',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|min:3'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        ));

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
        // $user = new User;
        // $user->name = $request->name;
        // $user->surname = $request->surname;
        // $user->email = $request->email;
        // $user->password = Hash::make($request->password);
        // $user->save();
        // return response()->json([
        //     "message" => "Registration successful",
        // ], 201);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:3'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!$token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->createNewToken($token);

        // $credentials = $request->only(['email', 'password']);
        //Alternatively
        /*$credentials = [
        'email' => $request->email,
        'password' => $request->password
        ];
        */
        // $token = auth()->attempt($credentials);
        // return response()->json([
        //     "message" => "Login Successful",
        //     "token" => $token
        // ], 201);
    }

    public function logout()
    {
        auth()->logout();

        return response()->json([
            "message" => "Logout Successful",
        ], 201);
    }

    public function getUser()
    {
        return response()->json(auth()->user());
    }

    protected function createNewToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
}
