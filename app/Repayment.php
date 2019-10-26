<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repayment extends Model
{

    public function collector(){
        return $this->belongsTo(\App\User::class,'collected_by');
    }
}
