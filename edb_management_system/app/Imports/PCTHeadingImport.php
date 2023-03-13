<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use App\Models\PctHeading;

class PCTHeadingImport implements WithHeadingRow, ToModel
{
    public function model(array $row)
    {
        HeadingRowFormatter::default('none');
        return new PctHeading([
            'pct_heading' => $row['Heading'],
            'description' => $row['Description'],
        ]);
    }
}