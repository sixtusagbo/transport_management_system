<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', //! Example: Abakaliki to Enugu
        'amount', //! Calculate based on destination
    ];
    
    /**
     * Get the vehicle associated with the destination.
     */
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
