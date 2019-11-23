<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VPension extends Model
{
    protected $table = 'v_pensions';
    protected $appends = ['links','full_name'];

    public function getLinksAttribute()
    {
        return ['loans' => "/pension/{$this->attributes['id']}/loans"];
    }

    public function getFullNameAttribute()
    {
        return "{$this->attributes['last_name']}, {$this->attributes['first_name']}";
    }

}
