<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = [
        'company_id',
        'start_date', 
        'end_date', 
        'position',
        'bases',
        'annexes',
        'partial_results',
        'final_results',
        'state',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('selected');
    }
    
    public function careers()
    {
        return $this->belongsToMany(Career::class);
    }
}
