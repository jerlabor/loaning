<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VRepaymentSummary extends Model
{
    protected $table = 'v_repayment_summary';
    protected $primaryKey = 'loan_id';
}
