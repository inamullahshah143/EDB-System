<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use App\Models\Sro693;

class SRO693Import implements WithHeadingRow, ToModel
{
    public function model(array $row)
    {
        HeadingRowFormatter::default('none');
        return new Sro693([
            'pct_heading' => $row['Headings'],
            'description' => $row['Description'],
            'cd_rate' => $row['CD (%)'],
            'acd_rate' => $row['ACD (%)'],
        ]);
    }
}