<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyComposition extends Model
{
    use HasFactory;

    protected $guarded = [];

      public function userFamily()
    {
        return $this->belongsTo(User::class);
    }

}
