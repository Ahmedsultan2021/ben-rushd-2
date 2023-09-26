<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldResponse extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'form_response_id',
        'form_field_id',
        'value',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the form response that owns the field response.
     */
    public function formResponse()
    {
        return $this->belongsTo(FormResponse::class, 'form_response_id');
    }

    /**
     * Get the form field that owns the field response.
     */
    public function formField()
    {
        return $this->belongsTo(FormField::class, 'form_field_id');
    }
}
