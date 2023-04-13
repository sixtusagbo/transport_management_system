<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\Vehicle;
use Illuminate\Validation\Rule;

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
            $vehicle->driver->full_name = $vehicle->driver->first_name . ' ' . $vehicle->driver->last_name;
        }
        // Fetching drivers with Eloquent
        $drivers = Driver::all();
        foreach ($drivers as $driver) {
            $driver->forPluck = $driver->first_name . ' ' . $driver->last_name;
        }
        $drivers = $drivers->pluck('forPluck', 'id');
        // Fetching destinations with Eloquent
        $destinations = Destination::pluck('name', 'id');

        $data = [
            'drivers' => $drivers,
            'vehicles' => $vehicles,
            'destinations' => $destinations,
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
        // return $request; //! Test Case

        // Check if user trying to access page is admin
        if (auth()->user()->type != 1) {
            return redirect('/dashboard')->with('error', 'Unauthorized Page');
        }

        // Validate request details
        $newVehicle = $request->validate([
            'name' => 'required',
            'model' => 'required',
            'plate_number' => 'required|min:7|max:8|alpha_num|unique:vehicles',
            'seats' => 'required|digits:2|between:14,25|numeric',
            'driver' => 'required|unique:vehicles,driver_id',
            'destination_id' => 'required',
            'depature_time' => 'required|date_format:H:i',
        ]);
        // return $newVehicle; //! Test Case

        $vehicle = new Vehicle();
        $vehicle->name = $newVehicle['name'];
        $vehicle->model = $newVehicle['model'];
        $vehicle->plate_number = $newVehicle['plate_number'];
        $vehicle->no_of_seats = $newVehicle['seats'];
        $vehicle->driver_id = $newVehicle['driver'];
        $vehicle->destination_id = $newVehicle['destination_id'];
        $vehicle->depature_time = $newVehicle['depature_time'];
        $vehicle->save();

        // Update the Driver
        $driver = Driver::find($vehicle->driver_id);
        $driver->vehicle_id = $vehicle->id;

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
        //* Important: 0 - Idle, 1 - Loading, 2 - Active
        switch ($vehicle->status) {
            case 0:
                $vehicle->status = 'idle';
                break;
            case 1:
                $vehicle->status = 'loading';
                break;
            case 2:
                $vehicle->status = 'active';
                break;
            default:
                null;
                break;
        }

        // Fetching drivers with Eloquent
        $drivers = Driver::all();
        foreach ($drivers as $driver) {
            $driver->forPluck = $driver->first_name . ' ' . $driver->last_name;
        }
        $drivers = $drivers->pluck('forPluck', 'id');
        // Fetching destinations with Eloquent
        $destinations = Destination::pluck('name', 'id');

        $data = [
            'vehicle' => $vehicle,
            'drivers' => $drivers,
            'destinations' => $destinations,
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

        $vehicle = Vehicle::find($id);

        // Validate request details
        $data = $request->validate([
            'plate_number' => 'required|min:7|max:8|alpha_num',
            'seats' => 'required|digits:2|between:14,25|numeric',
            'driver' => ['required', Rule::unique('vehicles', 'driver_id')->ignore($vehicle->driver_id, 'driver_id')],
            'destination' => 'required',
            'depature_time' => 'required',
        ]);
        // return $data; //! Test case

        // return $data; //! Test case
        $vehicle->plate_number = $data['plate_number'];
        $vehicle->no_of_seats = $data['seats'];
        $vehicle->driver_id = $data['driver'];
        $vehicle->destination_id = $data['destination'];
        $vehicle->depature_time = $data['depature_time'];
        $vehicle->update();

        return redirect('/vehicles')->with('success', 'Vehicle with plate number ' . $data['plate_number'] . ' updated!');
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
