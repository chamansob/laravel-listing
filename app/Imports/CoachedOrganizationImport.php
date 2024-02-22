<?php

namespace App\Imports;

use App\Models\CoachedOrganization;
use Maatwebsite\Excel\Concerns\ToModel;

class CoachedOrganizationImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new CoachedOrganization([        
            'name'   => $row[0],
            'org_slug'   => strtolower(str_replace(' ', '-', $row[0])),        
        ]);
    }
}
