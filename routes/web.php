<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
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
    return view('landingPage');
});

Auth::routes();

// Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('myDashboard');
// Route::get('/dashboard/drivers', [App\Http\Controllers\DashboardController::class, 'drivers']);

Route::resource('drivers', 'App\Http\Controllers\DriversController');

// ! Remove this routes from here
// for registration
// Route::get('register', [RegisterController::class, 'register']);

// for login
// Route::get('login', [RegisterController::class, 'login']);

//for dashbord
// Route::get('/dashboard', 'DashboardController@mainDashboard')->name('dashboard');
Route::get('dashboard', [DashboardController::class, 'mainDashboard']);

// TODO: Edit here in it's file
// Route::get('/dashboard', function () {
//     return view('myDashboard');
// });
// ! to here

Route::resource('vehicles', 'App\Http\Controllers\VehiclesController');
