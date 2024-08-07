<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = [
        'provider',
        'name',
        'symbol',
        'price',
        'shortCode',
    ];
}
