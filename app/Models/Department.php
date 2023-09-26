<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'image', 'brief', 'branch_id'];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'doctor_department');
    }
}
