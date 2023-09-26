<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormResponse extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'form_id',
    ];

    /**
     * Get the form associated with the form response.
     */
    public function form()
    {
        return $this->belongsTo(Form::class, 'form_id');
    }

    /**
     * Get the field responses for the form response.
     */
    // public function fieldResponses()
    // {
    //     return $this->hasMany(fieldResponses::class, 'form_response_id');
    // }
    public function fieldResponses()
    {
        return $this->hasMany(FieldResponse::class, 'form_response_id');
    }
}
