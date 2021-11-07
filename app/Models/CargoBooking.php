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
        'cargo_id', //! Dropdown
        'user_id', //! from login i.e auth->user->id
        'destination_id', //! Dropdown
        'amount', //! Calculate considering cargo details and destination details
        'delivery_date', //! Auto Gen
    ];
}
