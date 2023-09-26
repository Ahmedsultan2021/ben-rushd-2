<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'active',
        'updated_by',
        "startTime",
        "endTime"
    ];

    /**
     * Get the user that last updated the offer.
     */
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
    public function reservations(){
        return $this->hasMany(Reservation::class);
    }
}
