<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\DriversController;
use App\Http\Controllers\VehiclesController;
use App\Http\Controllers\DestinationsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CargosController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TripsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing');
});

// User routes
Route::get('/users', [UsersController::class, 'index']);
Route::post('/users', [UsersController::class, 'store'])->name('add_user');
Route::get('/users/{user}/edit', [UsersController::class, 'edit']);
Route::get('/users/{user}/showToRemove', [UsersController::class, 'showToRemove']);
Route::put('/users/{user}', [UsersController::class, 'update']);
Route::delete('/users/{user}', [UsersController::class, 'destroy']);

// Driver routes
Route::get('/drivers', [DriversController::class, 'index']);
Route::post('/drivers', [DriversController::class, 'store']);
Route::get('/drivers/{driver}/edit', [DriversController::class, 'edit']);
Route::get('/drivers/{driver}/showToRemove', [DriversController::class, 'showToRemove']);
Route::put('/drivers/{driver}', [DriversController::class, 'update']);
Route::delete('/drivers/{driver}', [DriversController::class, 'destroy']);

// Vehicle routes
Route::get('/vehicles', [VehiclesController::class, 'index']);
Route::post('/vehicles', [VehiclesController::class, 'store']);
Route::get('/vehicles/{vehicle}/edit', [VehiclesController::class, 'edit']);
Route::put('/vehicles/{vehicle}', [VehiclesController::class, 'update']);
Route::get('/vehicles/{vehicle}/showToRemove', [VehiclesController::class, 'showToRemove']);
Route::delete('/vehicles/{vehicle}', [VehiclesController::class, 'destroy']);

// Destination routes
Route::get('/destinations', [DestinationsController::class, 'index']);
Route::post('/destinations', [DestinationsController::class, 'store']);
Route::get('/destinations/{destination}/edit', [DestinationsController::class, 'edit']);
Route::put('/destinations/{destination}', [DestinationsController::class, 'update']);
Route::delete('/destinations/{destination}', [DestinationsController::class, 'destroy']);

// Trip routes
Route::post('/trips', [TripsController::class, 'store']);
Route::get('/trips/{trip}/pay', [TripsController::class, 'payTicket']);
Route::put('/trips/{trip}', [TripsController::class, 'update']);
Route::get('/trips/{trip}/destinationDetails', [TripsController::class, 'getDestinationDetailsForBooking']);
Route::get('/trips/{trip}', [TripsController::class, 'show'])->name('show_trip');

// Payment routes
Route::get('/pay_paystack/{type}/{id}', [PaymentController::class, 'pay_paystack'])->name('pay_paystack');
Route::get('/verify_paystack/{type}/{id}', [PaymentController::class, 'verify_paystack'])->name('verify_paystack');
Route::get('/print/{type}/{id}', [PaymentController::class, 'print'])->name('print_ticket');

// Authenticaton routes
Auth::routes();

// Dashboard route
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

//Passengers routes
Route::get('/passenger/send_cargo', [CargosController::class, 'index']);
Route::post('/passenger/send_cargo', [CargosController::class, 'store']);
Route::get('/cargo_amount/{nature}/{weight}/{destination_id}', [CargosController::class, 'calculateCargoAmount']);
Route::get('/cargos/{cargo}', [CargosController::class, 'show'])->name('show_cargo');
