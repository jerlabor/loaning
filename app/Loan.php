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
    protected $casts = [
        'release_date' => 'date:Y-m-d'
    ];

    protected $appends = ['links'];

    public function getLinksAttribute()
    {
        return ['view' => "/loan/{$this->attributes['id']}"];
    }

    public function getDueAttribute()
    {
        return $this->attributes['principal_amount'] * $this->attributes['term'];
    }

     public function getMaturityDateAttribute()
    {

        return $this->release_date->addMonths($this->attributes['term'])->toFormattedDateString();
    }

    public function getBorrowerAttribute(){
        return \App\Pension::find($this->attributes['pension_code'])->borrower()->first()->full_name;
    }

    public function getPaidAttribute(){
        return \App\VRepaymentSummary::find($this->attributes['id'])->total_paid ?? 0;
    }

    public function getLastPaymentAttribute(){
        return \App\VRepaymentSummary::find($this->attributes['id'])->last_payment ?? '';
    }

    public function getBalanceAttribute(){
        return $this->due - $this->paid;
    }

    public function getActionButtonsAttribute()
    {
        return '<a href="/loan/'.$this->attributes['id'].'"><i class="far fa-eye"></i></a>';
    }

    public function pension(){
        return $this->belongsTo(\App\Pension::class,'pension_code');
    }

    public function repayments(){
        return $this->hasMany(\App\Repayment::class)->latest();
    }

    public function repaymentSummary(){
        return $this->hasOne(\App\VRepaymentSummary::class)->withDefault(['total_paid' => 0]);
    }
}
