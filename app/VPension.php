<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VPension extends Model
{
    protected $appends = ['links'];

    public function getLinksAttribute()
    {
        return ['loans' => "/pension/{$this->attributes['id']}/loans"];
    }

    protected $table = 'v_pensions';
}
