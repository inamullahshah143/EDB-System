<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class File extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'path',
        'type',
        'status',
    ];


    protected $dates = [
        'created_at',
        'updated_at',
    ];

}