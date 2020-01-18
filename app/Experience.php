<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'user_id', 
        'company', 
        'position',
        'start_date',
        'end_date',
        'description',
        'file',
    ];
}
