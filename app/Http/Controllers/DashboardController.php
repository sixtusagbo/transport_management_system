<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        
        //* Show differrent dashboards depending on the type of user
        if ($user->type == 1) {
            return view('admin_dashboard')->with('user', $user);
        } else if ($user->type == 0) {
            return view('passenger_dashboard')->with('user', $user);
        }
    }
}
