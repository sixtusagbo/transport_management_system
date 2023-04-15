<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\CargoBooking;
use App\Models\Destination;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CargosController extends Controller
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
        // Check if user trying to access page is admin
        if (auth()->user()->type != 0) {
            return redirect('/dashboard')->with('error', 'Unauthorized Page');
        }

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $userCargosBookedToday = $user->cargoBookings()->whereDate('created_at', Carbon::today())->get();
        $userCargoTickets = $user->cargoBookings;

        $data = [
            'tickets' => $userCargoTickets,
            'todayCargos' => $userCargosBookedToday,
            'destinations' => Destination::pluck('name', 'id'),
        ];

        return view('passenger.send_cargo')->with($data);
    }

    /**
     * Store a newly created cargo ticket in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;

        $data = $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'nature' => ['required', 'string'],
            'weight' => ['required'],
            'destination_id' => ['required'],
            'amount' => ['required'],
        ], [], [
            'destination_id' => 'destination',
        ]);

        $tripsController = new TripsController();

        $cargo = new CargoBooking();
        $cargo->name = $data['name'];
        $cargo->nature = $data['nature'];
        $cargo->weight = $data['weight'];
        $cargo->user_id = auth()->user()->id;
        $cargo->destination_id = $data['destination_id'];
        $cargo->amount = $data['amount'];
        $cargo->delivery_date = Carbon::now()->addDay();
        $cargo->ticket_no = $tripsController->generateUniqueTicketNumber();
        $cargo->save();

        $ticket = CargoBooking::latest()->first();

        // Redirect to payment view with ticket id
        return redirect("/pay_paystack/cargo/" . $ticket->id);
    }

    /**
     * Store a newly created cargo ticket in storage.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function calculateCargoAmount($nature, $weight, $id)
    {
        // $amount = $nature.' '.$weight.' '.$id; //! Test Case

        $amount = Destination::find($id)->amount;

        // check nature of cargo
        if ($nature == 'Fragile') {
            $amount += 200;
        }

        // check weight of cargo
        if ($weight > 5) {
            $cost_weight = $weight - 5;
            $amount += $cost_weight * 100;
        }

        $data = [
            'amount' => $amount,
        ];

        return view('passenger.plugins.cargo_amount')->with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return $id;

        $ticket = CargoBooking::find($id);
        $ticket->delivery_date = Carbon::create($ticket->delivery_date)->format('D jS M\, Y');
        $ticket->amount = number_format($ticket->amount, 2, '.', ',');

        return view('passenger.plugins.show_ticket')->with('ticket', $ticket);
    }
}
