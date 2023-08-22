<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payouts extends Model
{
    use HasFactory;

      protected $guarded = [];

      protected $dates = [
        'date_of_payout',
        'created_at'
    ];

      public function user()
    {
        return $this->belongsTo(User::class);
    }

     public function barangay()
    {
        return $this->hasOne(Barangay::class);
    }

}
