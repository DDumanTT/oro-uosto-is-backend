<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlaneController;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\GamblingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Auth
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/change_status', [AuthController::class, 'change_status']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Users
Route::get('/dashboard/user', [UserController::class, 'users']);
Route::post('/user/delete', [UserController::class, 'delete']);
Route::get('/user', function () {
    return Auth::user();
});

// Flights
Route::get('/flights', [FlightController::class, 'get_flights'])->name('fligths');
Route::post('/flights/insert', [FlightController::class, 'insert'])->name('insert_flight');
Route::get('/flights/search', [FlightController::class, 'search']);
Route::post('/flights/book', [FlightController::class, 'book']);
Route::post('/dashboard/flights', [FlightController::class, 'update_status']);

// Planes
Route::get('/planes', [PlaneController::class, 'get']);
Route::post('/planes/insert', [PlaneController::class, 'insert']);

// Bookings
Route::get('/bookings', [BookingController::class, 'get']);
Route::post('/bookings/insert', [BookingController::class, 'insert']);
Route::post('/bookings/delete', [BookingController::class, 'delete']);

// Statistics
Route::get('/stats', [StatsController::class, 'get']);

// Gambling
Route::get('/gambling/spin', [GamblingController::class, 'spin']);
Route::get('/gambling/reward', [GamblingController::class, 'win']);
