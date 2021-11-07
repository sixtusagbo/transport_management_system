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
        'user_id',
        'depature_date',
        'seat_no', //? Pick from dropdown available seats or auto gen
        'destination_id',
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
    
    // TODO: Have a hasOne relationship with Destination
}
