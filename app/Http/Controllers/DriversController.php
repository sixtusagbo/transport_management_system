<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::all();
        
        return view('dashboard.drivers')->with('drivers', $drivers);
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
        // $table->string('first_name');
        // $table->string('last_name');
        // $table->date('dob');
        // $table->text('address');
        // $table->string('phone_number');
        // $table->tinyText('state');
        // $table->tinyText('lga');
        // $table->string('experience');
        
        // Validate request details
        $this->validate($request, [
            'f_name' => 'required',
            'l_name' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'phone' => 'required|digits:11',
            'state' => 'required',
            'lga' => 'required',
            'experience' => 'required',
        ]);
        
        // Add driver
        $driver = new Driver;
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
