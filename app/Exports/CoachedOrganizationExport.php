<?php

namespace App\Exports;

use App\Models\CoachedOrganization;
use Maatwebsite\Excel\Concerns\FromCollection;

class CoachedOrganizationExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CoachedOrganization::select('name')->get();
    }
}
