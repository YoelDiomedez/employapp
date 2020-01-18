<?php

namespace App;

use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, ShinobiTrait;

    protected $fillable = [
        'dni', 
        'name', 
        'paternal_surname', 
        'maternal_surname', 
        'birth_date', 
        'gender', 
        'email', 
        'password',
        'profile_picture',
        'applying',
    ];
    
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function announcements()
    {
        return $this->belongsToMany(Announcement::class)->withPivot('selected');
    }

    public function careers()
    {
        return $this->belongsToMany(Career::class);
    }
}
