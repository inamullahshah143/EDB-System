<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class RegisterOem  extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'oem_id',
        'phone',
        'secp_registration_no',
        'ntn_no',
        'product_brand',
        'strn_no',
        'poc',
        'poc_cell', 
        'contact',
        'registration_address',
        'factory_address',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

}
