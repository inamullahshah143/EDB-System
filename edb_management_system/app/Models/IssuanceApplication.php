<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class IssuanceApplication extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'oem_id',
        'vehicle_id',
        'tracking_id',
        'list_of_plant_id',
        'brand_detail_id',
        'list_of_vendor_id',
        'parts_catalogue_id',
        'lease_agreement_id',
        'lease_agreement_validity',
        'application_status',
    ];


    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $appends = ['resource_url'];
}
