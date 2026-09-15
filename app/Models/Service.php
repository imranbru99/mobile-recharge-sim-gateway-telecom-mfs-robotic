<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'device_id',
        'telco',
        'number',
        'amount',
        'type',
        'transaction_id',
        'request_id',
        'service_status',
    ];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
