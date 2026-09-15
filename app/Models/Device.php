<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = [
        'device_id',
        'device_info',
        'sim_numbers',
        'operators',
        'telcos',
        'apps_name',
        'types1',
        'types2',
        'balance',
    ];

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
