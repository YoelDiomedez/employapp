<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function announcements()
    {
        return $this->belongsToMany(Announcement::class);
    }
}
