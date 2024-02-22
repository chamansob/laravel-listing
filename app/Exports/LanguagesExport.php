<?php

namespace App\Exports;

use App\Models\Languages;
use Maatwebsite\Excel\Concerns\FromCollection;

class LanguagesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Languages::select('name')->get();
    }
}
