<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = [
        'user_id', 
        'country_id', 
        'description',
        'start_date',
        'end_date',
        'institution',
        'city',
        'file',
        'hours',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
