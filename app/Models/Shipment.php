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
    public function scopeSearch($query, $search)
    {
        return $query->where('shipment_number', 'like', '%'.$search.'%')
            ->orWhere('shipment_sender', 'like', '%'.$search.'%')
            ->orWhere('shipment_receiver', 'like', '%'.$search.'%');
    }
}
