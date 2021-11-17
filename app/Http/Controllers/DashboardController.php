<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\CargoBooking;
use App\Models\Destination;
use App\Models\Driver;
use App\Models\User;
use App\Models\Vehicle;
use Carbon\Carbon;
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
        $passengers = User::where('type', 0)->get();
        $drivers = Driver::all();
        $vehicles = Vehicle::all();
        $destinations = Destination::all();
        $dailyTickets = Booking::whereDate('created_at', Carbon::today())->get();
        $dailyCargos = CargoBooking::whereDate('created_at', Carbon::today())->get();
        $administrators = User::where('type', 1)->get();
        $cargos = CargoBooking::all();
        $tickets = Booking::all();
        
        
        // pluck necessary data for ticket
        foreach ($tickets as $ticket) {
            $ticket->user = User::find($ticket->user_id);
            $ticket->user->full_name = $ticket->user->first_name.' '.$ticket->user->middle_name.' '.$ticket->user->last_name;
            $ticket->destination = Destination::find($ticket->destination_id);
        }
        $pluckTicketNo = $tickets->pluck('ticket_no', 'ticket_no');
        // return $ticket->depature_date; //! Test Case
        
        $adminData = [
            'drivers' => $drivers,
            'vehicles' => $vehicles,
            'destinations' => $destinations,
            'dailyTickets' => $dailyTickets,
            'dailyCargos' => $dailyCargos,
            'passengers' => $passengers,
            'administrators' => $administrators,
            'cargos' => $cargos,
            'tickets' => $tickets,
            'pluckTicketNo' => $pluckTicketNo,
        ];
        
        //* Show differrent dashboards depending on the type of user
        if ($user->type == 1) {
            return view('admin_dashboard')->with($adminData);
        } else if ($user->type == 0) {
            return view('passenger_dashboard')->with('user', $user);
        }
    }
}
