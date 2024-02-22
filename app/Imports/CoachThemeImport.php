<?php

namespace App\Imports;

use App\Models\CoachTheme;
use Maatwebsite\Excel\Concerns\ToModel;

class CoachThemeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new CoachTheme([
            'name'   => $row[0],
            'theme_slug'   => strtolower(str_replace(' ', '-', $row[0])),
        ]);
    }
}
