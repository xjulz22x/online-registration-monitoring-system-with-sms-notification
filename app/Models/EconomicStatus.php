<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EconomicStatus extends Model
{
    use HasFactory;

    protected $guarded = [];

      public function userEconomic()
    {
        return $this->belongsTo(User::class);
    }

}
