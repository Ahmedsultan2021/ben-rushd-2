<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Get the fields associated with the form.
     */
    public function fields()
    {
        return $this->hasMany(FormField::class); // Assuming you have a FormField model for the form_fields table
    }
    public function campaigns()
    {
        return $this->belongsToMany(Campaign::class, 'campaign_form');  // if you have timestamps on the pivot table
    }
    public function formResponses()
    {
        return $this->hasMany(FormResponse::class);
    }
}
