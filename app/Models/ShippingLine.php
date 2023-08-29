<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingLine extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'website',
        'contact_number',
        'address',
    ];
}
