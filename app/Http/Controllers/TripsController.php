<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Destination;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

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

        $ticket = Booking::create([
            'user_id' => auth()->user()->id,
            'depature_date' => $data['depature_date'],
            'depature_time' => $vehicle->depature_time,
            'destination_id' => $data['destination_id'],
            'vehicle_id' => $data['vehicle_id'],
            'seat_no' => $vehicle->temp_seats,
            'ticket_no' => $this->generateUniqueTicketNumber(),
        ]);

        $vehicle->update(); //* Update the ticket vehicle

        // Redirect to payment view with ticket_id
        return redirect("/trips/" . $ticket->id . "/pay_paystack");
    }

    /**
     * Display paystack payment processing view.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pay_paystack($id)
    {
        $ticket = Booking::find($id);

        $ticket->transaction_ref = Str::uuid();
        $ticket->update();

        $data = [
            "transaction_ref" => $ticket->transaction_ref,
            "amount" => $ticket->destination->amount,
            "ticket_id" => $ticket->id,
            "ticket_type" => 'trip',
        ];

        return view('passenger.pay_paystack')->with($data);
    }

    /**
     * Verify paystack payment.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verify_paystack(Request $request, int $id)
    {
        // Call paystack api
        $url = 'https://api.paystack.co/transaction/verify/' . $request->reference;
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('app.paystack_key')
        ])->get($url);
        $result = $response->json();

        // Verify transaction with result
        $trip = Booking::find($id);
        if ($result['data']['status'] == "success") {
            $amount = $result['data']['amount'] / 100;
            /* Divide the amount by hundred to get the actual amount
            because paystack needs you to multiply by 100 when
            making the payment to get nearest currency
            */
            $ref = $result['data']['reference'];
            $currency = $result['data']['currency'];
            $email = $result['data']['customer']['email'];

            // check if details match
            $referenceIsValid = $ref == $trip->transaction_ref;
            $amountIsValid = $amount == $trip->destination->amount;
            $currencyIsValid = $currency == "NGN";
            $emailIsValid = $email == $trip->user->email;

            if ($referenceIsValid && $amountIsValid && $currencyIsValid && $emailIsValid) {
                // Wow, Valid!
                // set trip as paid in storage
                $trip->is_paid = true;
                $trip->update();

                // Redirect to print
                return redirect('/print_trip/' . $trip->id)->with('ticket', $trip);
            }

            // Redirect to dashboard with error
            return redirect()->route('dashboard')->with('error', 'Invalid payment, please contact our support.');
        }

        // Redirect to dashboard with error
        return redirect()->route('dashboard')->with('error', 'Payment failed, please try again.');
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
        $ticket->user->full_name = $ticket->user->first_name . ' ' . $ticket->user->middle_name . ' ' . $ticket->user->last_name;
        $ticket->depature_date = Carbon::create($ticket->depature_date)->format('D jS M\, Y');
        $ticket->depature_time = Carbon::create($ticket->depature_time)->format('h:i A');
        $depatureDateTime = $ticket->depature_date . ' by ' . $ticket->depature_time;
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

        return redirect('/dashboard')->with('success', 'Payment successful for ticket no ' . $request->ticket_no);
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
    public function generateUniqueTicketNumber()
    {
        $randomNumber = mt_rand(1000000000, 9999999999);

        if ($this->ticketNumberExists($randomNumber)) {
            $randomNumber = mt_rand(1000000000, 9999999999);
        }

        return $randomNumber;
    }

    /**
     * Automatically generate a Unique Ticket Number
     *
     * @param int $number
     * @return bool $result
     */
    public function ticketNumberExists($number)
    {
        return Booking::where('ticket_no', $number)->exists();
    }

    /**
     * Print the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function print($id)
    {
        // return $id;

        $ticket = Booking::find($id);
        $ticket->user->full_name = $ticket->user->first_name . ' ' . $ticket->user->middle_name . ' ' . $ticket->user->last_name;

        $ticket->depature_date = Carbon::create($ticket->depature_date)->format('D jS M\, Y');
        $ticket->depature_time = Carbon::create($ticket->depature_time)->format('h:i A');
        $depatureDateTime = $ticket->depature_date . ' by ' . $ticket->depature_time;
        $ticket->destination->amount = number_format($ticket->destination->amount, 2, '.', ',');
        $ticket->depature = $depatureDateTime;

        $ticket->type = 'trip';

        return view('passenger.plugins.print_ticket')->with('ticket', $ticket);
    }
}
