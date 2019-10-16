<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pension extends Model
{
    protected $fillable = [
        'pension_type',
        'bank',
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
        return ['createLoan' => "/{$this->attributes['id']}/loan/create"];
    }

    public function borrower(){
        return $this->belongsTo(\App\Borrower::class);
    }

}
