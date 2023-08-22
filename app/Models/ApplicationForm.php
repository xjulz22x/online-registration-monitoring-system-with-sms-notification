<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationForm extends Model
{
    use HasFactory;

     protected $fillable = [
        'id',
        'user_id',
        'last_name',
        'first_name',
        'middle_name',
        'citizenship',
        'house_number',
        'street',
        'barangay',
        'city_municipality',
        'province',
        'age',
        'gender',
        'civil_status',
        'birthdate',
        'birthplace',
        'living_arrangement',
        'pensioner',
        'pensioner_if_yes',
        'source',
        'source_others',
        'permanent_source_of_income',
        'permanent_source_of_income_if_yes',
        'regular_support_from_family',
        'type_of_support_cash',
        'type_of_support_in_kind',
        'illness',
        'illness_if_yes',
        'hospitalized',
        'date_submitted',
        'received_by',
        'with_maintenance',
        'with_maintenance_if_yes',
        'authorized_representative_name_1',
        'authorized_representative_relation_1',
        'authorized_representative_name_2',
        'authorized_representative_relation_2',
        'authorized_representative_name_3',
        'authorized_representative_relation_3',
        'assesment',
        'intervieded_by',
        'dswd_e_signature',
        'status',
       
        
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
