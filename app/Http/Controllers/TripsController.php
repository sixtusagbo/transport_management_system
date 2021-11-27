<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Destination;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TripsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        
        $data = $this->validate($request, [
            'depature_date' => ['required', 'date'],
            'destination_id' => ['required'],
            'vehicle_id' => ['required'],
        ], [], [
            'vehicle_id' => 'vehicle',
        ]);
        
        // Get the selected vehicle for the ticket
        $vehicle = Vehicle::find($data['vehicle_id']);
        $vehicle->temp_seats += 1; // Determine the seat_no
        // return $vehicle->temp_seats; //! Test Case
        
        $utno = self::UTNO(); // Get unique ticket no
        
        Booking::create([
            'user_id' => auth()->user()->id,
            'depature_date' => $data['depature_date'],
            'depature_time' => $vehicle->depature_time,
            'destination_id' => $data['destination_id'],
            'vehicle_id' => $data['vehicle_id'],
            'seat_no' => $vehicle->temp_seats,
            'ticket_no' => $utno,
        ]);
        
        $vehicle->update(); //* Update the ticket vehicle
        
        return redirect('/dashboard')->with('success', 'Ticket booked successfully');
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
        
        $ticket = Booking::find($id);
        $ticket->user->full_name = $ticket->user->first_name.' '.$ticket->user->middle_name.' '.$ticket->user->last_name;
        $ticket->depature_date = Carbon::create($ticket->depature_date)->format('D jS M\, Y');
        $ticket->depature_time = Carbon::create($ticket->depature_time)->format('h:i A');
        $depatureDateTime = $ticket->depature_date.' by '.$ticket->depature_time;
        $ticket->destination->amount = number_format($ticket->destination->amount, 2, '.', ',');
        
        $ticket->depature = $depatureDateTime;
        
        return view('passenger.plugins.show_ticket')->with('ticket', $ticket);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $id; //! Test Case
        
        // Check if user trying to access page is admin
        if (auth()->user()->type != 1) {
            return redirect('/dashboard')->with('error', 'Unauthorized Page');
        }
        
        $data = $this->validate($request, [
            'is_paid' => 'required|boolean',
        ]);
        
        $ticket = Booking::find($id);
        $ticket->is_paid = $data['is_paid'];
        $ticket->update();
        
        return redirect('/dashboard')->with('success', 'Payment successful for ticket no '.$request->ticket_no);
    }

    //TODO: Add condition for automatic deleting of ticket if its not paid after a month from it's created_at date
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $ticket_no
     * @return \Illuminate\Http\Response
     */
    public function payTicket($ticket_no)
    {
        // return $ticket_no; //! Test case
        
        // Check if user trying to access page is admin
        if (auth()->user()->type != 1) {
            return redirect('/dashboard')->with('error', 'Unauthorized Page');
        }
        
        $ticket = Booking::where('ticket_no', $ticket_no)->first();
        // return $ticket; //! Test case
        // $ticket->destination = Destination::find($ticket->destination_id);
        
        return view('admin.modify.ticket')->with('ticket', $ticket);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDestinationDetailsForBooking($id)
    {
        // return $id; //! Test case
        
        $destination = Destination::find($id);
        $vehicles = $destination->vehicles->pluck('plate_number', 'id');
        
        $data = [
            'destination' => $destination,
            'vehicles' => $vehicles,
        ];
        
        return view('passenger.destinationDetails')->with($data);
    }
    
    /**
     * Automatically generate a Unique Ticket Number
     *
     * @return $random
     */
    public static function UTNO() {
        $random = '';
        for ($i = 0; $i < 5; $i++) {
          $random .= rand(0, 1) ? rand(1, 9) : chr(rand(ord('A'), ord('Z')));
        }
        $random = 'PEACE'.$random;
        
        return $random;
    }
}
