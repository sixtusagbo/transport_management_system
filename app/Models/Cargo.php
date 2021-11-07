<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
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
    ];
}
