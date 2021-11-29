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
        $tickets = Booking::latest()->paginate(5);
        $cargo_tickets = CargoBooking::latest()->paginate(5);
        $userTickets = $user->bookings;
        $userTicketsBookedToday = $user->bookings()->whereDate('created_at', Carbon::today())->get();
        
        foreach ($tickets as $ticket) {
            $ticket->user->full_name = $ticket->user->first_name.' '.$ticket->user->middle_name.' '.$ticket->user->last_name;
        }

        foreach ($cargo_tickets as $ticket) {
            $ticket->user->full_name = $ticket->user->first_name.' '.$ticket->user->middle_name.' '.$ticket->user->last_name;
        }
        
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
            'cargo_tickets' => $cargo_tickets,
        ];
        
        // Modify $userTickets
        foreach ($userTickets as $ticket) {
            $ticket->depature_date = Carbon::create($ticket->depature_date)->format('D jS M\, Y');
            $ticket->depature_time = Carbon::create($ticket->depature_time)->format('h:i A');
            $depatureDateTime = $ticket->depature_date.' by '.$ticket->depature_time;
            
            $ticket->depature = $depatureDateTime;
        }
        
        $passengerData = [
            'destinations' => Destination::pluck('name', 'id'),
            'tickets' => $userTickets,
            'todayTickets' => $userTicketsBookedToday,
        ];
        
        //* Show differrent dashboards depending on the type of user
        if ($user->type == 1) {
            return view('admin.dashboard')->with($adminData);
        } else if ($user->type == 0) {
            return view('passenger.dashboard')->with($passengerData);
        }
    }
}
