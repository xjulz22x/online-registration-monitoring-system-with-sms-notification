<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationForm extends Model
{
    use HasFactory;

      protected $fillable = [
        'id',
        'user_id',
        'first_name',
        'last_name',
        'middle_name',
        'place_of_birth',
        'age',
        'civil_status',
        'date_of_birth',
        'sex',
        'address',
        'educational_attainment',
        'other_skills',
        // family compostion
        'u1_fullname',
        'u1_relationship',
        'u1_age',
        'u1_status',
        'u1_occupation',
        'u2_fullname',
        'u2_relationship',
        'u2_age',
        'u2_status',
        'u2_occupation',
        'u3_fullname',
        'u3_relationship',
        'u3_age',
        'u3_status',
        'u3_occupation',
        'u4_fullname',
        'u4_relationship',
        'u4_age',
        'u4_status',
        'u4_occupation',
        'u5_fullname',
        'u5_relationship',
        'u5_age',
        'u5_status',
        'u5_occupation',
        // end of family composition
        'name_of_association',
        'address_of_association',
        'date_of_membership',
        'position',
        'sc_picture',
        'sc_document',
        'sc_pres_signature',
        'sc_signature',
        'status',
        'allowed_level'
    ];

     public function user()
    {
        return $this->belongsTo(User::class);
    }
}
