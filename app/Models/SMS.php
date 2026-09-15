<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SMS extends Model
{
    protected $fillable = [
        'operator',
        'text',
        'sender',
        'simid',
        'deviceid',
        'deviceinfo',
        'simslot',
        'sc_datetime',
    ];
}
