<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    // The table associated with the model (Optional if following Laravel naming conventions)
    protected $table = 'campaigns';

    // The attributes that are mass assignable
    protected $fillable = [
        'title',
        'description',
        'image',
        'startTime',
        'endTime',
        'user_id' // Assuming there's a user_id column to link the campaign to a user
    ];

    // The attributes that should be cast to native types


    /**
     * Get the user that owns the campaign.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function forms()
    {
        return $this->belongsToMany(Form::class, 'campaign_form');  // if you have timestamps on the pivot table
    }
}
