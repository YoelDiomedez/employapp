<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public $timestamps = false;

    public function provinces()
    {
        return $this->belongsToMany(Province::class);
    }

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }
}