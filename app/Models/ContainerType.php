<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Containertype extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'internal_dimension',
        'door_opening',
        'cubic_capacity',
        'cargo_weight',
    ];
}
