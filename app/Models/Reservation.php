<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = ['customerName', 'phone', 'email', 'branch_id', 'survey','isOffer','offer_id'];

    public function offer() {
        return $this->belongsTo(offer::class,'offer_id');
    }
    public function branch() {
        return $this->belongsTo(Branch::class,'branch_id');
    }

}
