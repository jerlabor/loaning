<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spouse extends Model
{
    protected $table = 'spouse';
    protected $fillable = [
        'name',
        'date_married',
        'POM',
        'COD',
        'date_died'
    ];
}
