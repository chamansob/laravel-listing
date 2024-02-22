<?php

namespace App\Imports;

use App\Models\CoachingMethod;
use Maatwebsite\Excel\Concerns\ToModel;

class CoachingMethodImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new CoachingMethod([
            'name'   => $row[0],
            'method_slug'   => strtolower(str_replace(' ', '-', $row[0])),
        ]);
    }
}
