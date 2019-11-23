<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pension extends Model
{
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'pensioner_dob',
        'date_pension_started',
        'employer',
        'yos',
        'savings_acct_num',
        'pension_type',
        'pension_bank',
        'bank_branch',
        'bank_type',
        'pension_agency',
        'payday',
        'pension',
        'added_by'
    ];


    protected $appends = ['links','full_name'];

    public function getLinksAttribute()
    {
        return ['loans' => "/pension/{$this->attributes['id']}/loans"];
    }

    public function getFullNameAttribute()
    {
        return "{$this->attributes['last_name']}, {$this->attributes['first_name']}";
    }

    public function borrowers(){
        return $this->belongsTo(\App\Borrower::class);
    }

    public function loans(){
        return $this->hasMany(\App\Loan::class,'pension_code');
    }

}
