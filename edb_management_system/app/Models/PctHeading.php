<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PctHeading extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'pct_heading',
        'description',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}