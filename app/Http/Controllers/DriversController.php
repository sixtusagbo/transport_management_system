<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DriversController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Check if user trying to access page is admin
        if (auth()->user()->type != 1) {
            return redirect('/dashboard')->with('error', 'Unauthorized Page');
        }
        
        $drivers = Driver::orderBy('first_name', 'asc')->get();
        foreach ($drivers as $driver) {
            $driver->full_name = $driver->first_name.' '.$driver->last_name;
        }
        
        return view('admin.drivers')->with('drivers', $drivers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Check if user trying to access page is admin
        if (auth()->user()->type != 1) {
            return redirect('/dashboard')->with('error', 'Unauthorized Page');
        }
        
        // Validate request details
        $this->validate($request, [
            'f_name' => 'required',
            'l_name' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'state' => 'required',
            'lga' => 'required',
            'experience' => 'required|numeric|min:1|max:15',
        ]);
        
        // Add driver
        $driver = new Driver();
        $driver->first_name = $request->input('f_name');
        $driver->last_name = $request->input('l_name');
        $driver->dob = $request->input('dob');
        $driver->address = $request->input('address');
        $driver->phone_number = $request->input('phone');
        $driver->state = $request->input('state');
        $driver->lga = $request->input('lga');
        $driver->experience = $request->input('experience');
        $driver->save();
        
        return redirect('/drivers')->with('success', 'A new driver was successfully added!');
    }

    /**
     * Display the driver to be deleted.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showToRemove($id)
    {
        $driver = Driver::find($id);
        $driver->full_name = $driver->first_name.' '.$driver->last_name;
        
        return view('admin.modify.delete_driver')->with('driver', $driver);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $driver = Driver::find($id);
        
        return view('admin.modify.edit_driver')->with('driver', $driver);
    }

    /**
     * Update the driver in dbase.
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dob' => 'required|string|date|before:'.Carbon::today(),
            'address' => 'required|string|max:255',
            'phone_number' => 'required',
            'state' => 'required|string|max:255',
            'lga' => 'required|string|max:255',
            'experience' => 'required',
        ]);
        
        // Add new driver to dbase
        $driver = Driver::find($id);
        $driver->first_name = $data['first_name'];
        $driver->last_name = $data['last_name'];
        $driver->dob = $data['dob'];
        $driver->address = $data['address'];
        $driver->phone_number = $data['phone_number'];
        $driver->state = $data['state'];
        $driver->lga = $data['lga'];
        $driver->experience = $data['experience'];
        $driver->update();
        
        return redirect('/drivers')->with('success', 'Driver details updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return $id; //! Test case
        
        // Check if user trying to access page is admin
        if (auth()->user()->type != 1) {
            return redirect('/dashboard')->with('error', 'Unauthorized Page');
        }

        $driver = Driver::find($id);
        $driver->delete();
        
        return redirect('/drivers')->with('success', 'Driver Removed!');
    }
}
