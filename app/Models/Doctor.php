<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = [
        'fname',
        'lname',
        'qualifications',
        'experience',
        'phone',
        'email',
        'speciality',
        'Degrees',
        'brief',
        'gender',
        'highligthed',
        'image',
    ];
    
    public function departments()
    {
        return $this->belongsToMany(Department::class, 'doctor_department');
    }
    
    public function branches()
    {
        return $this->belongsToMany(Branch::class);
    }
}
