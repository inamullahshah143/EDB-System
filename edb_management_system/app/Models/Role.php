<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Role extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'guard_name',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
