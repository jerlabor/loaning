<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'birthday',
        'referrer',
        'address',
        'city',
        'barangay',
        'province',
        'other_SOI',
        'barangay_captain',
        'ctc_num',
        'ctc_date_issued',
        'ctc_city_issued',
        'contact_num'
    ];

//    public function setBirthdayAttribute($value)
//    {
//        Carbon::parse($this->attributes['birthday'])->format();
//    }

    public function dependents(){
        return $this->hasMany(\App\Dependent::class);
    }

    public function neighbours(){
        return $this->hasMany(\App\Neighbor::class);
    }

    public function spouse(){
        return $this->hasOne(\App\Spouse::class);
    }
}

