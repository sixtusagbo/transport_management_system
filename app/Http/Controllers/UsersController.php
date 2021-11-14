<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UsersController extends Controller
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
        
        $users = User::orderBy('first_name', 'asc')->get();
        foreach ($users as $user) {
            $user->full_name = $user->first_name.' '.$user->middle_name.' '.$user->last_name;
        }
        
        return view('admin.users')->with('users', $users);
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request; //* test case
        
        // Check if user trying to access page is admin
        if (auth()->user()->type != 1) {
            return redirect('/dashboard')->with('error', 'Unauthorized Page');
        }
        
        // Validate request details
        $newUser = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'phone_number' => 'required|numeric|unique:users',
            'email' => 'required|string|email|max:255',
            'password' => ['required', 'confirmed', Password::min(6)],
            'dob' => 'required|string|date|before:'.Carbon::today(),
            'gender' => 'required|string|min:4|max:6|alpha',
            'address' => 'required|string|max:255',
            'emergency' => 'required|numeric',
            'type' => 'numeric',
        ]);
        
        // Add new user to dbase
        $user = new User();
        $user->first_name = $newUser['first_name'];
        $user->last_name = $newUser['last_name'];
        $user->middle_name = $newUser['middle_name'];
        $user->phone_number = $newUser['phone_number'];
        $user->email = $newUser['email'];
        $user->password = Hash::make($newUser['password']);
        $user->dob = $newUser['dob'];
        $user->gender = $newUser['gender'];
        $user->address = $newUser['address'];
        $user->emergency = $newUser['emergency'];
        if ($newUser['type']) {
            $user->type = $newUser['type'];
        }
        $user->save();
        
        return redirect('/users')->with('success', 'New user created!');
    }
    
    /**
     * Display the user to be deleted.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showToRemove($id)
    {
        $user = User::find($id);
        $user->full_name = $user->first_name.' '.$user->middle_name.' '.$user->last_name;
        
        return view('admin.modify.delete_user')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        
        return view('admin.modify.edit_user')->with('user', $user);
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
        // return $request; //! test case
        
        // Check if user trying to access page is admin
        if (auth()->user()->type != 1) {
            return redirect('/dashboard')->with('error', 'Unauthorized Page');
        }
        
        // Validate request details
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'phone_number' => 'required',
            'email' => 'required|string|email|max:255',
            'password' => ['required', 'confirmed', Password::min(6)],
            'dob' => 'required|string|date|before:'.Carbon::today(),
            'gender' => 'required|string|min:4|max:6|alpha',
            'address' => 'required|string|max:255',
            'emergency' => 'required',
            'type' => 'numeric',
        ]);
        
        // Add new user to dbase
        $user = User::find($id);
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->middle_name = $data['middle_name'];
        $user->phone_number = $data['phone_number'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->dob = $data['dob'];
        $user->gender = $data['gender'];
        $user->address = $data['address'];
        $user->emergency = $data['emergency'];
        $user->type = $data['type'];
        $user->update();
        
        return redirect('/users')->with('success', 'User details updated!');
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

        $user = User::find($id);
        $user->delete();
        
        return redirect('/users')->with('success', 'User Removed!');
    }
}
