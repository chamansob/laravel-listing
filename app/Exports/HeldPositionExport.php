<?php

namespace App\Exports;

use App\Models\HeldPosition;
use Maatwebsite\Excel\Concerns\FromCollection;

class HeldPositionExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return HeldPosition::select('name')->get();
    }
}
