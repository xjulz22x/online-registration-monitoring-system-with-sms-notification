<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'email',
        'password',
        'role_id',
        'phone_number',
        'address',
        'gender',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function registrations()
    {
        return $this->hasOne(RegistrationForm::class);
    }

     public function preapplication()
    {
        return $this->hasOne(PreApplicationForm::class);
    }

     public function application()
    {
        return $this->hasOne(ApplicationForm::class);
    }

     public function identifying()
    {
        return $this->hasOne(IdentifyingInformation::class);
    }

     public function family()
    {
        return $this->hasMany(FamilyComposition::class);
    }

     public function economic()
    {
        return $this->hasOne(EconomicStatus::class);
    }

     public function health()
    {
        return $this->hasOne(HealthAndCondition::class);
    }

     public function assesment()
    {
        return $this->hasOne(Assesment::class);
    }

    public function getFullName() 
{
    return $this->first_name . ' ' . $this->middle_name. ' ' . $this->last_name;
}
}
