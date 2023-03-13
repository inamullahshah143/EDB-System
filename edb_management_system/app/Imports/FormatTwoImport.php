<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use App\Models\Under693Part;
use Illuminate\Support\Facades\Auth;

class FormatTwoImport implements WithHeadingRow, ToModel
{
    private $application_id;
    private $vehicle_id;
    private $status;
    public function __construct($application_id, $vehicle_id, $status)
    {
        $this->application_id = $application_id;
        $this->vehicle_id = $vehicle_id;
        $this->status = $status;
    }

    public function model(array $row)
    {
        HeadingRowFormatter::default('none');
        return new Under693Part([
            'oem_id' => Auth::id(),
            'application_id' => $this->application_id,
            'vehicle_id' => $this->vehicle_id,
            'respective_pct_heading' => $row['Respective PCT Heading'],
            'part_name_description' => $row['Part Name/ Description as per Parts Catalogue'],
            'part_no' => $row['Part No.'],
            'name_of_sub-assy/assy' => $row['Name of Sub-Assy/ Assy'],
            'input_qty' => $row['Input Qty/ Vehicle'],
            'no_of_units' => $row['No. of Units/ Annum'],
            'total_approved_qty/annum' => $row['Total Approved Qty/ Annum'],
            'uom' => $row['UOM'],
            'cd_raate_applicable' => $row['CD Rate Applicable (%)'],
            'percentage_index' => $row['Percentage Index'],
            'status_imports' => $row['Status Imports/ Vendorized/ In-House Manufactured'],
            'status' => $this->status,
        ]);
    }
}