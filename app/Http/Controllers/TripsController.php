<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Destination;
use Illuminate\Http\Request;

class TripsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $utno = self::UTNO();
        
        return $utno;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        return $id;
    }

    //TODO: Remove destroy function
    //! No delete route for this controller
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
        // return $ticket; //! Test case
        $ticket = Booking::where('ticket_no', $ticket_no)->first();
        $ticket->destination = Destination::find($ticket->destination_id);
        
        return view('admin.ticket')->with('ticket', $ticket);
    }
    
    /**
     * Automatically generate a Unique Ticket Number
     *
     * @return $random
     */
    public static function UTNO() {
        $random = '';
        for ($i = 0; $i < 5; $i++) {
          $random .= rand(0, 1) ? rand(0, 9) : chr(rand(ord('A'), ord('Z')));
        }
        $random = 'PEACE'.$random;
        
        return $random;
    }
}
