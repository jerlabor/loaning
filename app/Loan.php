<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
        'pension_code',
        'loan_type',
        'principal_amount',
        'release_date',
        'term'
    ];

    protected $dates = ['release_date'];
    protected $appends = ['due','maturity_date'];
    protected $casts = [
        'release_date' => 'date:Y-m-d'
    ];

    public function getDueAttribute()
    {
        return $this->attributes['principal_amount'] * $this->attributes['term'];
    }

    public function getMaturityDateAttribute()
    {
        return $this->release_date->addMonths($this->attributes['term'])->toFormattedDateString();
    }

    public function getActionButtonsAttribute()
    {
        return '<button class="btn btn-danger btn-sm" >Add Repayment</button>';
    }
}
