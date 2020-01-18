<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'user_id', 
        'affidavit_file', 
        'dni_file', 
        'vacancy_file',
        'aditional_file',
    ];
}
