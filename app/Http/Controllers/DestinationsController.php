<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationsController extends Controller
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
     * Display a listing of the destinations on admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Check if user trying to access page is admin
        if (auth()->user()->type != 1) {
            return redirect('/dashboard')->with('error', 'Unauthorized Page');
        }
        
        $destinations = Destination::orderBy('name', 'asc')->get();
        
        $data = [
            'destinations' => $destinations,
        ];
        
        return view('admin.destinations')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request; //! Test case
        
        // Check if user trying to access page is admin
        if (auth()->user()->type != 1) {
            return redirect('/dashboard')->with('error', 'Unauthorized Page');
        }
        
        // Validate request details
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required',
        ]);
        
        $destination = new Destination();
        $destination->name = $data['name'];
        $destination->amount = $data['amount'];
        $destination->save();
        
        return redirect('/destinations')->with('success', 'A new destination was successfully added!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return $id; //! Test case
        
        // Check if user trying to access page is admin
        if (auth()->user()->type != 1) {
            return redirect('/dashboard')->with('error', 'Unauthorized Page');
        }
        
        $destination = Destination::find($id);
        
        $data = [
            'destination' => $destination,
        ];
        
        return view('admin.modify.edit_destination')->with($data);
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
        // return $request; //! Test case
        
        // Check if user trying to access page is admin
        if (auth()->user()->type != 1) {
            return redirect('/dashboard')->with('error', 'Unauthorized Page');
        }
        
        // Validate request details
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required',
        ]);
        
        $destination = Destination::find($id);
        $destination->name = $data['name'];
        $destination->amount = $data['amount'];
        $destination->save();
        
        return redirect('/destinations')->with('success', 'Destination updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Check if user trying to access page is admin
        if (auth()->user()->type != 1) {
            return redirect('/dashboard')->with('error', 'Unauthorized Page');
        }

        $destination = Destination::find($id);
        $destination->delete();
        
        return redirect('/destinations')->with('success', 'Destination Removed!');
    }
}
