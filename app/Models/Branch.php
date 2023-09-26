<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'user_id',
        'brief',
        'address',
        'latitude',
        'longitude',
        'worktimes',
        'active'
    ];

    protected $casts = [
        'worktimes' => 'array',
    ];

    public function created_by()
    {

        return $this->belongsTo(User::class, 'user_id'); // Assuming you have a User model
    }
    public function doctors()
    {
        return $this->belongsToMany(Doctor::class);
    }
}
