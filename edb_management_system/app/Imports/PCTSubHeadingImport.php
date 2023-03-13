<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use App\Models\PctSubHeading;

class PCTSubHeadingImport implements WithHeadingRow, ToModel
{
    private $pct_heading_id;
    public function __construct($pct_heading_id)
    {
        $this->pct_heading_id = $pct_heading_id;
    }
    public function model(array $row)
    {
        HeadingRowFormatter::default('none');
        return new PctSubHeading([
            'pct_heading_id' => $this->pct_heading_id,
            'sub_pct_heading' => $row['Heading'],
            'description' => $row['Description'],
            'cd_rate' => $row['CD(%)'],
        ]);
    }
}