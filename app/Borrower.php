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
        'referrer_id',
        'street',
        'city',
        'barangay',
        'province',
        'other_SOI',
        'barangay_captain',
        'ctc_num',
        'ctc_date_issued',
        'ctc_city_issued',
        'contact_num',
        'gender',
        'civil_status'
    ];

    protected $appends = ['age','full_name','active_loan'];
    protected $dates = ['birthday'];

    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['birthday'])->age;
    }

    public function getFullNameAttribute()
    {
        return "{$this->attributes['first_name']} {$this->attributes['middle_name']} {$this->attributes['last_name']}" ;
    }

    public function getActiveLoanAttribute(){
        return Loan::whereBorrowerId($this->attributes['id'])->whereLoanStatus(1)->exists();
    }

    public function dependents(){
        return $this->hasMany(\App\Dependent::class);
    }

    public function neighbours(){
        return $this->hasMany(\App\Neighbor::class);
    }

    public function ctc(){
        return $this->hasOne(\App\CTC::class);
    }

    public function spouse(){
        return $this->hasOne(\App\Spouse::class);
    }

    public function loans(){
        return $this->hasMany(\App\Loan::class);
    }

    public function vPensions(){
        return $this->hasMany(\App\VPension::class);
    }

    public function referrals(){
        return $this->hasMany(\App\Referral::class);
    }

    public function repayments(){
        return $this->hasManyThrough(\App\Repayment::class,\App\Loan::class);
    }
}

