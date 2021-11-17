<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\Vehicle;

class VehiclesController extends Controller
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
        
        $vehicles = Vehicle::all();
        foreach ($vehicles as $vehicle) {
            $vehicle->driver = Driver::find($vehicle->driver_id);
            $vehicle->driver->full_name = $vehicle->driver->first_name.' '.$vehicle->driver->last_name;
        }
        // Fetching drivers with Eloquent
        $drivers = Driver::all();
        foreach ($drivers as $driver) {
            $driver->forPluck = $driver->first_name.' '.$driver->last_name;
        }
        $drivers = $drivers->pluck('forPluck', 'id');
        
        $data = [
            'drivers' => $drivers,
            'vehicles' => $vehicles,
        ];
        
        return view('admin.vehicles', compact('drivers'))->with($data);
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
        $newVehicle = $request->validate([
            'name' => 'required',
            'model' => 'required',
            'plate_number' => 'required|min:7|max:8|alpha_num',
            'seats' => 'required|digits:2|between:14,25|numeric',
            'driver_id' => 'required',
        ]);
        
        $vehicle = new Vehicle();
        $vehicle->name = $newVehicle['name'];
        $vehicle->model = $newVehicle['model'];
        $vehicle->plate_number = $newVehicle['plate_number'];
        $vehicle->no_of_seats = $newVehicle['seats'];
        $vehicle->status = 0; //* Important: 0 - Idle, 1 - Loading, 2 - Active
        $vehicle->driver_id = $newVehicle['driver_id'];
        $vehicle->save();
        
        return redirect('/vehicles')->with('success', 'A new vehicle was successfully added!');
    }

    /**
     * Display the vehicle to be deleted.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showToRemove($id)
    {
        $vehicle = Vehicle::find($id);
        
        return view('admin.modify.delete_vehicle')->with('vehicle', $vehicle);
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
        
        $vehicle = Vehicle::find($id);
        $drivers = Driver::pluck('first_name', 'id');
        
        $data = [
         'vehicle' => $vehicle,
         'drivers' => $drivers,
        ];
        
        return view('admin.modify.edit_vehicle')->with($data);
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
            'plate_number' => 'required|min:7|max:8|alpha_num',
            'number_of_seats' => 'required|digits:2|between:14,25|numeric',
            'driver_id' => 'required',
        ]);
        
        $vehicle = Vehicle::find($id);
        $vehicle->plate_number = $data['plate_number'];
        $vehicle->no_of_seats = $data['number_of_seats'];
        $vehicle->driver_id = $data['driver_id'];
        $vehicle->update();
        
        return redirect('/vehicles')->with('success', 'Vehicle with plate number '. $data['plate_number'] .' updated!');
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

        $vehicle = Vehicle::find($id);
        $vehicle->delete();
        
        return redirect('/vehicles')->with('success', 'Vehicle Removed!');
    }
}
