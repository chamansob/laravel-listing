<?php

namespace App\Imports;

use App\Models\Location;
use Maatwebsite\Excel\Concerns\ToModel;

class LocationImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Location([
            'location_id'   => $row[0],
            'name'   => $row[1],
            'loc_slug'   => strtolower(str_replace(' ', '-', $row[1])),
        ]);
    }
}
