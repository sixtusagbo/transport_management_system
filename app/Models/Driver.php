<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'dob',
        'address',
        'phone_number',
        'state',
        'lga',
        'experience',
        'vehicle_id',
    ];

    /**
     * Get the vehicle that owns the phone.
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
