<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public $timestamps = false;

    public function departments()
    {
        return $this->belongsToMany(Department::class);
    }

    public function districts()
    {
        return $this->belongsToMany(District::class);
    }

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }
}