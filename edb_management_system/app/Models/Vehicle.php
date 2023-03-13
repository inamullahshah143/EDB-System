<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Vehicle extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'oem_id',
        'application_id',
        'name',
        'hs_code',
        'make',
        'model',
        'under_sro',
        'category',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

}
