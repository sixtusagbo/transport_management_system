<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SendCargoController extends Controller
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

        // Check if user trying to access page is admin
        if (auth()->user()->type != 0) {
            return redirect('/dashboard')->with('error', 'Unauthorized Page');
        }
        
        
        return view('passenger.send_cargo')->with('user', $user);
    
    }

    public function cargo()
    {
        return view('passenger.send_cargo');
    }
}
