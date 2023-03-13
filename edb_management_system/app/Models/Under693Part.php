<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Under693Part extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'oem_id',
        'application_id',
        'vehicle_id',
        'respective_pct_heading',
        'part_name_description',
        'part_no',
        'name_of_sub-assy/assy',
        'input_qty',
        'no_of_units',
        'total_approved_qty/annum',
        'uom',
        'cd_raate_applicable',
        'percentage_index',
        'status_imports',
        'status',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $appends = ['resource_url'];
}