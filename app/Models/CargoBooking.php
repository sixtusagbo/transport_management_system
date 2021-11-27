<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargoBooking extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', //! Example: Parcel
        'nature', //! Fragile or Non-fragile
        'weight', //! Calculate based on size in kg. If greater than 5kg charge spillover as 100naira per kg
        'user_id', //! from login i.e auth->user->id
        'destination_id', //! Dropdown
        'amount', //! Calculate considering cargo details and destination details
        'delivery_date', //! Auto Gen
        'ticket_no', //! Auto Gen
    ];
    
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
        return $this->belongsTo(Destination::class);
    }
}
