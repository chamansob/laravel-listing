<?php

namespace App\Imports;

use App\Models\CanProvide;
use Maatwebsite\Excel\Concerns\ToModel;

class CanProvideImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new CanProvide([
            'name'   => $row[0],
            'provide_slug'   => strtolower(str_replace(' ', '-', $row[0])),
        ]);
    }
}
