<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'user_id',
        'business_name',
        'ruc', 
        'address', 
        'phone_or_mobile',
    ];

    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
