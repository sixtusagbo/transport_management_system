<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id', //! from login i.e auth->user->id
        'depature_date',
        'seat_no', //! Auto gen
        'destination_id', //! Pick from dropdown
        'ticket_no', //! Auto Gen
    ];
    
    /**
     * Get the vehicle associated with the booking.
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
    
    /**
     * Get the user(passenger) associated with the booking.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * Get the destination associated with the booking.
     */
    public function destination()
    {
        return $this->hasOne(Destination::class);
    }
}
