<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipper_id ',
        'client_id ',
        'shipping_line_id ',
        'contact_number',
        'destination',
        'shipment_date',
        'delivery_date',
    ];
}
