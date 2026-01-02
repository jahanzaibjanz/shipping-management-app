<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipment_id',
        'containertype_id',
        'items',
        'types',
        'costs',
    ];
    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }
}
