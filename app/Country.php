<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $timestamps = false;

    public function education()
    {
        return $this->hasMany(Education::class);
    }

    public function trainings()
    {
        return $this->hasMany(Training::class);
    }
}
