<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\CargoBooking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
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
     * Display paystack payment processing view.
     *
     * @param  int  $id
     * @param  string  $type
     * @return \Illuminate\Http\Response
     */
    public function pay_paystack(string $type, int $id)
    {
        switch ($type) {
            case 'trip':
                $ticket = Booking::find($id);
                $amount = $ticket->destination->amount;
                break;
            case 'cargo':
                $ticket = CargoBooking::find($id);
                $amount = $ticket->amount;
                break;
        }

        $ticket->transaction_ref = Str::uuid();
        $ticket->update();

        $data = [
            "transaction_ref" => $ticket->transaction_ref,
            "amount" => $amount,
            "ticket_id" => $ticket->id,
            "ticket_type" => $type,
        ];

        return view('passenger.pay_paystack')->with($data);
    }

    /**
     * Verify paystack payment.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  string  $type
     * @return \Illuminate\Http\Response
     */
    public function verify_paystack(Request $request, string $type, int $id)
    {
        // Call paystack api
        $url = 'https://api.paystack.co/transaction/verify/' . $request->reference;
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('app.paystack.secret_key')
        ])->get($url);
        $result = $response->json();

        // Verify transaction with result
        switch ($type) {
            case 'trip':
                $ticket = Booking::find($id);
                $ticket_amount = $ticket->destination->amount;
                break;
            case 'cargo':
                $ticket = CargoBooking::find($id);
                $ticket_amount = $ticket->amount;
                break;
        }
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
            $referenceIsValid = $ref == $ticket->transaction_ref;
            $amountIsValid = $amount == $ticket_amount;
            $currencyIsValid = $currency == "NGN";
            $emailIsValid = $email == $ticket->user->email;

            if ($referenceIsValid && $amountIsValid && $currencyIsValid && $emailIsValid) {
                // Wow, Valid!
                // set ticket as paid in storage
                $ticket->is_paid = true;
                $ticket->update();

                // Redirect to print
                switch ($type) {
                    case 'trip':
                        $print_route = "/print/trip/" . $ticket->id;
                        break;
                    case 'cargo':
                        $print_route = "/print/cargo/" . $ticket->id;
                        break;
                }
                return redirect($print_route)->with('ticket', $ticket);
            }

            // Redirect to dashboard with error
            return redirect()->route('dashboard')->with('error', 'Invalid payment, please contact our support.');
        }

        // Redirect to dashboard with error
        return redirect()->route('dashboard')->with('error', 'Payment failed, please try again.');
    }

    /**
     * Print a ticket.
     *
     * @param  int  $id
     * @param  string  $type
     * @return \Illuminate\Http\Response
     */
    public function print(string $type, int $id)
    {
        // return $type;

        if ($type == 'trip') {
            $ticket = Booking::find($id);
            $ticket->user->full_name = $ticket->user->first_name . ' ' . $ticket->user->middle_name . ' ' . $ticket->user->last_name;

            $ticket->depature_date = Carbon::create($ticket->depature_date)->format('D jS M\, Y');
            $ticket->depature_time = Carbon::create($ticket->depature_time)->format('h:i A');
            $depatureDateTime = $ticket->depature_date . ' by ' . $ticket->depature_time;
            $ticket->destination->amount = number_format($ticket->destination->amount, 2, '.', ',');
            $ticket->depature = $depatureDateTime;

            $ticket->type = $type;

            return view('passenger.plugins.print_ticket')->with('ticket', $ticket);
        }

        switch ($type) {
            case 'trip':
                // $
                break;
            case 'cargo':
                $ticket = CargoBooking::find($id);
                $ticket->delivery_date = Carbon::create($ticket->delivery_date)->format('D jS M\, Y');
                $ticket->amount = number_format($ticket->amount, 2, '.', ',');
                $ticket->type = $type;
                return view('passenger.plugins.print_ticket')->with('ticket', $ticket);
                break;
        }
    }
}
