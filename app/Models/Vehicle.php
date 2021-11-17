<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'model',
        'plate_number',
        'no of seats',
        'status',
        'driver_id',
        'booking_id',
        'destination_id',
    ];
    
    /**
     * Get the driver associated with the vehicle.
     */
    public function driver()
    {
        return $this->hasOne(Driver::class);
    }
    
    /**
     * Get the booking associated with the vehicle.
     */
    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
    
    /**
     * Get the destination associated with the vehicle.
     */
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
