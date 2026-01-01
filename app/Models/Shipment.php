<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipper_id',
        'client_id',
        'shipping_line_id',
        'agent_id',
        'origin',
        'destination',
        'shipment_date',
        'delivery_date',
    ];

    public function containers()
    {
        return $this->hasMany(Container::class);
    }
    public function shipper()
    {
        return $this->belongsTo(Shipper::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function shippingLine()
    {
        return $this->belongsTo(ShippingLine::class);
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
