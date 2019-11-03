<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pension extends Model
{
    protected $fillable = [
        'pension_type',
        'pension_bank',
        'bank_branch',
        'bank_type',
        'pension_agency',
        'payday',
        'pension',
        'borrower_id',
        'added_by'
    ];

    protected $appends = ['links'];

    public function getLinksAttribute()
    {
        return ['loans' => "/pension/{$this->attributes['id']}/loans"];
    }

    public function borrower(){
        return $this->belongsTo(\App\Borrower::class);
    }

    public function loans(){
        return $this->hasMany(\App\Loan::class,'pension_code');
    }

}
