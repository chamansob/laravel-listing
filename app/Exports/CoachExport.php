<?php

namespace App\Exports;

use App\Models\Coach;
use Maatwebsite\Excel\Concerns\FromCollection;

class CoachExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Coach::all();
    }
}
