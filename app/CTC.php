<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CTC extends Model
{
    protected $table = 'ctc';
    protected $fillable = [
        'ctc_num'
        ,'ctc_date_issued'
        ,'ctc_city_issued'
        ,'borrower_id'
        ];
}
