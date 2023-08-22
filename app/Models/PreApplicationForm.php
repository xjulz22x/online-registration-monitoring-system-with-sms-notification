<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreApplicationForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'barangay_indigency',
        'birth_cert_or_others',
        'senior_citizen_id',
        'mothers_maiden_name',
        'monthly_income',
        'total_person_in_the_house',
        'senior_picture_1x1',
        'senior_signature',
        'status'
        
    ];

      public function user()
    {
        return $this->belongsTo(User::class);
    }

    

}
