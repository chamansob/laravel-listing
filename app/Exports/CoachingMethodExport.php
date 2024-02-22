<?php

namespace App\Exports;

use App\Models\CoachingMethod;
use Maatwebsite\Excel\Concerns\FromCollection;

class CoachingMethodExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CoachingMethod::select('name')->get();
    }
}
