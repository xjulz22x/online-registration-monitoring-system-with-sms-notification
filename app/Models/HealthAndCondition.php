<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthAndCondition extends Model
{
    use HasFactory;

     protected $guarded = [];

      public function userHealth()
    {
        return $this->belongsTo(User::class);
    }
}
