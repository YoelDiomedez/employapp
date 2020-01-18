<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    public $timestamps = false;

    public function education()
    {
        return $this->hasMany(Education::class);
    }
}
