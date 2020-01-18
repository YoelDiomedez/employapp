<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $fillable = [
        'user_id', 
        'birth_date', 
        'paternal_surname', 
        'maternal_surname',
        'gender',
        'ruc',
        'cellphone_number',
        'marital_status',
        'address',
        'department_id',
        'province_id',
        'district_id',
        'tuition_number',
        'ffaa_file',
        'disability_dile',
        'profile_picture',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
