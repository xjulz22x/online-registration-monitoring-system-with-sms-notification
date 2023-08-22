<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdentifyingInformation extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = [
        'birthdate',
        'created_at'
    ];

      public function userIndentifying()
    {
        return $this->belongsTo(User::class);
    }

      public function barangay()
    {
        return $this->hasOne(Barangay::class);
    }

}
