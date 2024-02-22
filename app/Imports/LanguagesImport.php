<?php

namespace App\Imports;

use App\Models\Languages;
use Maatwebsite\Excel\Concerns\ToModel;

class LanguagesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Languages([
            'name'   => $row[0],
            'lan_slug'   => strtolower(str_replace(' ', '-', $row[0])),
        ]);
    }
}
