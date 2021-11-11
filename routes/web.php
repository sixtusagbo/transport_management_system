<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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

// UsersController routes
Route::get('/users', [App\Http\Controllers\UsersController::class, 'index']);
Route::post('/users', [App\Http\Controllers\UsersController::class, 'store'])->name('add_user');
Route::get('/users/{user}/edit', [App\Http\Controllers\UsersController::class, 'edit']);
Route::get('/users/{user}/showToRemove', [App\Http\Controllers\UsersController::class, 'showToRemove']);
Route::put('/users/{user}', [App\Http\Controllers\UsersController::class, 'update']);
Route::delete('/users/{user}', [App\Http\Controllers\UsersController::class, 'destroy']);

// DriversController routes
Route::get('/drivers', [App\Http\Controllers\DriversController::class, 'index']);
Route::post('/drivers', [App\Http\Controllers\DriversController::class, 'store'])->name('add_driver');

// VehiclesController routes
Route::get('/vehicles', [App\Http\Controllers\VehiclesController::class, 'index']);
Route::post('/vehicles', [App\Http\Controllers\VehiclesController::class, 'store'])->name('add_vehicle');

// Authenticaton routes
Auth::routes();

// Dashboard route
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
