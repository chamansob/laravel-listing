<?php

namespace App\Exports;

use App\Models\CanProvide;
use Maatwebsite\Excel\Concerns\FromCollection;

class CanProvideExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CanProvide::select('name')->get();
    }
}
