<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sensor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'temperature',
        'humidity',
        'electricity_consumption',
        'electricity_ampere',
    ];
}
