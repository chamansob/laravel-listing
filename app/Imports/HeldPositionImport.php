<?php

namespace App\Imports;

use App\Models\HeldPosition;
use Maatwebsite\Excel\Concerns\ToModel;

class HeldPositionImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new HeldPosition([
            'name'   => $row[0],
            'held_slug'   => strtolower(str_replace(' ', '-', $row[0])),
        ]);
    }
}
