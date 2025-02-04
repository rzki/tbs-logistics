<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $guarded = ['id'];
    public function histories()
    {
        return $this->hasMany(ShipmentHistory::class);
    }
}
