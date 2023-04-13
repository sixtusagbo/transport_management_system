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
        'no_of_seats',
        'status', //* Important: 0 - Idle, 1 - Loading, 2 - Active
        'driver_id',
        'destination_id',
        'depature_time',
    ];

    /**
     * Get the driver associated with the vehicle.
     */
    public function driver()
    {
        return $this->hasOne(Driver::class);
    }

    /** 
     * Get the destination associated with the vehicle.
     */
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
