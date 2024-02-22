<?php

namespace App\Imports;

use App\Models\Categories;
use Maatwebsite\Excel\Concerns\ToModel;

class CategoriesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Categories([
            'type'     => $row[0],
            'name'   => $row[1],
            'slug'   => strtolower(str_replace(' ', '-', $row[1])),
        ]);
    }
}
