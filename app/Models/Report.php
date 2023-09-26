<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone',
        'FileNumber',
        'branch_id',
        'doctor_id',
    ];

    /**
     * Get the branch associated with the report.
     */
    public function branch()
    {
        return $this->belongsTo(Branch::class,'branch_id');
    }

    /**
     * Get the doctor associated with the report.
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }
}
