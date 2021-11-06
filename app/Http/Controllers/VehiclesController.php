<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\Vehicle;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::pluck('first_name', 'id');
        
        $data = [
            'drivers' => $drivers,
            'vehicles' => Vehicle::all(),
        ];
        
        return view('dashboard.vehicles', compact('drivers'))->with($data);
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
        // Validate request details
        $newVehicle = $request->validate([
            'name' => 'required',
            'model' => 'required',
            'plate_number' => 'required|min:7|max:8|alpha_num',
            'seats' => 'required|digits:2|between:14,25|numeric',
            // 'status' => 'required|digits:2|max:30|min:14',
            'driver_id' => 'required',
        ]);
        
        $vehicle = new Vehicle();
        $vehicle->name = $newVehicle['name'];
        $vehicle->model = $newVehicle['model'];
        $vehicle->plate_number = $newVehicle['plate_number'];
        $vehicle->no_of_seats = $newVehicle['seats'];
        $vehicle->status = 0; // *Important: 0 - Loading , 1 - Idle, 2 - Active
        $vehicle->driver_id = $newVehicle['driver_id'];
        $vehicle->save();
        
        return redirect('/vehicles')->with('success', 'A new vehicle was successfully added!');
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
        //
    }

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
}
