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
        'technical_agreement_doc_id',
        'purchase_doc_of_plant_id',
        'snaps_of_inhouse_facilities_id',
        'copies_of_sales_tax_certificate_id',
        'factory_map_id',
        'manpower_break_up_id',
        'address_of_factory_id',
        'name_of_chief_executive_id',
        'technical_assistance_agreement',
        'purchase_doc_of_plant_validity',
        'lease_agreement_validity',
        'application_status',
    ];


    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $appends = ['resource_url'];
}
