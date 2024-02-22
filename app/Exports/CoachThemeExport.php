<?php

namespace App\Exports;

use App\Models\CoachTheme;
use Maatwebsite\Excel\Concerns\FromCollection;

class CoachThemeExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CoachTheme::select('name')->get();
    }
}
